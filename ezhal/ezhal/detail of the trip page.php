


<?php


if(isset($_POST['trip_id'])){
  $trip_id = $_POST['trip_id'];
}


?>

<!DOCTYPE html>
<!-- saved from url=(0050)file:///C:/Users/HP/Documents/trip%20(7)/maps.html -->
<html lang="ar" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="file:///C:/Users/HP/Documents/trip%20(7)/img/favicon.ico" rel="icon">
  <title>detail of the trip</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
  <link href="./map_files/css2" rel="stylesheet">
  <link rel="stylesheet" href="./map_files/all.min.css">
  <link href="./map_files/bootstrap-icons.css" rel="stylesheet">
  <link href="./map_files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./detail of the trip page_files/style.css">
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
          <img src="./map_files/loggo.png" alt="شعار الموقع">
          <a href="file:///C:/Users/HP/Documents/trip%20(7)/index.html" class="nav-item nav-link active">الرئيسية</a>
          <div class="nav-item dropdown m-0">
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

  <section>
    <h2 style="text-align: center; padding-top: 40px; margin-bottom: -80px;">تفاصيل الرحلة</h2>
    <div class="form-container">
      <form action="./Send Request Page.php" method="post">
        <input type="hidden" name="trip_id" value="<?php echo $trip_id?>">
        <div class="container">
          <label for="اللقب">اللقب</label>
          <select name="sirname">
            <option value="" disabled>اللقب</option>
            <option value="السيد">السيد</option>
            <option value="السيدة">السيدة</option>
          </select>
        </div>
        <div class="container">
          <label for="الاسم الاول">الاسم الاول</label>
          <input type="text" placeholder="الاسم الاول"  name="first_name" required>
        </div>

        <div class="container">
          <label for="الاسم الاخير">الاسم الاخير</label>
          <input type="text" placeholder="الاسم الاخير" name="last_name" required>
        </div>
        <div class="container">
          <label for="تاريخ الميلاد">تاريخ الميلاد</label>
          <input type="date"  placeholder="تاريخ الميلاد"  name="date_brith" required>
        </div>
        <div class="big">
          <label for="الجنسية">الجنسية</label>
          <select name="naionality">
            <option value="" disabled>اختر الجنسية</option>
            <option value="DZ">الجزائر</option>
            <option value="BH">البحرين</option>
            <option value="EG">مصر</option>
            <option value="IQ">العراق</option>
            <option value="JO">الأردن</option>
            <option value="KW">الكويت</option>
            <option value="LB">لبنان</option>
            <option value="LY">ليبيا</option>
            <option value="MA">المغرب</option>
            <option value="OM">عُمان</option>
            <option value="PS">فلسطين</option>
            <option value="QA">قطر</option>
            <option value="SA">المملكة العربية السعودية</option>
            <option value="SD">السودان</option>
            <option value="SY">سوريا</option>
            <option value="TN">تونس</option>
            <option value="AE">الإمارات العربية المتحدة</option>
            <option value="YE">اليمن</option>
          </select>
        </div>
        <div class="container">
          <label for="رقم الهوية/ الاقامة">رقم الهوية/ الاقامة</label>
          <input type="text" placeholder="رقم الهوية/ الاقامة"  name="ID_Card"  required>
        </div>
        <div class="container">
          <label for="بلد الاصدار">بلد الاصدار</label>
          <input type="text" placeholder="بلد الاصدار" name="country_emission" required>
        </div>
        <div class="big">
          <label for="تاريخ انتهاء الصلاحية">تاريخ انتهاء الصلاحية</label>
          <input type="date" placeholder="تاريخ انتهاء الصلاحية" name="Expiration" required>
        </div>
        <div class="container">
          <label for="بريد إلكتروني لاستلام التذكرة الإلكترونية">بريد إلكتروني لاستلام التذكرة الإلكترونية</label>
          <input type="email" name="email" placeholder="بريد إلكتروني لاستلام التذكرة الإلكترونية" required>
        </div>
        <div class="container">
          <label for="رقم الجوال">رقم الجوال</label>
          <input type="tel" id="phone" placeholder="رقم الجوال" name="phone" required>
          <img src="" alt="">
        </div>
        <button type="submit" name="send_request">تأكيد</button>
      </form>
    </div>
  </section>
  <button onclick="goBack()" style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>


  <script>
    // تعيين قيمة افتراضية لحقل الجوال
    const phoneNumberInput = document.getElementById("phone");
    phoneNumberInput.value = "+966"; // القيمة الافتراضية لمفتاح السعودية
  </script>
  <script>
    function goBack() {
      window.history.back();
    }
    </script>
</body>

</html>