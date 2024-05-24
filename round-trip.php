<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    ?>
    <br>
    <section class="edit-trip" style="margin-top: 30px; display: flex; flex-direction: column; align-items: center;">
        <div class="passenger-options">
            <button onclick="filter(1)" id="1" class="btn-theme" style="margin: 10px; background: #06657a;">ذهاب
                وإياب</button>
            <button onclick="filter(2)" id="2" class="btn-theme" style="margin: 10px;">ذهاب فقط</button>
        </div>
        <div id="goBack" class="form-container">
            <h3>ذهاب وإياب</h3>
            <form action="cod6e.php" method="post">
                <input type="hidden" name="go" id="go">
                <div class="container-in">
                    <label for="departureTime">من</label>
                    <input type="text" name="from_city" id="departureTime" required>
                </div>
                <div class="container-in">
                    <label for="returnTime">الى</label>
                    <input type="text" name="to_city" id="returnTime" required>
                </div>
                <div class="container-in">
                    <label for="تاريخ المغادرة">تاريخ المغادرة</label>
                    <input type="date" name="from_date" id="">
                </div>
                <div class="container-in">
                    <label for="تاريخ العودة">تاريخ العودة</label>
                    <input type="date" name="to_date" id="">
                </div>
                <div class="container-in">
                    <label for="وقت المغادرة">وقت المغادرة</label>
                    <input type="time" name="to_go" id="">
                </div>
                <div class="container-in">
                    <label for="وقت العودة">وقت العودة</label>
                    <input type="time" name="to_get" id="">
                </div>
                <div class="big">
                    <label for="عدد المقاعد">عدد المقاعد</label>
                    <input type="number" name="qty" id="">
                </div>
                <div class="big">
                    <label for="سعر المقعد">سعر المقعد</label>
                    <input type="text" name="price" id="">
                </div>
                <div class="container-in">
                    <label for="نوع السيارة">نوع السيارة</label>
                    <select name="type_car" required>
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
                    <input type="number" placeholder="رقم لوحة السيارة" name="plate_number" required>
                </div>
                <div class="big">
                    <label for="خدمات إضافية">خدمات إضافية</label>
                    <input type="text" placeholder="خدمات إضافية" name="add_service">
                </div>
                <button type="submit" name="round">تأكيد</button>
            </form>
        </div>
        <div id="goOnly" class="form-container" style="display: none;">
            <h3>ذهاب فقط</h3>
            <form action="cod6e.php" method="post">
                <input type="hidden" name="round_tri" id="round_tri">
                <div class="container-in">
                    <label for="departureTime">من</label>
                    <input type="text" name="from_city" id="departureTime" required>
                </div>
                <div class="container-in">
                    <label for="returnTime">الى</label>
                    <input type="text" name="to_city" id="returnTime" required>
                </div>
                <div class="container-in">
                    <label for="تاريخ المغادرة">تاريخ المغادرة</label>
                    <input type="date" name="from_date" id="">
                </div>

                <div class="container-in">
                    <label for="وقت المغادرة">وقت المغادرة</label>
                    <input type="time" name="to_go" id="">
                </div>

                <div class="big">
                    <label for="عدد المقاعد">عدد المقاعد</label>
                    <input type="number" name="qty" id="">
                </div>
                <div class="big">
                    <label for="سعر المقعد">سعر المقعد</label>
                    <input type="text" name="price" id="">
                </div>
                <div class="container-in">
                    <label for="نوع السيارة">نوع السيارة</label>
                    <select name="type_car" required>
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
                    <input type="number" placeholder="رقم لوحة السيارة" name="plate_number" required>
                </div>
                <div class="big">
                    <label for="خدمات إضافية">خدمات إضافية</label>
                    <input type="text" placeholder="خدمات إضافية" name="add_service">
                </div>
                <button type="submit" name="round_trip">تأكيد</button>
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
<?php

}
?>

