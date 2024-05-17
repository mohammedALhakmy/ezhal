<?php include '/master.php'; ?>
<?php
session_start();

// Include database connection
include 'php/connection_db.php';

// Check if the ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM orders WHERE id = $id AND user_id = {$_SESSION['id']} AND order_status = 'Pending'";
$result = $conn->query($query);

// Check if the order exists
if ($result->num_rows == 0) {
    header("Location: index.php");
    exit();
}

// Fetch order details
$order = $result->fetch_assoc();

// Display order details
echo "Order ID: " . $order['id'] . "<br>";
echo "Requested Service: " . $order['requested_service'] . "<br>";
echo "Category Count: " . $order['category_count'] . "<br>";
echo "Current Total: " . $order['current_total'] . "<br>";

// Add any additional details you want to display here


?>

<a href="/curr-order.php">موافق</ش>