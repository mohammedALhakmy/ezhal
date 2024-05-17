<?php
include '../db/db_connect.php'; // Include your database connection file

if (isset($_POST['searchByName']) && isset($_POST['serviceType'])) {
    $searchByName = $_POST['searchByName'];
    $serviceType = $_POST['serviceType'];

    // Construct the query based on search criteria
    $query = "SELECT * FROM delegates WHERE Delegate_Name LIKE '%$searchByName%'";

    if ($serviceType != 'all') {
        $query .= " AND service_type = '$serviceType'";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    if (mysqli_num_rows($result) > 0) {
        // Displaying search results

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="wrapper">
            <div class="img-area">
                <div class="inner-area">
                    <img src="" alt="">
                </div>
            </div>
            <div class="icon arrow"><i class="fas fa-arrow-left"></i></div>
            <div class="icon dots"><i class="fas fa-ellipsis-v"></i></div>
            <div class="name"><?php echo $row['Delegate_Name'];?></div>
            <div class="about"></div>
            <div class="social-icons">
                <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
                <a href="#" class="yt"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="buttons">
                <button>الدردشة</button>
                <button>الملف الشخصي</button>
            </div>
            <div class="social-share">
                <div class="row">
                    <i class="far fa-heart"></i>
                    <i class="icon-2 fas fa-heart"></i>
                    <span></span>
                </div>
                <div class="row">
                    <i class="far fa-comment"></i>
                    <i class="icon-2 fas fa-comment"></i>
                    <span></span>
                </div>
                <div class="row">
                    <i class="fas fa-star"></i>
                    <span></span>
                </div>
            </div>
        </div>
        <?php
        }
    } else {
        echo "No results found.";
        echo '<br>';
        echo '<a href="/mndobie.php">موافق</a>';
    }
}

// Close the connection
mysqli_close($conn);
?>


