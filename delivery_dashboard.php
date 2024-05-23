<?php
session_start();
include "db_conn.php";
include 'master.php';
if(!isset($_SESSION['uid'])){
    header('location: login.php');
    exit();
}else {
    include 'include/about.php';
    include 'include/footer.php';
}
?>