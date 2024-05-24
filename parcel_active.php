<?php
session_start();
include "db_conn.php";
include './master.php';
if(!isset($_SESSION['uid'])){
    header('location: login.php');
    exit();
}else {
    if (isset($_GET['id']) && isset($_GET['state'])){
        $id= $_GET['id'];
        $status = $_GET['state'];
        var_dump($status);
        if ($status ==="cancel"){
            $stmt = $conn->prepare("DELETE FROM `parcel` WHERE id = :id");
        }else{
            $stmt = $conn->prepare("UPDATE `parcel` SET `state`=:state WHERE id = :id");
        }
        $stmt->bindParam(':state', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        ?>
        <script type="text/javascript">
            window.location.href="parcel_active.php";
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
            <th>نوع الطارود</th>
            <th>وقت الذهاب</th>
            <th>المرسل </th>
            <th>المستلم </th>
            <th>عنوان المستلم </th>
            <th>رقم الهاتف </th>
            <th>حالة الطلب </th>
            <th>التكلفة </th>
            <th>التفاصيل </th>
            <th>التحكم </th>
        </tr>
        <?php
        if (!isset($filteredData) || empty($filteredData)){
            $sessionID = $_SESSION['uid'];
            $stmt = $conn->prepare("SELECT g.*,f.*,b.* FROM parcel g INNER JOIN beneficiary b ON g.beneficiary_id = b.ID_Number INNER JOIN future_data f  WHERE g.delivery_agent_id = $sessionID");
//            $stmt = $conn->prepare("SELECT g.*, f.*, b.* AS beneficiary_name, b.`address` AS beneficiary_address FROM parcel g
//                                        INNER JOIN future_data f ON g.`Track_Number` = f.`ID_Nnmber` INNER JOIN beneficiary b ON g.`beneficiary_id` = b.`ID_Number`
//                                        WHERE g.`delivery_agent_id` = $sessionID");
            $stmt->execute();
            $gasolines = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($gasolines) {
                foreach ($gasolines as $gasoline) { ?>
                    <tr>
                        <td><?php echo $gasoline['Track_Number']?></td>
                        <td><?php echo $gasoline['Parcel_Type']?></td>
                        <td><?php
                            $orderDate = date('Y-m-d', strtotime($gasoline['Order_Date']));
                            $orderTime = date('H:i', strtotime($gasoline['Order_Time']));
                            echo $orderDate ." ".$orderTime;
                            ?></td>
                        <td><?php echo $gasoline['Fname']?></td>
                        <td><?php echo $gasoline['name_futur']?></td>
                        <td><?php echo $gasoline['address_m']?></td>
                        <td><?php echo $gasoline['phone']?></td>
                        <td><?php echo $gasoline['state']?></td>
                        <td><?php echo $gasoline['Cost']?></td>
                        <td><?php echo $gasoline['Select_Details']?></td>
                        <td>
                            <?php
                            $status = $gasoline['state'];
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
                            if ($gasoline['state'] === "pending"){ ?>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=confirmed" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=cancel" class="edit-btn"><i class="fas fa-trash text-danger "></i></a>
                            <?php  }

                            if ($gasoline['state'] === "confirmed"){ ?>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=processing" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=cancel" class="edit-btn"><i class="fas fa-trash text-danger"></i></a>
                            <?php  }

                            if ($gasoline['state'] === "processing"){ ?>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=delivered" class="edit-btn"><i class="<?=$icon_class?> <?=$icon_color?>"></i></a>
                                <a href="parcel_active.php?id=<?=$gasoline['id']?>&state=cancel" class="edit-btn"><i class="fas fa-trash text-danger"></i></a>
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
