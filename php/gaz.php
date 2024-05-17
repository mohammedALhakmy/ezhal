<?php

include 'connection_db.php';

session_start();
// Retrieve form data
$number_of_cylinders = $_POST['number_of_cylinders'];
$volume_of_cylinder = $_POST['volume_of_cylinder'];
$user_location = $_POST['user_location'];
$packaging = $_POST['packaging'];


// Prepare and execute the INSERT statement
$stmt = $conn->prepare('INSERT INTO service_gaz  (number_of_cylinders, volume_of_cylinder, user_location, packaging) VALUES (?, ?, ?, ?)');
$stmt->bind_param('isss', $number_of_cylinders, $volume_of_cylinder, $user_location, $packaging);
$stmt->execute();

// Check for errors
if ($stmt->errno) {
    echo '<script>alert("Error inserting data: ' . $stmt->error . '")</script>';
} else {

    // Retrieve form data
    $orderNumber = rand(100000000, 999999999);
    $user_id = $_SESSION['id'];
    $price = 30;
    $requested_service = 'Gaz';
    $order_date = DATE('Y-m-d');
    $current_total = $number_of_cylinders * $price;
    $order_status = 'Pending';
    $stmt = $conn->prepare('INSERT INTO orders (requested_service, order_date, category_count, current_total, order_status, user_id, order_number) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssidsii', $requested_service, $order_date, $number_of_cylinders, $current_total, $order_status, $user_id, $orderNumber);
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
