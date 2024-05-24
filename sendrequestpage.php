<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
include "db_conn.php";
include 'master.php';
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['send_request'])){
    $f_name = $_POST['f_name'];
    $Title = $_POST['Title'];
    $transportation_between_citie_id  = $_POST['transportation_between_citie_id'];
    $l_name = $_POST['l_name'];
    $birth_date = $_POST['birth_date'];
    $nationality = $_POST['nationality'];
    $id_number = $_POST['id_number'];
    $not_number = $_POST['not_number'];
    $expire_number = $_POST['expire_number'];
    $email = $_POST['email'];
    $phone_u = $_POST['phone_u'];
    $stmt = $conn->prepare("INSERT INTO `details_the_trip`(`Title`, `f_name`, `l_name`, `birth_date`, `nationality`, `id_number`, `not_number`, `expire_number`, 
                               `email`, `phone_u`, `transportation_between_citie_id`)
                                VALUES (:Title,:f_name,:l_name, :birth_date, :nationality, :id_number,:not_number,:expire_number,:email,:phone_u,:transportation_between_citie_id)");
    $stmt->execute(['Title'=>$Title,'f_name' => $f_name,'l_name'=>$l_name, 'birth_date' => $birth_date, 'nationality' => $nationality, 'id_number' => $id_number,
        'not_number'=>$not_number,'expire_number'=>$expire_number,'email' =>$email,'phone_u'=>$phone_u,'transportation_between_citie_id'=>$transportation_between_citie_id]);
    $last_insert_id = $conn->lastInsertId();
}
?>
    <br>
    <br>
    <br>
  <!-- Start Trip Details -->
  <section class="trip-send" style="height: 100%; margin-bottom: 100px;">
    <div class="container" style="max-height: 530px !important;">
      <div class="details" style="max-height: 530px !important;">
        <div class="row m-auto " style="max-height: 530px !important;">
          <h2 class="mb-3">إرسال طلب</h2>
          <form class="options" onsubmit="return validateForm()" action="./Payment.php" method="post">
            <span class="error-type"></span>
            <input type="hidden" name="address" id="address">
          <input type="hidden" name="trip_id" value="<?php echo $last_insert_id?>" >
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
              <button type="submit"  class="btn-theme mt-3">تاكيد الحجز</button>
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
      <form  action="./Payment.php" method="post">
        <div class="container">
          <label for="المنطقة">المنطقة</label>
            <input type="hidden" name="trip_id" value="<?php echo $last_insert_id?>" >
          <input id="Region" type="text" name="u_lovation" placeholder="مكة المكرمة" required >
        </div>
        <div class="container">
          <label for="المدينة">المدينة</label>
          <select id="city" name="u_ciy" required>
            <option value="">اختر المدينة</option>
            <option value="الخرمة">الخرمة</option>
            <option value="الطائف">الطائف</option>
            <option value="جدة">جدة</option>
            <option value="مكة">مكة</option>
          </select>
        </div>
        <div class="container">
          <label for="الحي">الحي</label>
          <select id="Neighborhood" name="u_hay" required>
            <option value="">اختر الحي</option>
            <option value="النزهة">النزهة</option>
            <option value="الحزم">الحزم</option>
            <option value="الروضة">الروضة</option>
            <option value="المحمدية">المحمدية</option>
          </select>
        </div>
        <div class="container">
          <label for="الشارع">الشارع</label>
          <select id="street" name="u_streeat" required>
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
            <input type="text" name="u_address_short" required maxlength="8" pattern="[a-zA-Z]{4}\d{4}" title="يرجى إدخال 4 حروف ثم 4 أرقام">
            <button onclick="showST()" type="button">?</button>
          </div>
        </div>        
        <button   name="Payment" type="submit">تأكيد</button>
      </form>
      <div    class="shortTitle" id="shortTitle">
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
<?php
}