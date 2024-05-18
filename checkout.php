<?php
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
        echo '<div class="col-md-4"> 
<div class="card1-group"> ';
                if ($result['id'] === 4){ ?> <br>
                    <br>
                    <br> <br>
                    <br> <br>
                    <div class="container1">
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
               <?php }
                echo '</div>
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


include 'include/footer.php';

