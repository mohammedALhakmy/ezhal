<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    if (isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM `sevices` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $delivery = '';
        if ($result['id'] === 3){
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Availability = '2'");
        }
        if ($result['id'] === 2){
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Availability = '5'");
        }
        if ($result['id'] === 1){
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Availability = '3'");
        }
        if ($result['id'] === 4){
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Availability = '4'");
        }
        if ($result['id'] === 5){
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Availability = '1'");
        }
        $delivery->execute();
        $serv_delivery = $delivery->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="row">
                 <div class="col-md-4">
                    <div class="card1-group">';
        if ($serv_delivery) {
            foreach ($serv_delivery as $serv_deli) {
                echo '<a style="margin: 45px;" href="checkout.php?id_service='.$serv_deli['ID_Number'].'&id_delivery='.$result['id'].'"><li>'.$serv_deli['Fname'].'</li></a> <br>';
            }
            }
                 echo '</div></div>';
        echo '<div class="col-md-4">
<div class="card1-group">';
        if ($result['id'] === 4){ ?>
            <br>
            <br>
            <br><br>
            <br>
            <br>
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mt-5">
                        <div class="text-container">
                            <div class="text-box">
                                <p align="justify" class="mb-4" style="color:black; font-size: 24px; direction: rtl;">
                                    نخدمك
                                    بأنواع
                                    مختلفة من البنزين بكل سهولة إلى منزلك</p>
                            </div>
                        </div>
                        <a href="checkout.php?id_service=<?php echo $serv_deli['ID_Number']; ?>&id_delivery=<?php echo $result['id']; ?>" class="btn-f9s">معرفة المزيد >></a>
                    </div>

                    <div class="image-container">
                        <img src="img/se-gaz.png" alt="gasolin Illustration">
                    </div>
                </div>
<?php } if ($result['id'] === 1){
            echo '<div>
                        <div class="container-82o">
                            <div class="text-imm">
                                <p align="justify" class="mb-6n4 style-iZnBk" id="style-iZnBk">انضم إلينا واختر السائق المناسب لنقلك بأمان إلى وجهتك</p>
                            </div>
                        </div>
                        <a href="checkout.php?id_service=' . $serv_deli['ID_Number'] . '&id_delivery=' . $result['id'] . '" class="btn-f9s">معرفة المزيد &gt;&gt;</a>
                    </div>';

        }
        if ($result['id'] ===  2){ ?>
            <div class="container-1">
                <div class="form-container">
                     <div class="text-container">
                            <div class="text-box">
                                <p align="justify" class="mb-4" style="color:black; font-size: 22px; direction: rtl;">
                                    نوفَر لك
                                     أسطوانة  <br>
                                    <br> غاز لحد بيتك بكل أريحية
                                </p>
                            </div>
                        </div>
                    <?php
                    echo '<a class="btn2" style="color: black; background-color: #d65e5e;" href="checkout.php?id_service=' .$serv_deli['ID_Number'].'&id_delivery='.$result['id'].'"><li>معرفة المزيد >></li></a> <br>';
                    ?>

                </div>
                <br>
                <div class="wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -100px;">
                    <div class="image-container">
                        <img src="img/se-slnd.png" alt="Gas Illustration">
                    </div>
                </div>
                <br><br><br><br><br><br>
            </div>
      <?php  }
        echo '</div>
            </div>';



        if ($stmt->rowCount() > 0 ){
            echo '

        <div class="col-md-4">
            <div class="card1-group">
                <div class="card1">
                    <div class="titlee">
                        <p>'.$result['service_name'].'</p>
                        <p class="text-black-50">SR.'.$result['price'].'</p>
                    </div>
                    <img src="img/'.$result['service_img'].'">
                    <div class="layer"></div>
                    <div class="info">
                        <p>'.$result['service_notes'].'</p>
                        <button> للمزيد</button>
                    </div>
                </div>
            </div>
        </div>
        </div>';
        } else{

            echo  ' <div class="col-md-4 text-danger"> 
           <div class="card1-group">
 Not Found Any Content</div>
 </div>';
        }
    } else {
        echo  "Not Found Any Content";
    }
}



include 'include/footer.php';
?>
