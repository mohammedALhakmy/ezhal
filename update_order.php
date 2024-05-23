<?php
session_start();

// Check if the user is logged in
//if (!isset($_SESSION['id'])) {
//    header("Location: login.php");
//    exit();
//}

// Check if the ID is provided
//if (!isset($_GET['id'])) {
//    header("Location: index.php");
//    exit();
//}

// Include database connection
//include 'php/connection_db.php';

// Get the order details
//$id = $_GET['id'];
//$query = "SELECT * FROM orders WHERE id = $id AND user_id = {$_SESSION['id']} AND order_status = 'Pending'";
//$result = $conn->query($query);

// Check if the order exists
//if ($result->num_rows == 0) {
//    header("Location: index.php");
//    exit();
//}

// Fetch order details
//$order = $result->fetch_assoc();

// Check if the form is submitted
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    // Check if the values are provided
//    if (!isset($_POST['service']) || !isset($_POST['categories']) || !isset($_POST['total'])) {
//        header("Location: index.php");
//        exit();
//    }
//
//    // Update the order details
//    $service = $_POST['service'];
//    $categories = $_POST['categories'];
//    $total = $_POST['total'];
//    $query = "UPDATE orders SET requested_service = '$service', category_count = $categories, current_total = $total WHERE id = $id AND user_id = {$_SESSION['id']} AND order_status = 'Pending'";
//    $conn->query($query);
//
//    // Redirect to the order details page
//    header("Location: order_details.php?id=$id");
//    exit();
//}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>
<?php //include '/master.php'; ?>

<body style="
    text-align-last: center;
">
    <h1>Edit Order</h1>
    <form action="update_order.php?id" method="POST">
        <label for="service">Requested Service:</label>
<!--        --><?php //echo $order['requested_service']; ?>
        <input style="
    border: solid;
    border-width: thin;
" type="text" name="service" value=""><br><br>
        <label for="categories">Category Count:</label>
<!--        --><?php //echo $order['category_count']; ?>
        <input style="
    border: solid;
    border-width: thin;
" type="number" name="categories" value=""><br><br>
        <label for="total">Current Total:</label>
<!--        --><?php //echo $order['current_total']; ?>
        <input style="
    border: solid;
    border-width: thin;
" type="text" name="total" value=""><br><br>
        <input style="
    border: solid;
    border-width: thin;
" type="submit" value="Update Order">
    </form>
</body>

</html>

