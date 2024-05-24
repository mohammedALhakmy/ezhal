<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['compact_pocket'])){
    $type = $_POST['type'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $infants = $_POST['infants'];
    $special_needs = $_POST['special_needs'];
    $student = $_POST['student'];
    $to_city = $_POST['to_city'];
    $from_city = $_POST['from_city'];
    $teceat = $_POST['teceat'];
    $sessionID = $_SESSION['uid'];
    $stmt = $conn->prepare("INSERT INTO `transportation_between_cities`(`type`, `adults`, `children`, `infants`, `special_needs`, `student`, `to_city`, `from_city`, `teceat`, `beneficiary_id`)
                                VALUES (:type,:adults,:children, :infants, :special_needs, :student,:to_city,:from_city,:teceat,:beneficiary_id)");
    $stmt->execute(['type'=>$type,'adults' => $adults,'children'=>$children, 'infants' => $infants, 'special_needs' => $special_needs, 'student' => $student,'to_city'=>$to_city,
        'from_city'=>$from_city,'teceat' =>$teceat,'beneficiary_id'=>$sessionID]);
    $last_insert_id = $conn->lastInsertId();
    ?>
    <br>
    <br>
    <br>
    <br>
    <section>
        <h2 style="text-align: center; padding-top: 40px; margin-bottom: -80px;">تفاصيل الرحلة</h2>
        <div class="form-container">
            <form action="./sendrequestpage.php" method="post">
                <input type="hidden" name="transportation_between_citie_id" value="<?php echo $last_insert_id ?>">
                <div class="container">
                    <label for="اللقب">اللقب</label>
                    <select name="Title">
                        <option value="" disabled>اللقب</option>
                        <option value="السيد">السيد</option>
                        <option value="السيدة">السيدة</option>
                    </select>
                </div>
                <div class="container">
                    <label for="الاسم الاول">الاسم الاول</label>
                    <input type="text" placeholder="الاسم الاول"  name="f_name" required>
                </div>

                <div class="container">
                    <label for="الاسم الاخير">الاسم الاخير</label>
                    <input type="text" placeholder="الاسم الاخير" name="l_name" required>
                </div>
                <div class="container">
                    <label for="تاريخ الميلاد">تاريخ الميلاد</label>
                    <input type="date"  placeholder="تاريخ الميلاد"  name="birth_date" required>
                </div>
                <div class="big">
                    <label for="الجنسية">الجنسية</label>
                    <select name="nationality">
                        <option value="" disabled>اختر الجنسية</option>
                        <option value="PS">فلسطين</option>
                        <option value="YE">اليمن</option>
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
                        <option value="QA">قطر</option>
                        <option value="SA">المملكة العربية السعودية</option>
                        <option value="SD">السودان</option>
                        <option value="SY">سوريا</option>
                        <option value="TN">تونس</option>
                        <option value="AE">الإمارات العربية المتحدة</option>
                    </select>
                </div>
                <div class="container">
                    <label for="رقم الهوية/ الاقامة">رقم الهوية/ الاقامة</label>
                    <input type="text" placeholder="رقم الهوية/ الاقامة"  name="id_number"  required>
                </div>
                <div class="container">
                    <label for="بلد الاصدار">بلد الاصدار</label>
                    <input type="text" placeholder="بلد الاصدار" name="not_number" required>
                </div>
                <div class="big">
                    <label for="تاريخ انتهاء الصلاحية">تاريخ انتهاء الصلاحية</label>
                    <input type="date" placeholder="تاريخ انتهاء الصلاحية" name="expire_number" required>
                </div>
                <div class="container">
                    <label for="بريد إلكتروني لاستلام التذكرة الإلكترونية">بريد إلكتروني لاستلام التذكرة الإلكترونية</label>
                    <input type="email" name="email" placeholder="بريد إلكتروني لاستلام التذكرة الإلكترونية" required>
                </div>
                <div class="container">
                    <label for="رقم الجوال">رقم الجوال</label>
                    <input type="tel" id="phone" placeholder="رقم الجوال" name="phone_u" required>
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
<?php
}
}