<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ezhal";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
function executeSQL($sql) {
    global $conn;
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
