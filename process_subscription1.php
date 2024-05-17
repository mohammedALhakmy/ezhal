<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <style>
        /* CSS for centering the message and increasing font size */
        .success-message {
            text-align: center;
            font-size: 35px;
            margin-top: 290px; /* Adjust as needed */
            padding: 30px; /* Add padding to create a box */
            border: 2px solid #06657A; /* Border color */
            border-radius: 7px; /* Border radius */
        }
    </style>
</head>
<body>

    <?php
    include('master.php');
    $con= mysqli_connect("localhost", "root", "","ezhal");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }

    $email = $_POST['email'];

    $sql = "INSERT INTO subscribe (email) VALUES ('$email')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<div class='success-message'>شكرًا لك، تم اشتراكك بنجاح</div>";

    mysqli_close($con);
    ?>
</body>
</html>