<?php
session_start();
if(!isset($_SESSION['uid']) && !isset($_SESSION['uname'])){
    header('location: login.php');
    exit();
}else {
include "db_conn.php";
include 'master.php';
if(!isset($_SESSION['uname'])){
    header('Location:index.php');
    exit();
}else{
    if (((isset($_GET['id_service']) && is_numeric($_GET['id_service'])) && ((isset($_GET['id_delivery']) && is_numeric($_GET['id_delivery']))))){
        $id_delivery= $_GET['id_delivery'];
        $id_service= $_GET['id_service'];
        $stmt = $conn->prepare("SELECT * FROM `sevices` WHERE id = :id");
        $stmt->bindParam(':id', $id_delivery);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $delivery = '';
        if ($result['id'] === 3) {
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = $id_service");
        }
        if ($result['id'] === 2) {
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = $id_service ");
        }
        if ($result['id'] === 1) {
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = $id_service ");
        }
        if ($result['id'] === 4) {
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = $id_service");
        }
        if ($result['id'] === 5) {
            $delivery = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = $id_service ");
        }
        $delivery->execute();
        $serv_delivery = $delivery->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="row">
                 <div class="col-md-4">
                    <div class="card1-group">';
        if ($serv_delivery) {
            foreach ($serv_delivery as $serv_deli) {
                echo '<li>' . $serv_deli['Fname'] . '</li><br>';
            }
        }
        echo '</div></div>';
        echo '<div class="col-md-4">  ';
        if ($result['id'] === 5){ ?>
            <br>
            <br>
            <br>
            <br>
            <div class="form-container mt-5">
                <form class="form-group" action="cod6e.php" method="post">
                    <input type="hidden" name="delivery_agent_id" value="<?php echo $serv_deli['ID_Number']?>">
                    <input type="hidden" name="type" value="<?php echo $result['id']?>">
                    <div class="form-group d-flex">
                        <label for="">نوع الطارود</label>
                        <div class="form-group">
                        <label for="Parcel_Type1">كسر</label>
                        <input type="radio" id="Parcel_Type1" name="Parcel_Type" value="كسر">
                        </div>
                        <div class="form-group">
                        <label for="Parcel_Type0">غير كسر</label>
                        <input type="radio" id="Parcel_Type0" name="Parcel_Type" value="غير كسر">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="serviceRequested">التكلفة</label>
                        <select id="Cost" name="Cost">
                            <option selected disabled>---</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                            <option value="125">125</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="requestNumber">اكتب التفاضيل </label>
                        <input type="text" id="Select_Details" name="Select_Details">
                    </div>
                    <div class="button-container">
                        <div class="form-group">
                            <button type="submit" name="parcel">تحديث الطلب</button>
                        </div></div>
                </form>
            </div>

        <?php }
        if ($result['id'] === 4){ ?>
            <br>
                    <br> <br>
                    <br> <br>
                    <br> <br>
                    <br>
                    <br> <br>
           <?php }

echo '<div class="card1-group"> ';
        if ($result['id'] === 2){ ?>
            <div class="container-1">
                <div class="content">
                    <h4> نموذج تعبئة الغاز</h4>
                    <div class="form-container">
                        <form class="form-group" action="cod6e.php" method="post">
                            <input type="hidden" name="delivery_agent_id" value="<?php echo $serv_deli['ID_Number']?>">
                            <input type="hidden" name="type" value="<?php echo $result['id']?>">
                            <!-- Number of cylinders -->
                            <label for="number-of-cylinders">عدد الاسطوانات<p class="star-required">*</p></label>
                            <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="Quantity" name="Quantity" placeholder="ادخل عدد الاسطوانات" required>
                            <!-- More options can be added here -->


                            <!-- Volume of cylinder -->
                            <label for="volume-of-cylinder">حجم الاسطوانة<p class="star-required">*</p></label>
                            <select id="type_sevices" name="type_sevices" required>
                                <option value="">اختر حجما</option>
                                <option value="small">16.4 كجم</option>
                                <option value="medium">27 كجم</option>
                                <!-- More options can be added here -->
                            </select>

                            <!-- User location -->
                            <label for="user-location">موقع المستخدم<p class="star-required">*</p></label>
                            <input type="text" id="location" name="location" placeholder="ادخل موقعك" required>
                            <a href="#">
                                <i class="fa fa-map-marker-alt" style="font-size: 24px; color: #ffffff;margin-right: 5px;" aria-hidden="true">
                                </i></a>
                            <!-- Packaging options -->
                            <fieldset>
                                <legend>التفاصيل<p class="star-required">*</p>
                                </legend>
                                <label>
                                    <input type="radio" name="packaging" value="0">
                                    تعبئة
                                </label>
                                <label>
                                    <input type="radio" name="packaging" value="1">
                                    جديد
                                </label>
                            </fieldset>
                            <!-- Submit button -->
                            <button type="submit" class="btn1" name="gas">إرسال الطلب</button>
                        </form>
                    </div>
                </div>
            </div>
       <?php }
                if ($result['id'] === 4){ ?> <br>
                    <div class="container1">
                        <div class="text-box">
                            <p align="justify" class="mb-4" style="color:black; font-size: 24px; direction: rtl;">
                                نخدمك
                                بأنواع
                                مختلفة من البنزين بكل سهولة إلى منزلك</p>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                            <div class="image-container">
                                <img src="img/se-gaz.png" alt="gasolin Illustration">
                            </div>
                        </div>
                        <form action="cod6e.php" method="post">
                            <input type="hidden" name="delivery_agent_id" value="<?php echo $serv_deli['ID_Number']?>">
                            <input type="hidden" name="type" value="<?php echo $result['id']?>">
                            <input type="hidden" name="price" value="<?php echo $result['price']?>">
                            <div class="form-group1">
                                <label for="type-of-gasoline">نوع الوقود <span class="star-required">*</span></label>
                                <select id="type_sevices" name="type_sevices" required>
                                    <option disabled selected>اختر نوع الوقود</option>
                                    <option value="95">95</option>
                                    <option value="91">91</option>
                                    <option value="ديزل">ديزل</option>
                                    <!-- More options can be added here -->
                                </select>
                            </div>
                            <div class="form-group1">
                                <label for="gasolin-of-liters">لتر البنزين <span class="star-required">*</span></label>
                                <input type="text" id="Quantity" name="Quantity" placeholder="ادخل كمية البنزين" required>
                            </div>
                            <div class="form-group1">
                                <label for="user-location">موقع المستخدم <span class="star-required">*</span></label>
                                <input type="text" id="location" name="location" placeholder="ادخل موقعك" required>
                                <!-- You can add the location icon here if you want -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="card-number">Card Number</label>
                                        <input type="text" id="Card_Number" name="Card_Number" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="card-holder">Card   Name</label>
                                        <input type="text" id="Name_Card" name="Name_Card"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expiration-date">Expiration Date</label>
                                        <input type="text" id="Expired_Date" name="Expired_Date" placeholder="MM/YYYY" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cvv">CVV</label>
                                        <input type="number" id="Catd_Type" name="Catd_Type"  required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn" name="checkout">إرسال الطلب</button>
                        </form>
                    </div>
               <?php }if ($result['id'] === 1){ ?>
            <div class="container-rlw" style="background-color: #ddd;padding: 30px;margin-top: 80px;">
                <div class="content-jsl">
                    <h4>نموذج حجز سائق</h4>
                    <div class="container-vsw">
                        <form action="cod6e.php" method="post" class="form-group-eei">
                            <input type="hidden" name="delivery_agent_id" value="<?php echo $serv_deli['ID_Number']?>">
                            <input type="hidden" name="type" value="<?php echo $result['id']?>">
                            <label for="location">نقطة الانطلاع<p class="star-vz1">*</p></label>
                            <input type="text" id="loc-jf7" placeholder="ادخل الموقع" name="location">
                            <a href="location.php">
                                <i class="fa-jqe map-wow style-ZBWpo" id="style-ZBWpo">
                                </i></a>
                            <label for="target-location">نقطة الوصول<p class="star-vz1">*</p></label>
                            <input type="text" id="tar-jzo" placeholder="ادخل العنوان" name="target_location">
                            <a href="location.php">
                                <i class="fa-jqe map-wow style-82xfr" id="style-82xfr">
                                </i></a>
                            <label for="start-date">تحديد اليوم <p class="star-vz1">*</p></label>
                            <input type="date" id="sta-cox" value="2024-01-16" name="start_date">
                            <label for="start-time">وقت الذهاب<p class="star-vz1">*</p></label>
                            <input type="time" id="sta-thy" value="05:40" name="start_time">
                            <button type="submit" name="BookDriver" class="btn-xdw">إرسال الطلب</button>
                        </form>
                        <pre></pre>
                    </div>
                </div>
            </div>
    <?php    }

                echo '</div>    <br>
                    <br> <br>
                    <br> <br>
                    <br>
                    <br> <br>
                    <br> <br>
                 
            </div>';
        if ($stmt->rowCount() > 0) {
            echo '
        <div class="col-md-4">
            <div class="card1-group">
                <div class="card1">
                    <div class="titlee">
                        <p>' . $result['service_name'] . '</p>
                        <p class="text-black-50">SR.' . $result['price'] . '</p>
                    </div>
                    <img src="img/' . $result['service_img'] . '">
                    <div class="layer"></div>
                    <div class="info">
                        <p>' . $result['service_notes'] . '</p>
                        <button> للمزيد</button>
                    </div>
                </div>
            </div>
        </div>
        </div>';
        } else {

            echo ' <div class="col-md-4 text-danger"> 
           <div class="card1-group">
 Not Found Any Content</div>
 </div>';
        }
    } else {
        echo "Not Found Any Content";
    }
}
}


include 'include/footer.php';

