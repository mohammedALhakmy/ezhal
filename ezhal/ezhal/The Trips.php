

<?php




/*



 










*/
include './system/db.php';




  
//  $query = mysqli_query($con,"select *  from trips");
//
//  if(isset($_GET['type']) && $_GET['type'] == 'go_and_back'){
//    $query = mysqli_query($con,"select *  from trips where  date_back != ''");
//
//  }else{
//    $query = mysqli_query($con,"select *  from trips where date_back =''");
//}





?>

<!DOCTYPE html>
<!-- saved from url=(0059)file:///C:/Users/HP/Documents/trip%20(7)/trips.html?trip=on -->
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
  <title>The Trips</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="./The Trips_files/css2" rel="stylesheet">
  <link rel="stylesheet" href="./The Trips_files/all.min.css">
  <link href="./The Trips_files/bootstrap-icons.css" rel="stylesheet">
  <link href="./The Trips_files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./The Trips_files/style.css">
  <style>
    *{
      border-radius: 7px !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="file:///C:/Users/HP/Documents/trip%20(7)/index.html"
      class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    </a>
    <div class="navbar"><a href="file:///C:/Users/HP/Documents/trip%20(7)/index.html"
        class="navbar-brand d-flex align-items-center px-4 px-lg-5">


      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <img src="./The Trips_files/loggo.png" alt="شعار الموقع">
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/index.html" class="nav-item nav-link active">الرئيسية</a>
          <div class="nav-item dropdown m-0">
            <nav>
            </nav>
          </div>
          <div class="nav-item dropdown">
            <a href="file:///C:/Users/HP/Documents/trip%20(7)/services.html" class="nav-item nav-link"> الخدمات</a>
            <div class="dropdown-menu fade-down m-0">
              <a href="file:///C:/Users/HP/Documents/trip%20(7)/sendreqouest.html" class="dropdown-item"> أرسل او إستلم
                شحنتك</a>
              <a href="file:///C:/Users/HP/Documents/trip%20(7)/gas.html" class="dropdown-item">غاز</a>
              <a href="file:///C:/Users/HP/Documents/trip%20(7)/gasolin.html" class="dropdown-item">بنزين</a>
              <a href="./round-trip-page.html" class="dropdown-item"> الإنتقال بين المدن</a>
              <a href="file:///C:/Users/HP/Documents/trip%20(7)/driver.html" class="dropdown-item">سائق خاص</a>
            </div>
          </div>
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/mndobe.html" class="nav-item nav-link">مندوبي إزهل</a>
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/team.html" class="nav-item nav-link"> فريق العمل</a>
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/aboutt.html" class="nav-item nav-link"> عن المنصة</a>
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/contact.html" class="nav-item nav-link">تواصل معنا</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Start Trips -->
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



//if (mysqli_num_rows($query) > 0) {

//    foreach ($query as $item) {
?>

<form class="options" onsubmit="return validateForm()" action="./detail of the trip page.php" method="post">
          <div class="row">
            <input type="hidden" name="trip_id" value="<?php echo $item['id']?>">
            
            <ul class="list">
            <li style="display: flex; align-items: center;"><p style="font-size: 18px !important; margin: 0;"> نوع الرحلة : 46</p></li>
              <li><p style="font-size: 18px !important;"> ساعة الإنطلاق :65</p></li>
              <li><p style="font-size: 18px !important;">المدة الزمنية : 4 ساعات</p></li>
              <li><p style="font-size: 18px !important;">السعر:45</p></li>
            </ul>
          
              <button type="submit" style="width: auto;" class="btn-theme"> ارسال طلب</button>
        </div>
        </form>
<?php

//    }
//} else {
//}

?>








        
      </div>
      
      
      
    </div>
  </section>
  <button onclick="goBack()" style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>
  <!-- End Trips -->
  <script>
    function goBack() {
      window.history.back();
    }
    </script>
    <script>
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

  // filter type of trips
  const cheap = document.getElementById("cheap");
  const early = document.getElementById("early");
  const Late = document.getElementById("Late");
  const allFilterButton = document.getElementById("4")
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