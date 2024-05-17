<?php
include "db_conn.php";
include 'master.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `sevices` WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<div class="row">
            <div class="col-md-8"></div>';
    if ($stmt->rowCount() > 0 ){
        echo '
        <div class="col-md-4">
            <div class="card1-group">
                <div class="card1">
                    <div class="titlee"><p>'.$result['service_name'].'</p></div>
                    <img src="img/'.$result['service_img'].'">
                    <div class="layer"></div>
                    <div class="info">
                        <p>'.$result['service_notes'].'</p>
                        <button> للمزيد</button>
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
    echo '</div>';
} else {
    echo  "Not Found Any Content";
}

include 'include/footer.php';
?>
