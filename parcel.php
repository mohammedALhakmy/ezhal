<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: login.php');
    exit();
}else {?>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parcels</title>
    <link rel="stylesheet" href="css/style6.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<section>
    <h1>توصيل الطرود</h1>
    <p>إختر الخدمة إرسال او إستقبال طرد </p>
</section>
<div class="button-container">
    <a href="parcel_service.php" class="button"> إرسال طرد </a>
    <a href="" class="button">إستقبال طرد</a>
</div>
<iframe src='https://my.spline.design/untitled-81091ba6f7db7fba14e41a82633b20ca/' id="p1" class="p" frameborder='0' width='100%' height='100%'></iframe>
<iframe src='https://my.spline.design/untitled-81091ba6f7db7fba14e41a82633b20ca/' id="p2" class="p" frameborder='0' width='100%' height='100%'></iframe>

</body>
</html>
<?php

}