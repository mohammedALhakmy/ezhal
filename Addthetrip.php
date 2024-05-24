
<?php


//
//include '/db/db_connect.php';
//
//
//
//
//if(isset($_POST['addtrip'])){
//
//  $to = $_POST['to'];
//  $from= $_POST['from'];
//  $date_leave = $_POST['date_leave'];
//  $date_back = $_POST['date_back'];
//  $time_to_back = $_POST['time_to_back'];
//  $time_to_leave = $_POST['time_to_leave'];
//  $number_of_seat = $_POST['number_of_seat'];
//  $price_of_seat = $_POST['price_of_seat'];
//  $number_of_car = $_POST['number_of_car'];
//  $type_of_car = $_POST['type_of_car'];
//  $more_info = $_POST['more_info'];
//
//
//
//  $S = "INSERT INTO `trips` (`date_leave`, `date_back`, `time_to_leave`, `time_to_back`, `number_of_seat`, `price_of_seat`, `type_of_car`, `number_of_car`, `more_info`, `to`,`from`)  VALUES ('$date_leave', '$date_back', '$time_to_leave', '$time_to_back', '$number_of_seat', '$price_of_seat', '$type_of_car', '$number_of_car', '$more_info', '$to', '$from')";
//  $stat = "INSERT INTO trips('to','from',date_leave,date_back,time_to_back,time_to_leave,number_of_seat,price_of_seat,number_of_car,type_of_car,more_info) Values('$to','$from','$date_leave','$date_back','$time_to_back','$time_to_leave','$number_of_seat','$price_of_seat','$number_of_car','$type_of_car','$more_info')";
//
//
//  $query = mysqli_query(
//    $conn,$S);
//
//    if($query){
//      header('location:Addthetrip.php?message=active-ppup');
//    }
//
//
//
//
//  }

session_start();
if (!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
include "db_conn.php";
include 'master.php';

?>
    <br>
    <br>
    <br>
    <br>
    <br>


  <!-- Start Trip Details -->
  <div id="ppup"class="
<!--  --><?php //if(isset($_GET['message'])){
//    echo $_GET['message'];
//  }?><!--" >-->
    <h2 style="color: #fff; text-align: center;">تم ارسال الطلب</h2>
  </div>

 <?php

}
