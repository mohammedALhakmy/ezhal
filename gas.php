<?php
session_start();
include "db_conn.php";
include './master.php';
if(!isset($_SESSION['uid'])){
    header('location: login.php');
    exit();
}else {
    if (isset($_GET['id']) && isset($_GET['status'])){
        $id= $_GET['id'];
        $status = $_GET['status'];
        if ($status ==="cancel"){
            $stmt = $conn->prepare("DELETE FROM `gas` WHERE id = :id");
        }else{
            $stmt = $conn->prepare("UPDATE `gas` SET `status`=:status WHERE id = :id");
        }
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        ?>
        <script type="text/javascript">
            window.location.href="gas.php";
        </script>
        <?php
    }
    ?>
    <br>
    <br>
    <br>
    <br>

    <h1 class="main-heading mt-5">الطلبات الحالية</h1>
    <table>
        <tr >
            <th>رقم الطلب</th>
            <th>الكمية</th>
            <th>نوع الطلب</th>
            <th>الموقع</th>
            <th>نوع الخدمة</th>
            <th>تاريخ الطلب</th>
            <th>العملاء</th>
            <th>حالة الطلب </th>
            <th>التحكم</th>
        </tr>
        <?php
        if (!isset($filteredData) || empty($filteredData)){
            $sessionID = $_SESSION['uid'];
            echo $sessionID;
            $stmt = $conn->prepare("SELECT g.*, b.* FROM gas g INNER JOIN beneficiary b ON g.beneficiary_id = b.ID_Number WHERE g.delivery_agent_id = $sessionID");
            $stmt->execute();
            $gasolines = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($gasolines) {
                foreach ($gasolines as $gasoline) { ?>
                    <tr>
                        <td><?php echo $gasoline['Order_Namber']?></td>
                        <td><?php echo $gasoline['Quantity']?></td>
                        <td><?php echo $gasoline['type_sevices']?></td>
                        <td><?php echo $gasoline['location']?></td>
                        <td><?php echo $gasoline['packaging'] === "0" ? "تعبئة" : "جديد"?></td>
                        <td><?php
                            $orderDate = date('Y-m-d', strtotime($gasoline['Order_Date']));
                            $orderTime = date('H:i', strtotime($gasoline['Order_Time']));
                            echo $orderDate ." ".$orderTime;
                            ?></td>
                        <td><?php echo $gasoline['Fname']?></td>
                        <td><?php echo $gasoline['status']?></td>
                        <td>
                            <?php
                            $status = $gasoline['status'];
                            $icon_class = "";
                            $icon_color = "";
                            switch ($status) {
                                case "pending":
                                    $icon_class = "fas fa-clock";
                                    $icon_color = "text-info";
                                    break;
                                case "confirmed":
                                case "processing":
                                case "delivered":
                                    $icon_class = "fas fa-clock";
                                    $icon_color = "text-primary";
                                    break;
                                case "cancel":
                                    $icon_class = "fas fa-times";
                                    $icon_color = "text-danger";
                                    break;
                                default:
                                    $icon_class = "fas fa-question";
                                    $icon_color = "text-muted";
                                    break;
                            }
                            if ($gasoline['status'] === "pending"){ ?>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=confirmed" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=cancel" class="edit-btn"><i class="fas fa-trash text-danger "></i></a>
                            <?php  }

                            if ($gasoline['status'] === "confirmed"){ ?>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=processing" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=cancel" class="edit-btn"><i class="fas fa-trash text-danger"></i></a>
                            <?php  }

                            if ($gasoline['status'] === "processing"){ ?>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=delivered" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="gas.php?id=<?=$gasoline['id']?>&status=cancel" class="edit-btn"><i class="fas fa-trash text-danger"></i></a>
                            <?php  }
                            ?>
                        </td>

                    </tr>
                <?php  }
            }

        }
        ?>
    </table>
    <script>
        document.getElementById('filterSelect').addEventListener('change', function() {
            var selectedValue = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'services_gasoline.php?status=' + selectedValue, true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    document.querySelector('table').innerHTML = xhr.responseText;
                } else {
                    console.error('Request failed. Status: ' + xhr.status);
                }
            };
            xhr.send();
        });
    </script>
    <?php

    include 'include/footer.php';
}
?>
