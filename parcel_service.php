<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
        $id = 5;
        $stmt = $conn->prepare("SELECT * FROM `sevices` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $delivery = '';
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

}



include 'include/footer.php';
?>
