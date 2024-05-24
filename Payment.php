<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
include "db_conn.php";
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Payment'])) {
    $trip_id = $_POST['trip_id'];
    $u_ciy = $_POST['u_ciy'];
    $u_hay = $_POST['u_hay'];
    $u_streeat = $_POST['u_streeat'];
    $u_address_short = $_POST['u_address_short'];
    $stmt = $conn->prepare("INSERT INTO `your_location`( `u_lovation`, `u_ciy`, `u_hay`, `u_streeat`, `u_address_short`, `trip_id`)
                                VALUES (:u_lovation,:u_ciy,:u_hay, :u_streeat, :u_address_short, :trip_id)");
    $stmt->execute(['u_lovation' => $u_address_short, 'u_ciy' => $u_ciy, 'u_hay' => $u_hay, 'u_streeat' => $u_streeat, 'u_address_short' => $u_address_short, 'trip_id' => $trip_id]);
}
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['paymentFinish'])) {
    $full_name   = $_POST['Fname'];
    $name_in_card = $_POST['card_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
        $streeat = $_POST['streeat'];
    $zip = $_POST['add_parid'];
    $cvv = $_POST['cvv'];
    $cardnumber = $_POST['card_number'];
    $expyear = $_POST['year'];
    $expmonth = $_POST['month'];
        $stmt = $conn->prepare("INSERT INTO `payment_city`( `Fname`, `email`, `address`, `city`, `streeat`, `add_parid`, `year`, `cvv`, `month`, `card_number`, `card_name`)
                                VALUES (:Fname,:email,:address, :city, :streeat, :add_parid,:year,:cvv,:month,:card_number,:card_name)");
        $stmt->execute(['Fname' => $full_name, 'email' => $email, 'address' => $address, 'city' => $city, 'streeat' => $streeat,'add_parid'=>$zip,'year'=>$expyear,
            'cvv'=>$cvv,'month'=>$expmonth,'card_number'=>$cardnumber,'card_name'=>$name_in_card]);
           header('location: bene_dashboard.php');
}
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Payment</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  direction:rtl;
}

* {
  box-sizing: content-box;
  margin-bottom:auto;
  animation-direction:alternate;
  justify-content: center;
  font-family: "Noto Kufi Arabic", sans-serif;
  border-radius: 7px !important;
}

.row {
  display: -ms-flexbox;
  display:flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 16px -16px;


}

.col-20 {
  -ms-flex: 20%; /* IE10 */
  flex: 20%;
}

.col-45 {
  -ms-flex: 45%; /* IE10 */
  flex: 45%;
}

.col-70 {
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
}

.col-20,
.col-45,
.col-70 {
  padding: 0 14px;
}

.container {
  background-color: #f2f2f2;
  padding: 31px 150px 13px 18px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 50%;
  margin-bottom: 18px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius:1px;
}

label {
  margin-bottom: 8px;
  display: block;
}

.icon-container {
  margin-bottom: 18px;
  padding: 5px 0;
  font-size: 22px;
}
.text-center{
        text-align: center;
    }
.btn {
  background-color: #06657A;
  color: white;
  padding: 10px;
  margin:auto;
  border: none;
  width: 50%;
  border-radius: 1px;
  cursor: pointer;
  font-size: 15px;
}

.btn:hover {
  background-color: #F57300;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

#ppup {
  width: 200px;
  margin: 0 auto -40px;
  background: #06657a;
  opacity: 0;
  transform: translateY(-40px);
  transition: all 0.4s;
}

.active-ppup {
  opacity: 1 !important;
  transform: translateY(0) !important;
}


</style>
</head>
<body>


<h2>صفحة الدفع</h2>
<div  id="ppup"class="<?php if(isset($_GET['message'])){
    echo $_GET['message'];
  }?>" >
    <h2 style="color: #fff; text-align: center;">تم الدفع</h2>
  </div>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="Payment.php" method="post">
        <div class="row">
          <div class="col-50">
            <h3>العنوان</h3>
            <input type="hidden" name="trip_id" value="1">
            <label for="fname"><i class="fa fa-user"></i>الإسم كامل </label>
            <input type="text" id="fname" name="Fname" placeholder="الاء السبيعي">
            <label for="email"><i class="fa fa-envelope"></i> البريد الإلكتروني</label>
            <input type="text" id="email" name="email" placeholder="@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> العنوان</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i>المدينة</label>
            <input type="text" id="city" name="city" placeholder="الطائف">

            <div class="row">
              <div class="col-50">
                <label for="state">الشارع</label>
                <input type="text" id="state" name="streeat" placeholder="الشارع">
              </div>
              <div class="col-50">
                <label for="zip">العنوان البريدي</label>
                <input type="text" id="zip" name="add_parid" placeholder="10001">
              </div>
            </div>
          </div>
<div class="col-50" >
            <h3>طريقة الدفع</h3>
            <label for="fname">معلومات البطاقة</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">الإسم الموجود على البطاقة</label>
            <input type="text" id="cname" name="card_name" placeholder=" الاء السبيعي" onkeyup="english_only()">
            <p id="msg">&nbsp;</p>
            <label for="ccnum">رقم البطاقة الائتمانية</label>
            <input type="text" id="ccnum" name="card_number" placeholder="1111-2222-3333-4444">
            <label for="expmonth">الشهر</label>
            <input type="text" id="expmonth" name="month" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">السنة</label>
                <input type="text" id="expyear" name="year" placeholder="2024">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
              </div></div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> حفظ العنوان
        </label>
        <div class="text-center">
          <input type="submit"  value="تأكيد الدفع"  name="paymentFinish" class="btn m-auto">
      </div>
      </form>
    </div>
  </div>
  

    </div>
    <button onclick="goBack()" style="margin: 0 40px 40px 0 !important; background: #06657a; color: #fff; font-size: 38px; font-weight: 900; border: none; padding: 2px 15px; border-radius: 4px;">&rarr;</button>
    <script>
        function goBack() {
          window.history.back();
        }

        const popup = () => {
          document.getElementById("ppup").classList.toggle("active-ppup")
        }
        
        function english_only(){

var cname = document.getElementById("cname").value;
var  msg = document.getElementById("msg");
if(!((/^[a-zA-Z]+$/.test(cname)) || cname.length ==0)){

  msg.style.display ="block";
  msg.style.color ="red";
  msg.innerHTML="only english langauge";
  cityf = true;
}else{
  msg.style.display = "none";
  cityf = false;
}

}
</script>





</body></html>
<?php
}