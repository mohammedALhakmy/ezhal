<?php
include './db/db_connect.php';

if(isset($_GET['type']) && $_GET['type'] == 'go_and_back'){
    $query = mysqli_query($conn,"select * from trips where date_back != ''");
} else {
    $query = mysqli_query($conn,"select * from trips where date_back =''");
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="file:///C:/Users/HP/Documents/trip%20(7)/img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>The Trips</title>
    <link rel="stylesheet" href="./The Trips_files/css2">
    <link rel="stylesheet" href="./The Trips_files/all.min.css">
    <link href="./The Trips_files/bootstrap-icons.css" rel="stylesheet">
    <link href="./The Trips_files/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./The Trips_files/style.css">
    <style>
        * {
            border-radius: 7px !important;
        }
    </style>
</head>

<body>
<?php
include('master.php');
?>

    <section class="trips py-5" style="margin-top: 30px; display: flex; flex-direction: column; align-items: center;">
        <button id="passenger-button" style="border: #06657a 2px solid; border-radius: 7px; padding: 8px 12px; background: #fff;">ترتيب حسب <img src="./The Trips_files/up-down.png" style="width: 20px;"></button>
        <div class="passenger-options" style="display: none;">
            <button onclick="filter(1)" class="btn-theme" style="margin: 10px; font-size: 14px;" id="1">الاقل سعراً</button>
            <button onclick="filter(2)" class="btn-theme" style="margin: 10px; font-size: 14px;" id="2">المغادرة مبكراً</button>
            <button onclick="filter(3)" class="btn-theme" style="margin: 10px; font-size: 14px;" id="3">المغادرة متأخراً</button>
            <button onclick="filter(4)" class="btn-theme" style="display: none; margin: 10px; font-size: 14px;" id="4">جميع الرحلات</button>
        </div>
        <div class="container-list">
            <div id="early" class="details">
                <?php
                if (mysqli_num_rows($query) > 0) {
                    foreach ($query as $item) {
                ?>
                        <form class="options" onsubmit="return validateForm()" action="./detail of the trip page.php" method="post">
                            <div class="row">
                                <input type="hidden" name="trip_id" value="<?php echo $item['id']?>">
                                <ul class="list">
                                    <li style="display: flex; align-items: center;"><p style="font-size: 18px !important; margin: 0; color: <?php echo $item['date_back'] == '' ? 'blue' : 'green'; ?>;"> نوع الرحلة : <?php echo $item['date_back'] == '' ? 'ذهاب' : 'ذهاب و اياب'; ?></p></li>
                                    <li><p style="font-size: 18px !important;"> ساعة الإنطلاق :<?php echo $item['time_to_leave']?></p></li>
                                    <li><p style="font-size: 18px !important;">المدة الزمنية : 4 ساعات</p></li>
                                    <li><p style="font-size: 18px !important;">السعر:<?php echo $item['price_of_seat'];?></p></li>
                                </ul>
                                <button type="submit" style="width: auto;" class="btn-theme"> ارسال طلب</button>
                            </div>
                        </form>
                <?php
                    }
                } else {
                ?>
                    <p>No trips found.</p>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <button onclick="goBack()" style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>

    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('passenger-button').addEventListener('click', function() {
            var passengerOptions = document.querySelector('.passenger-options');
            if (passengerOptions.style.display === 'none') {
                passengerOptions.style.display = 'flex';
            } else {
                passengerOptions.style.display = 'none';
            }
        });

        function increaseValue(button) {
            var inputField = button.closest('div').querySelector('input[type="number"]');
            var currentValue = parseInt(inputField.value);
            if (!isNaN(currentValue)) {
                inputField.value = currentValue + 1;
            } else {
                inputField.value = 1;
            }
        }

        function decreaseValue(button) {
            var inputField = button.closest('div').querySelector('input[type="number"]');
            var currentValue = parseInt(inputField.value);
            if (!isNaN(currentValue) && currentValue > 0) {
                inputField.value = currentValue - 1;
            } else {
                inputField.value = 0;
            }
        }

        // filter type of trips
        const cheap = document.getElementById("cheap");
        const early = document.getElementById("early");
        const Late = document.getElementById("Late");
        const allFilterButton = document.getElementById("4");
        const filter = (id) => {
            if (id == 1) {
                cheap.style.display = "block"
                early.style.display = "none"
                Late.style.display = "none"
                allFilterButton.style.display = "block";
            } else if (id == 2) {
                early.style.display = "block"
                cheap.style.display = "none"
                Late.style.display = "none"
                allFilterButton.style.display = "block";
            } else if (id == 3) {
                Late.style.display = "block"
                early.style.display = "none"
                cheap.style.display = "none"
                allFilterButton.style.display = "block";
            } else {
                Late.style.display = "block"
                early.style.display = "block"
                cheap.style.display = "block"
                allFilterButton.style.display = "none";
            }
        }
    </script>
</body>

</html>
