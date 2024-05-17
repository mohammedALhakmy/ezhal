<?php

include 'connection_db.php';

session_start();
// Retrieve form data
$type_of_gasoline = $_POST['type_of_gasoline'];
$gasolin_liters = $_POST['gasolin-of-liters'];
$user_location = $_POST['user_location'];

// Prepare and execute the INSERT statement
$stmt = $conn->prepare('INSERT INTO service_gasolin (type_of_gasolin, gasolin_liters, user_location) VALUES (?, ?, ?)');
$stmt->bind_param('sds', $type_of_gasoline, $gasolin_liters, $user_location);
$stmt->execute();

// Check for errors
if ($stmt->errno) {
    echo '<script>alert("Error inserting data: ' . $stmt->error . '")</script>';
} else {
    // Retrieve form data
    $orderNumber = rand(100000000, 999999999);
    $user_id = $_SESSION['id'];
    $price = 10;
    $requested_service = 'Gasoline';
    $order_date = DATE('Y-m-d');
    $current_total = $gasolin_liters * $price;
    $order_status = 'Pending';
    $stmt = $conn->prepare('INSERT INTO orders (requested_service, order_date, category_count, current_total, order_status, user_id, order_number) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssidsii', $requested_service, $order_date, $gasolin_liters, $current_total, $order_status, $user_id, $orderNumber);
    $stmt->execute();

    // Check for errors
    if ($stmt->errno) {
        echo '<script>alert("Error inserting data: ' . $stmt->error . '")</script>';
    } else {
        echo '<script>alert("Order created successfully")</script>';
        echo '<meta http-equiv="refresh" content="1; url=../curr-order.php">';
    }
}

// Close the statement and the connection
$stmt->close();
$conn->close();
