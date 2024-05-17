<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Check if the ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

// Include database connection
include 'php/connection_db.php';

// Get the order ID
$id = $_GET['id'];

// Delete order from the database
$query = "DELETE FROM orders WHERE id = $id AND user_id = {$_SESSION['id']}";
if ($conn->query($query) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting order: " . $conn->error;
}

$conn->close();

include('/master.php');
?>

