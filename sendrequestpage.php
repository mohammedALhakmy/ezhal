

<?php



include './system/db.php';

$trip_id = $_POST['trip_id'];

if(isset($_POST['send_request'])){


  $trip_id =  $_POST['trip_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $sirname = $_POST['sirname'];
  $date_brith = $_POST['date_brith'];
  $naionality = $_POST['naionality'];
  $ID_Card = $_POST['ID_Card'];
  $country_emission = $_POST['country_emission'];
  $Expiration = $_POST['Expiration'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
}



$query = mysqli_query($con,
"Insert into trips_order(trip_id,first_name,last_name,sirname,date_brith,naionality,ID_Card,country_emission,Expiration,email,phone)
 Values('$trip_id','$first_name','$last_name','$sirname','$date_brith','$naionality','$ID_Card','$country_emission','$Expiration','$email','$phone')");




?>


<!DOCTYPE html>
<!-- saved from url=(0058)file:///C:/Users/HP/Documents/trip%20(7)/send-request.html -->
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
  <title>Send Request Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="./Send Request Page_files/css2" rel="stylesheet">
  <link rel="stylesheet" href="./Send Request Page_files/all.min.css">
  <link href="./Send Request Page_files/bootstrap-icons.css" rel="stylesheet">
  <link href="./Send Request Page_files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./Send Request Page_files/style.css">
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
          <img src="./Send Request Page_files/loggo.png" alt="شعار الموقع">
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

  <!-- Start Trip Details -->
  <section class="trip-send" style="height: 100%; margin-bottom: 100px;">
    <div class="container" style="max-height: 530px !important;">
      <div class="details" style="max-height: 530px !important;">
        <div class="row m-auto " style="max-height: 530px !important;">
          <h2 class="mb-3">إرسال طلب</h2>
          <form class="options" onsubmit="return validateForm()" action="./Payment.php" method="post">
            <span class="error-type"></span>
            <input type="hidden" name="address" id="address">
          <input type="hidden" name="trip_id" value="<?php echo $trip_id?>" >
            <h4>حدد موقع الإلتقاء</h4>
            <div class="info d-flex align-items-center ">
              <p class="fw-bold"><button style="background: transparent; border: none; cursor: pointer;" onclick="goBackFun()" type="button" class="text-dark"><img src="./Send Request Page_files/gps.png"
                    style="width: 40px;"></img></button></p>
              <p style="background: transparent; height: 30px; width: 80%; font-size: 12px;" id="location" class="form-control address"></p>
            </div>
            <span class="error-address"></span>
            <h4>الخدمات الاضافية </h4>
            <div class="info d-flex align-items-center">
              <input type="radio" name="services" class="radio ">
              <label for="">توصيل فوري الى مطار الطائف الدولي</label>
            </div>
            <div class="btn text-center w-100">
              <h4 class="text-center ">انقر على تاكيد الحجز. تابع عملية الحجز</h4>
              <button type="submit" class="btn-theme mt-3">تاكيد الحجز</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <button onclick="goBack()" style="margin: 0 40px 0 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>
  </section>
  <section class="con-back">
    <section class="form-container">
      <h2 style="margin: 0;">حدد موقعك</h2>
      <form id="locationForm" onsubmit="goBackFun()">
        <div class="container">
          <label for="المنطقة">المنطقة</label>
          <input id="Region" type="text" placeholder="مكة المكرمة" required readonly>       
        </div>
        <div class="container">
          <label for="المدينة">المدينة</label>
          <select id="city" required>
            <option value="">اختر المدينة</option>
            <option value="الخرمة">الخرمة</option>
            <option value="الطائف">الطائف</option>
            <option value="جدة">جدة</option>
            <option value="مكة">مكة</option>
          </select>
        </div>
        <div class="container">
          <label for="الحي">الحي</label>
          <select id="Neighborhood" required>
            <option value="">اختر الحي</option>
            <option value="النزهة">النزهة</option>
            <option value="الحزم">الحزم</option>
            <option value="الروضة">الروضة</option>
            <option value="المحمدية">المحمدية</option>
          </select>
        </div>
        <div class="container">
          <label for="الشارع">الشارع</label>
          <select id="street" required>
            <option value="">اختر الشارع</option>
            <option value="القاسم">القاسم</option>
            <option value="الملك عبد العزيز">الملك عبد العزيز</option>
            <option value="الأمير سلطان">الأمير سلطان</option>
            <option value="الشميسي">الشميسي</option>
          </select>
        </div>
        <div class="container">
          <label for="العنوان المختصر">العنوان المختصر</label>
          <div class="shortTitle-input">
            <input type="text" required maxlength="8" pattern="[a-zA-Z]{4}\d{4}" title="يرجى إدخال 4 حروف ثم 4 أرقام">
            <button onclick="showST()" type="button">?</button>
          </div>
        </div>        
        <button class="btn" type="submit">تأكيد</button>
      </form>
      <div onclick="showST()" class="shortTitle" id="shortTitle">
        <img src="./Send Request Page_files/shortTitle.jpg" alt="">
      </div>
    </section>
    <button onclick="goBackFun()" style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>
  </section>
  <!-- End Trip Details -->

  <script src="./Send Request Page_files/app.js"></script>
  <script>
    function goBack() {
      window.history.back();
    }

    const cb = document.querySelector(".con-back")
    const goBackFun = () => {
      cb.classList.toggle("map-active")
    }
    
    document.getElementById("locationForm").addEventListener("submit", (e) => {
      e.preventDefault();
      let Region = document.getElementById("Region").value;
      const city = document.getElementById("city").value;
      const Neighborhood = document.getElementById("Neighborhood").value;
      const street = document.getElementById("street").value;

      Region = "مكة المكرمة"

      let address = Region + ", " + city + ", " + Neighborhood + ", " + street;

      document.getElementById("location").textContent = address;
    })

    const ST = document.getElementById("shortTitle")
    const showST = () => {
      ST.classList.toggle("show-st")
    }
    
    
  </script>
</body>

</html>
