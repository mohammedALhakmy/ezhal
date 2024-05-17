<?php
include "db_conn.php";
include 'master.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM `sevices` WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
        <div class="card1-group">
            <div class="card1">
                <div class="titlee"><p><?php echo $result['service_name']; ?></p></div>
                <img src="img/<?php echo $result['service_img']; ?>">
                <div class="layer"></div>
                <div class="info">
                    <p><?php echo $result['service_notes']; ?></p>
                    <button> للمزيد</button>
                </div>
            </div>
        </div>
    </div>


<?php
    include 'include/footer.php';
}
