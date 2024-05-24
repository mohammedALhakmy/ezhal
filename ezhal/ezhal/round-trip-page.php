
<?php



include './system/db.php';





//$query = mysqli_query($con,"select *  from trips");

?>

<!DOCTYPE html>
<!-- saved from url=(0061)file:///C:/Users/HP/Documents/trip%20(7)/round-trip-page.html -->
<html lang="ar" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="file:///C:/Users/HP/Documents/trip%20(7)/img/favicon.ico" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
  <title>round-trip-page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="./round-trip-page_files/css2" rel="stylesheet">
  <link href="./round-trip-page_files/all.min.css" rel="stylesheet">
  <link href="./round-trip-page_files/bootstrap-icons.css" rel="stylesheet">
  <link href="./round-trip-page_files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./round-trip-page_files/style.css">
  <style>
    *{
      border-radius: 7px !important;
    }
  </style>
</head>

<body>


  <section>
    <div class="round-trip">
      <div class="container">
        <div class="details" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
          <h2 class="title-header">النقل بين المدن</h2>
          <div class="content">
            <form class="options" onsubmit="return validateForm()" action="./The Trips.php" method="get">
              <div class="check-label">
                <label>ذهاب واياب</label>
                <input type="radio" name="type" id="type" class="type" value="go_and_back">
                <label>ذهاب فقط</label>
                <input type="radio" name="type" id="type" class="type" value="go">
                <p class="error-type"></p>
              </div>
              <br>
                <div class="row mb-3" id="data-container">

              </div>
              <div>
                <button style="width: 40%; background: none; border: 1px solid #000; border-radius: 10px;" id="passenger-button"> &#9660; المسافرين</button>
                  <div class="passenger-options" style="display: none; width: 100%;">
                    <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" ><div style="display: flex; align-items: center; width: 50px; margin-right: 60px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button><input id="adults-input" style="width: 50px; margin: 0 10px;" type="number" min="0"><button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div> <p style="color: #000; margin: 0 10px;">البالغين</p></div>
                    <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" ><div style="display: flex; align-items: center; width: 50px; margin-right: 60px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button><input id="children-input" style="width: 50px; margin: 0 10px;" type="number" min="0"><button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div> <p style="color: #000; margin: 0 10px;">الأطفال</p></div>
                    <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" ><div style="display: flex; align-items: center; width: 50px; margin-right: 60px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button><input id="infants-input" style="width: 50px; margin: 0 10px;" type="number" ><button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div> <p style="color: #000; margin: 0 10px;">الرضع</p></div>
                    <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" ><div style="display: flex; align-items: center; width: 50px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button><input id="special-needs-input" style="width: 50px; margin: 0 10px;" type="number" min="0"><button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div> <p style="color: #000; margin: 0 10px;">الأحتياجات الخاصة</p></div>
                    <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" ><div style="display: flex; align-items: center; width: 50px; margin-right: 60px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button><input id="student-input" style="width:50px; margin: 0 10px;" type="number" min="0"><button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div> <p style="color: #000; margin: 0 10px;">طالب</p></div>
                  </div>
                <p class="error-to-trip"></p>
              </div>
              <div class="range-search">
                <div class="range">
                  <h4>نطاق البحث</h4>
                </div>
                <ul class="list">
                  <li><input type="radio" name="radio" class="radio-list"> اليوم </li>
                  <li><input type="radio" name="radio" class="radio-list"> ثلاثة ايام القادمة </li>
                  <li><input type="radio" name="radio" class="radio-list"> الاسبوع القادم </li>
                </ul>
                <p class="error-radio-list"></p>
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

        <!-- <div class="clear"></div> -->
      </div>
    </div>
  </section>

  
  <script src="./round-trip-page_files/app.js"></script>

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
          if (!isNaN(currentValue)) { // التحقق مما إذا كانت القيمة قابلة للتحويل إلى رقم
              inputField.value = currentValue + 1;
          } else {
              inputField.value = 1; // قيمة افتراضية في حالة عدم صلاحية القيمة
          }
      }

      function decreaseValue(button) {
          var inputField = button.closest('div').querySelector('input[type="number"]');
          var currentValue = parseInt(inputField.value);
          if (!isNaN(currentValue) && currentValue > 0) { // التحقق مما إذا كانت القيمة قابلة للتحويل إلى رقم وأكبر من الصفر
              inputField.value = currentValue - 1;
          } else {
              inputField.value = 0; // قيمة افتراضية في حالة عدم صلاحية القيمة أو إذا كانت القيمة الحالية صفر
          }
      }

  </script>

  <script src="./round-trip-page_files/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
      $(document).ready(function() {
          $('.type').change(function() {
              var selectedType = $(this).val();
              $.ajax({
                  url: 'cod6e.php', // تغيير اسم الملف إلى الملف الذي يقوم بجلب البيانات من قاعدة البيانات
                  type: 'POST',
                  data: { type: selectedType },
                  success: function(response) {
                      $('#data-container').html(response);
                  }
              });
          });
      });
  </script>
</body>

</html>