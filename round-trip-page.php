<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    ?>
   <main>
       <br>
       <br>
       <br>
       <br>
       <br>

       <section>
           <div class="round-trip">
               <div class="container">
                   <div class="details" style="display: flex; justify-content: center; flex-direction: column; align-items: center;">
                       <h2 class="title-header">النقل بين المدن</h2>
                       <div class="content">
                           <form class="options" onsubmit="return validateForm()" action="TheTrips.php" method="post">
                               <div class="check-label d-flex">
                                   <label for="type_2">ذهاب واياب</label>
                                   <input type="radio" name="type" id="type_2" class="type" value="2">
                                   <label for="type_1">ذهاب فقط</label>
                                   <input type="radio" name="type" id="type_1" class="type" value="1">
                                   <input type="hidden" name="delivery_agent_id" id="delivery_agent_id" value="">
                                   <p class="error-type"></p>
                               </div>
                               <br>
                               <div class="row mb-3" id="data-container">

                               </div>
                               <div>
                                   <span style="width: 40%; background: none; border: 1px solid #000; border-radius: 10px;" id="passenger-button"> &#9660; المسافرين</span>
                                   <div class="passenger-options" style="display: none; width: 100%;">
                                       <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" >
                                           <div style="display: flex; align-items: center; width: 50px; margin-right: 60px; ">
                                               <button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button>
                                               <input id="adults-input" name="adults" style="width: 50px; margin: 0 10px;" type="number" min="0">
                                               <button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button>
                                           </div>
                                           <p style="color: #000; margin: 0 10px;">البالغين</p>
                                       </div>
                                       <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" >
                                           <div style="display: flex; align-items: center; width: 50px; margin-right: 60px; ">
                                               <button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button>
                                               <input id="children-input" name="children" style="width: 50px; margin: 0 10px;" type="number" min="0">
                                               <button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button></div>
                                           <p style="color: #000; margin: 0 10px;">الأطفال</p>
                                       </div>
                                       <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" >
                                           <div style="display: flex; align-items: center; width: 50px; margin-right: 60px; ">
                                               <button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button>
                                               <input id="infants-input" name="infants" style="width: 50px; margin: 0 10px;" type="number" >
                                               <button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button>
                                           </div>
                                           <p style="color: #000; margin: 0 10px;">الرضع</p>
                                       </div>
                                       <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" >
                                           <div style="display: flex; align-items: center; width: 50px; ">
                                               <button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button>
                                               <input id="special-needs-input" name="special_needs" style="width: 50px; margin: 0 10px;" type="number" min="0">
                                               <button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button>
                                           </div>
                                           <p style="color: #000; margin: 0 10px;">الأحتياجات الخاصة</p>
                                       </div>
                                       <div style="display: flex; width: 100%; justify-content: space-between; align-items: center; direction: ltr;" >
                                           <div style="display: flex; align-items: center; width: 50px; margin-right: 60px; "><button onclick="increaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">+</button>
                                               <input id="student-input" name="student" style="width:50px; margin: 0 10px;" type="number" min="0">
                                               <button onclick="decreaseValue(this)" style="border: none; font-size: 30px; background: none; padding: 0;" type="button">-</button>
                                           </div>
                                           <p style="color: #000; margin: 0 10px;">طالب</p>
                                       </div>
                                   </div>
                                   <p class="error-to-trip"></p>
                               </div>
                               <div class="range-search">
                                   <div class="range">
                                       <h4>نطاق البحث</h4>
                                   </div>
                                   <ul class="list">
                                       <li><input type="radio" name="teceat" value="اليوم" class="radio-list"> اليوم </li>
                                       <li><input type="radio" name="teceat" value=" ثلاثة ايام القادمة" class="radio-list"> ثلاثة ايام القادمة </li>
                                       <li><input type="radio" name="teceat" value=" الاسبوع القادم" class="radio-list"> الاسبوع القادم </li>
                                   </ul>
                                   <p class="error-radio-list"></p>
                               </div>
                               <div class="row">
                                   <div class="col-md-12 text-center ">
                                       <div class="btn text-center ">
                                           <button type="submit" name="compact_pocket" class="btn-theme"> تكمله الرحله </button>
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



   </main>
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
<?php
    }