<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ezhal";

// Create a MySQL connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "";
}

// Define constants for configuration
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ezhal");
?>