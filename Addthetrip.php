
<?php



include '/db/db_connect.php';




if(isset($_POST['addtrip'])){

  $to = $_POST['to'];
  $from= $_POST['from'];
  $date_leave = $_POST['date_leave'];
  $date_back = $_POST['date_back'];
  $time_to_back = $_POST['time_to_back'];
  $time_to_leave = $_POST['time_to_leave'];
  $number_of_seat = $_POST['number_of_seat'];
  $price_of_seat = $_POST['price_of_seat'];
  $number_of_car = $_POST['number_of_car'];
  $type_of_car = $_POST['type_of_car'];
  $more_info = $_POST['more_info'];



  $S = "INSERT INTO `trips` (`date_leave`, `date_back`, `time_to_leave`, `time_to_back`, `number_of_seat`, `price_of_seat`, `type_of_car`, `number_of_car`, `more_info`, `to`,`from`)  VALUES ('$date_leave', '$date_back', '$time_to_leave', '$time_to_back', '$number_of_seat', '$price_of_seat', '$type_of_car', '$number_of_car', '$more_info', '$to', '$from')";
  $stat = "INSERT INTO trips('to','from',date_leave,date_back,time_to_back,time_to_leave,number_of_seat,price_of_seat,number_of_car,type_of_car,more_info) Values('$to','$from','$date_leave','$date_back','$time_to_back','$time_to_leave','$number_of_seat','$price_of_seat','$number_of_car','$type_of_car','$more_info')";


  $query = mysqli_query(
    $conn,$S);

    if($query){
      header('location:Addthetrip.php?message=active-ppup');
    }




  }

?>
<!DOCTYPE html>
<!-- saved from url=(0054)file:///C:/Users/HP/Documents/trip%20(7)/add-trip.html -->
<html lang="ar" dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="file:///C:/Users/HP/Documents/trip%20(7)/img/favicon.ico" rel="icon">
  <title>Add the trip</title>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
  <link href="./Add the trip_files/css2" rel="stylesheet">
  <link rel="stylesheet" href="./Add the trip_files/all.min.css">
  <link href="./Add the trip_files/bootstrap-icons.css" rel="stylesheet">
  <link href="./Add the trip_files/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./Add the trip_files/style.css">
  <style>
    * {
      border-radius: 7px !important;
    }

    #ppup {
      width: 300px;
      margin: 0 auto -40px;
      background: #06657a;
      opacity: 1;
      transform: translateY(-40px);
      transition: all 0.4s;
    }

    .active-ppup {
      opacity: 1 !important;
      transform: translateY(20px) !important;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php"
      class="navbar-brand d-flex align-items-center px-4 px-lg-5">
    </a>
    <div class="navbar"><a href="index.php"
        class="navbar-brand d-flex align-items-center px-4 px-lg-5">


      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <img src="The Trips_files/loggo.png" alt="شعار الموقع">
          <a href="index.php" class="nav-item nav-link active">الرئيسية</a>
          <div class="nav-item dropdown m-0">
            <nav>
            </nav>
          </div>
          <div class="nav-item dropdown">
            <a href="services_page.php" class="nav-item nav-link"> الخدمات</a>
            <div class="dropdown-menu fade-down m-0">
              <a href="sendreqouest.php" class="dropdown-item"> أرسل او إستلم
                شحنتك</a>
              <a href="gas_page.php" class="dropdown-item">غاز</a>
              <a href="gasolin_page.php" class="dropdown-item">بنزين</a>
              <a href="round-trip-page.php" class="dropdown-item"> الإنتقال بين المدن</a>
              <a href="driver.php" class="dropdown-item">سائق خاص</a>
            </div>
          </div>
          <a href="mndobie_page.php" class="nav-item nav-link">مندوبي إزهل</a>
          <a href="team_page.php" class="nav-item nav-link"> فريق العمل</a>
          <a href="about_page.php" class="nav-item nav-link"> عن المنصة</a>
          <a href="contact_page.php" class="nav-item nav-link">تواصل معنا</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Start Trip Details -->
  <div id="ppup"class="<?php if(isset($_GET['message'])){
    echo $_GET['message'];
  }?>" >
    <h2 style="color: #fff; text-align: center;">تم ارسال الطلب</h2>
  </div>
  <section class="edit-trip" style="margin-top: 30px; display: flex; flex-direction: column; align-items: center;">
    <div class="passenger-options">
      <button onclick="filter(1)" id="1" class="btn-theme" style="margin: 10px; background: #06657a;">ذهاب
        وإياب</button>
      <button onclick="filter(2)" id="2" class="btn-theme" style="margin: 10px;">ذهاب فقط</button>
    </div>
    <div id="goBack" class="form-container">
      <h3>ذهاب وإياب</h3>
      <form action="" method="post">
        <div class="container-in">
          <label for="departureTime">من</label>
          <input type="text" name="from" id="departureTime" required>
        </div>
        <div class="container-in">
          <label for="returnTime">الى</label>
          <input type="text" name="to" id="returnTime" required>
        </div>
        <div class="container-in">
          <label for="تاريخ المغادرة">تاريخ المغادرة</label>
          <input type="date" name="date_leave" id="">
        </div>
        <div class="container-in">
          <label for="تاريخ العودة">تاريخ العودة</label>
          <input type="date" name="date_back" id="">
        </div>
        <div class="container-in">
          <label for="وقت المغادرة">وقت المغادرة</label>
          <input type="time" name="time_to_leave" id="">
        </div>
        <div class="container-in">
          <label for="وقت العودة">وقت العودة</label>
          <input type="time" name="time_to_back" id="">
        </div>
        <div class="big">
          <label for="عدد المقاعد">عدد المقاعد</label>
          <input type="number" name="number_of_seat" id="">
        </div>
        <div class="big">
          <label for="سعر المقعد">سعر المقعد</label>
          <input type="text" name="price_of_seat" id="">
        </div>
        <div class="container-in">
          <label for="نوع السيارة">نوع السيارة</label>
          <select name="type_of_car" required>
            <option value="">اختر نوع السيارة</option>
            <option value="Toyota">Toyota</option>
            <option value="Honda">Honda</option>
            <option value="Nissan">Nissan</option>
            <option value="Ford">Ford</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Kia">Kia</option>
            <option value="Mercedes Benz">Mercedes Benz</option>
            <option value="Lexus">Lexus</option>
            <option value="Jeep">Jeep</option>
          </select>
        </div>
        <div class="container-in">
          <label for="رقم لوحة السيارة">رقم لوحة السيارة</label>
          <input type="number" placeholder="رقم لوحة السيارة" name="number_of_car" required>
        </div>
        <div class="big">
          <label for="خدمات إضافية">خدمات إضافية</label>
          <input type="text" placeholder="خدمات إضافية" name="more_info">
        </div>
        <button onsubmit="popup()" type="submit" name="addtrip">تأكيد</button>
      </form>
    </div>
    <div id="goOnly" class="form-container" style="display: none;">
      <h3>ذهاب فقط</h3>
      <form action="" method="post">
        <div class="container-in">
          <label for="departureTime">من</label>
          <input type="text" name="from" id="departureTime" required>
        </div>
        <div class="container-in">
          <label for="returnTime">الى</label>
          <input type="text" name="to" id="returnTime" required>
        </div>
        <div class="container-in">
          <label for="تاريخ المغادرة">تاريخ المغادرة</label>
          <input type="date" name="date_leave" id="">
        </div>
       
        <div class="container-in">
          <label for="وقت المغادرة">وقت المغادرة</label>
          <input type="time" name="time_to_leave" id="">
        </div>
       
        <div class="big">
          <label for="عدد المقاعد">عدد المقاعد</label>
          <input type="number" name="number_of_seat" id="">
        </div>
        <div class="big">
          <label for="سعر المقعد">سعر المقعد</label>
          <input type="text" name="price_of_seat" id="">
        </div>
        <div class="container-in">
          <label for="نوع السيارة">نوع السيارة</label>
          <select name="type_of_car" required>
            <option value="">اختر نوع السيارة</option>
            <option value="Toyota">Toyota</option>
            <option value="Honda">Honda</option>
            <option value="Nissan">Nissan</option>
            <option value="Ford">Ford</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Kia">Kia</option>
            <option value="Mercedes Benz">Mercedes Benz</option>
            <option value="Lexus">Lexus</option>
            <option value="Jeep">Jeep</option>
          </select>
        </div>
        <div class="container-in">
          <label for="رقم لوحة السيارة">رقم لوحة السيارة</label>
          <input type="number" placeholder="رقم لوحة السيارة" name="number_of_car" required>
        </div>
        <div class="big">
          <label for="خدمات إضافية">خدمات إضافية</label>
          <input type="text" placeholder="خدمات إضافية" name="more_info">
        </div>
        <button onsubmit="popup()" type="submit" name="addtrip">تأكيد</button>
      </form>
    </div>
  </section>
  <button onclick="goBack()"
    style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>
  <!-- End Trip Details -->
  <script>
    function goBack() {
      window.history.back();
    }

    const button1 = document.getElementById("1")
    const button2 = document.getElementById("2")
    const goAndBack = document.getElementById("goBack")
    const goOnly = document.getElementById("goOnly")
    const filter = (id) => {
      if (id == 1) {
        goAndBack.style.display = "flex"
        goOnly.style.display = "none"
        button1.style.background = "#06657a"
        button2.style.background = "#000"
      } else if (id == 2) {
        goOnly.style.display = "flex"
        goAndBack.style.display = "none"
        button2.style.background = "#06657a"
        button1.style.background = "#000"
      }
    }

    const popup = () => {
      document.getElementById("ppup").classList.toggle("active-ppup")
    }

  </script>
</body>

</html>