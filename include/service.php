<?php
include "db_conn.php";
$stmt = $conn->prepare("SELECT * FROM `sevices`");
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($services) {
    ?>
    <div class="card1-group"> <?php
foreach ($services as $service) { ?>
    <a href="service_one.php?id=<?php echo $service['id']?>">
        <div class="card1">
            <div class="titlee"><p><?php echo $service['service_name']; ?></p></div>
            <img src="img/<?php echo $service['service_img']; ?>">
            <div class="layer"></div>
            <div class="info">
                <p><?php echo $service['service_notes']; ?></p>
                <button> للمزيد</button>
            </div>
        </div>
    </a>
<?php }
?>
    </div>
        <?php
}
?>

