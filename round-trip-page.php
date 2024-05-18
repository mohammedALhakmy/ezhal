<?php

//include '/db/db_connect.php';
//
//$query = mysqli_query($conn, "SELECT * FROM trips");
//
//?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    



    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>round-trip-page</title>

    <link href="./round-trip-page_files/css2" rel="stylesheet">
    <link href="./round-trip-page_files/all.min.css" rel="stylesheet">
    <link href="./round-trip-page_files/bootstrap-icons.css" rel="stylesheet">
    <link href="./round-trip-page_files/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./round-trip-page_files/style.css">
    

    <style>
        * {
            border-radius: 7px !important;
        }
    </style>

    
</head>

<body>
<?php   include('master.php');?>

   <main>
   <section>
        <div class="round-trip">
            <div class="container">
                <div class="details" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                    <h2 class="title-header">النقل بين المدن</h2>
                    <div class="content">
                        <form class="options" onsubmit="return validateForm()" action="./thetrips.php" method="get">
                            <div class="check-label">
                                <label>ذهاب واياب</label>
                                <input type="radio" name="type" id="type" class="type" value="go_and_back">
                                <label>ذهاب فقط</label>
                                <input type="radio" name="type" id="type" class="type" value="go">
                                <p class="error-type"></p>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <select name="from-trip" id="" class="from-trip form-select border-dark">
<!--                                        --><?php
//                                        if ($query && mysqli_num_rows($query) > 0) {
//                                            while ($item = mysqli_fetch_assoc($query)) {
//                                                echo "<option value='" . $item['id'] . "'>" . $item['from'] . "</option>";
//                                            }
//                                        }
//                                        ?>
                                    </select>
                                    <p class="error-from-trip"></p>
                                </div>
                                <div class="col-md-5">
                                    <select name="to-trip" id="" class="to-trip form-select border-dark">
<!--                                        --><?php
//                                        if ($query && mysqli_num_rows($query) > 0) {
//                                            mysqli_data_seek($query, 0); // Reset the pointer to the beginning
//                                            while ($item = mysqli_fetch_assoc($query)) {
//                                                echo "<option value='" . $item['id'] . "'>" . $item['to'] . "</option>";
//                                            }
//                                        }
//                                        ?>
                                    </select>
                                    <p class="error-to-trip"></p>
                                </div>
                            </div>
                            <div>
                                <button type="button"  onClick="togglePassengerOptions()" style="width: 40%; background: none; border: 1px solid #000; border-radius: 10px;" id="passenger-button">&#9660; المسافرين</button>
                                <div class="passenger-options" style="display: none; width: 100%;">
                                    <!-- Passenger options -->
                                </div>
                                <p class="error-to-trip"></p>
                            </div>
                            <div class="range-search">
                                <!-- Range search -->
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center ">
                                    <div class="btn text-center ">
                                        <button type="submit" class="btn-theme"> ابحث</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

   </main>
    <script>
        document.getElementById('passenger-button').addEventListener('click', function() {
            var passengerOptions = document.querySelector('.passenger-options');
            if (passengerOptions.style.display === 'none') {
                passengerOptions.style.display = 'block';
            } else {
                passengerOptions.style.display = 'none';
            }
        });

        function increaseValue(button) {
            var inputField = button.closest('div').querySelector('input[type="number"]');
            var currentValue = parseInt(inputField.value);
            if (!isNaN(currentValue)) { // Check if the value is convertible to a number
                inputField.value = currentValue + 1;
            } else {
                inputField.value = 1; // Default value if the value is invalid
            }
        }

        function decreaseValue(button) {
            var inputField = button.closest('div').querySelector('input[type="number"]');
            var currentValue = parseInt(inputField.value);
            if (!isNaN(currentValue) && currentValue > 0) { // Check if the value is convertible to a number and greater than zero
                inputField.value = currentValue - 1;
            } else {
                inputField.value = 0; // Default value if the value is invalid or the current value is zero
            }
        }
    </script>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
