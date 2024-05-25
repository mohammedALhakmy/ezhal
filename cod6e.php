<?php
session_start();
include  "db_conn.php";
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $Email = strtolower($_POST['Email']);
    $type = $_POST['type'];
    var_dump($type);
    $password = $_POST['password'];
    try {
        if ($type == 1) {
            $stmt = $conn->prepare("SELECT * FROM `beneficiary` WHERE Email=:email");
            $stmt->bindParam(':email', $Email);
            $stmt->execute();
            $beneficiary = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($beneficiary) {
                if(password_verify($password, $beneficiary['Password'])){
                    $_SESSION['uid']   =    $beneficiary['ID_Number'];
                    $_SESSION['uname'] =  $beneficiary['Fname'];
                    $_SESSION['uemail'] = $beneficiary['Email'];
                    $_SESSION['bene_dashboard'] = $beneficiary['ID_Number'];
                    $_SESSION['bene_id']   =    $beneficiary['ID_Number'];
                    header('location:bene_dashboard.php');
                    exit();
                } else {
                    $_SESSION['error'] = "كلمة المرور خاطئة";
                    header('location: login.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = "خطأ في البيانات";
                header('location: login.php');
                exit();
            }
        } else {
            $stmt = $conn->prepare("SELECT * FROM `delivery_agent` WHERE Email=:email");
            $stmt->bindParam(':email', $Email);
            $stmt->execute();
            $beneficiary = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($beneficiary) {
                if(password_verify($password,$beneficiary['Password'])){
                    $_SESSION['uid']   =    $beneficiary['ID_Number'];
                    $_SESSION['delivery_id']   =    $beneficiary['ID_Number'];
                    $_SESSION['uname'] =  $beneficiary['Fname'];
                    $_SESSION['uemail']= $beneficiary['Email'];
                    $_SESSION['Availability'] = $beneficiary['Availability'];
                    $_SESSION['delivery_dashboard']   =    $beneficiary['ID_Number'];
                    header('location: delivery_dashboard.php');
                    exit();
                } else {
                    $_SESSION['error'] = "كلمة المرور خاطئة";
                    header('location: login.php');
                    exit();
                }
            } else {
                $_SESSION['errors'] = "خطأ في البيانات";
                header('location: login.php');
                exit();
            }
        }
    } catch (PDOException $e) {
        echo "Failed to connect to database: " . $e->getMessage();
    }
}


if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['cod6e'])){
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $phone = $_POST['phone'];
    $Email = strtolower($_POST['Email']);
    $type = $_POST['type'];

    $Password =password_hash($_POST['Password'],PASSWORD_BCRYPT,["cost"=>6]);
    try {
        if ($type == 1) {
            $stmt = $conn->prepare("INSERT INTO `beneficiary`(`Fname`, `Lname`, `Email`,`phone`, `Password`)
                                VALUES (:Fname, :Lname, :Email,:phone, :Password)");
            $stmt->execute(['Fname' => $Fname, 'Lname' => $Lname, 'Email' => $Email,'phone'=>$phone, 'Password' => $Password]);
//            header('location: bene_dashboard.php');
            header('location: login.php');
        } elseif ($type == 2) {
            $delivery_option = $_POST['delivery_option'];
            $stmt = $conn->prepare("INSERT INTO `delivery_agent`(`Fname`, `Lname`, `Email`, `Password`,`Availability`)
                                VALUES (:Fname, :Lname, :Email, :Password,:Availability)");
            $stmt->execute(['Fname' => $Fname, 'Lname' => $Lname, 'Email' => $Email, 'Password' => $Password,'Availability'=>$delivery_option]);
//            header('location: delivery_dashboard.php');
            header('location: login.php');
        }
    } catch(PDOException $e) {
        echo "فشل التحميل: " . $e->getMessage();
    }
}


if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['checkout'])){
    $Order_Namber = rand(10000,100000);
    $Order_Date = date("Y-m-d");
    $Order_Time = date("H:m");
    $type_sevices = $_POST['type_sevices'];
    $Quantity = $_POST['Quantity'];
    $price = $_POST['price']*$Quantity;
    $VAT = $price * 0.15;
    var_dump($VAT);
    $totalPrice = $price + $VAT;
    $location = $_POST['location'];
    $delivery_agent_id = $_POST['delivery_agent_id'];
    $sessionID = $_SESSION['uid'];
    $type = $_POST['type'];
    $Card_Number = $_POST['Card_Number'];
    $Catd_Type = $_POST['Catd_Type'];
    $Expired_Date = $_POST['Expired_Date'];
    $Name_Card = $_POST['Name_Card'];
    $status = "pending";

    $stmt = $conn->prepare("INSERT INTO `payment`(`Card_Number`, `Catd_Type`, `Expired_Date`, `Name_Card`)
                                VALUES (:Card_Number, :Catd_Type, :Expired_Date,:Name_Card)");
    $stmt->execute(['Card_Number' => $Card_Number, 'Catd_Type' => $Catd_Type, 'Expired_Date' => $Expired_Date, 'Name_Card' => $Name_Card]);

    $stmt = $conn->prepare("INSERT INTO `gasoline`(`Order_Namber`, `type_sevices`, `location`, `Quantity`,`Order_Date`,`Order_Time`,`price`,`VAT`,`delivery_agent_id`,
                       `beneficiary_id`,`type_s`,`status`)
                                VALUES (:Order_Namber, :type_sevices, :location, :Quantity,:Order_Date,:Order_Time,:price,:VAT,:delivery_agent_id,:beneficiary_id,:type_s,:status)");
    $stmt->execute(['Order_Namber' => $Order_Namber, 'type_sevices' => $type_sevices, 'location' => $location, 'Quantity' => $Quantity,'Order_Date'=>$Order_Date,
        'Order_Time'=>$Order_Time,'price'=>$totalPrice,'VAT'=>$VAT,'delivery_agent_id'=>$delivery_agent_id,'beneficiary_id'=>$sessionID,'type_s'=>$type,'status'=>$status]);
    header('location:bene_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['BookDriver'])){
    $Order_Namber = rand(10000,100000);
    $location = $_POST['location'];
    $target_location = $_POST['target_location'];
    $start_date = $_POST['start_date'];
    $delivery_agent_id = $_POST['delivery_agent_id'];
    $type = $_POST['type'];
    $start_time = $_POST['start_time'];
    $sessionID = $_SESSION['uid'];
    $status = "pending";

    $stmt = $conn->prepare("INSERT INTO `book_driver`(`Order_Namber`, `location`, `target_location`, `start_date`, `start_time`, `beneficiary_id`,
                          `delivery_agent_id`, `type_b`, `status`) VALUES (:Order_Namber,:location,:target_location,:start_date,:start_time,:beneficiary_id,
                                                                           :delivery_agent_id,:type_b,:status)");
    $stmt->execute(['Order_Namber' => $Order_Namber, 'location' => $location, 'target_location' => $target_location, 'start_date' => $start_date,'start_time'=>$start_time,
        'beneficiary_id'=>$sessionID,'delivery_agent_id'=>$delivery_agent_id,'type_b' =>$type,'status'=>$status]);
    header('location:bene_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['gas'])){
    $Order_Namber = rand(10000,100000);
    $Quantity = $_POST['Quantity'];
    $type_sevices = $_POST['type_sevices'];
    $location = $_POST['location'];
    $packaging = $_POST['packaging'];
    $start_date =  date("Y-m-d");
    $start_time = date("H:m");
    $delivery_agent_id = $_POST['delivery_agent_id'];
    $sessionID = $_SESSION['uid'];
    $type = $_POST['type'];
    $status = "pending";
    $stmt = $conn->prepare("INSERT INTO `gas`(`Order_Namber`, `Quantity`, `type_sevices`, `location`, `packaging`, `Order_Date`, `Order_Time`, `delivery_agent_id`,
                  `beneficiary_id`, `type_s`, `status`) VALUES (:Order_Namber,:Quantity,:type_sevices,:location,:packaging,:Order_Date,
                                                                           :Order_Time,:delivery_agent_id,:beneficiary_id,:type_s,:status)");
    $stmt->execute([
        ':Order_Namber' => $Order_Namber,
        ':Quantity' => $Quantity,
        ':type_sevices' => $type_sevices,
        ':location' => $location,
        ':packaging' => $packaging,
        ':Order_Date' => $start_date,
        ':Order_Time' => $start_time,
        ':delivery_agent_id' => $delivery_agent_id,
        ':beneficiary_id' => $sessionID,
        ':type_s' => $type,
        ':status' => $status
    ]);

    header('location:bene_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['parcel'])){
    $Parcel_Type = $_POST['Parcel_Type'];
    $state = "pending";
    $Track_Number = rand(10000,100000);
    $Cost = $_POST['Cost'];
    $Select_Details = $_POST['Select_Details'];
    $address = $_POST['address'];
    $delivery_agent_id = $_POST['delivery_agent_id'];
    $sessionID = $_SESSION['uid'];
    $Order_Date =  date("Y-m-d");
    $Order_Time = date("H:m");
    $type_s = $_POST['type'];
    $name_futur = $_POST['name_futur'];
    $address_m = $_POST['address_m'];
    $phone = $_POST['phone'];
    try {
            $stmt = $conn->prepare("INSERT INTO `parcel`(`Parcel_Type`,`address`,`state`,`Track_Number`, `Cost`,`Select_Details`,`delivery_agent_id`,`beneficiary_id`,`Order_Date`,`Order_Time`,`type_s`)
                                VALUES (:Parcel_Type,:address, :state, :Track_Number, :Cost,:Select_Details,:delivery_agent_id,:beneficiary_id,:Order_Date,:Order_Time,:type_s)");
    $stmt->execute(['Parcel_Type' => $Parcel_Type,'address'=>$address, 'state' => $state, 'Track_Number' => $Track_Number, 'Cost' => $Cost,'Select_Details'=>$Select_Details,'delivery_agent_id'=>$delivery_agent_id,
        'beneficiary_id' =>$sessionID,'Order_Date'=>$Order_Date,'Order_Time'=>$Order_Time,'type_s'=>$type_s]);

        $stmt = $conn->prepare("INSERT INTO `future_data`(`ID_Nnmber`, `delivery_agent_id`, `beneficiary_id`, `Order_Date`, `Order_Time`, `type_s`, `name_futur`, `phone`, `address_m`)
                                VALUES (:ID_Nnmber,:delivery_agent_id, :beneficiary_id, :Order_Date, :Order_Time,:type_s,:name_futur,:phone,:address_m)");
        $stmt->execute(['ID_Nnmber' => $Track_Number,'delivery_agent_id'=>$delivery_agent_id, 'beneficiary_id' => $sessionID, 'Order_Date' => $Order_Date,
            'Order_Time' =>$Order_Time,'type_s'=>$type_s,'name_futur'=>$name_futur,'phone'=>$phone,'address_m'=>$address_m]);
            header('location: bene_dashboard.php');

    } catch(PDOException $e) {
        echo "فشل التحميل: " . $e->getMessage();
    }
}



if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['round_trip'])){

    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    // ذهاب
        $status = "1";
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $to_go = $_POST['to_go'];
    $to_get = $_POST['to_get'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $type_car = $_POST['type_car'];
    $plate_number = $_POST['plate_number'];
    $add_service = $_POST['add_service'];
    $sessionID = $_SESSION['uid'];
    $stmt = $conn->prepare("INSERT INTO `between_cities`(`status`,`delivery_agent_id`,`from_city`,`to_city`,`from_date`,`to_date`,`to_go`,
                             `to_get`,`qty`,`price`,`type_car`,`plate_number`,`add_service`)
                                VALUES (:status,:delivery_agent_id,:from_city, :to_city, :from_date, :to_date,:to_go,:to_get,:qty,:price,:type_car,:plate_number,:add_service)");
    $stmt->execute(['status'=>$status,'delivery_agent_id' => $sessionID,'from_city'=>$from_city, 'to_city' => $to_city, 'from_date' => $from_date, 'to_date' => $to_date,'to_go'=>$to_go,
        'to_get'=>$to_get,'qty' =>$qty,'price'=>$price,'type_car'=>$type_car,'plate_number'=>$plate_number,'add_service'=>$add_service]);
    header('location: round-trip.php');
}


if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['round'])){

    $from_city = $_POST['from_city'];
    $to_city = $_POST['to_city'];
    $status = $_POST['round_tri'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $to_go = $_POST['to_go'];
    // ذهاب واياب
    $status ="2";
    $to_get = $_POST['to_get'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $type_car = $_POST['type_car'];
    $plate_number = $_POST['plate_number'];
    $add_service = $_POST['add_service'];
    $sessionID = $_SESSION['uid'];
    $stmt = $conn->prepare("INSERT INTO `between_cities`(`status`,`delivery_agent_id`,`from_city`,`to_city`,`from_date`,`to_date`,`to_go`,
                             `to_get`,`qty`,`price`,`type_car`,`plate_number`,`add_service`)
                                VALUES (:status,:delivery_agent_id,:from_city, :to_city, :from_date, :to_date,:to_go,:to_get,:qty,:price,:type_car,:plate_number,:add_service)");
    $stmt->execute(['status'=>$status,'delivery_agent_id' => $sessionID,'from_city'=>$from_city, 'to_city' => $to_city, 'from_date' => $from_date, 'to_date' => $to_date,'to_go'=>$to_go,
        'to_get'=>$to_get,'qty' =>$qty,'price'=>$price,'type_car'=>$type_car,'plate_number'=>$plate_number,'add_service'=>$add_service]);
    header('location: round-trip.php');
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['type'])) {
    $type = $_POST['type'];
    $stmt = $conn->prepare("SELECT * FROM `between_cities` WHERE status=:status");
    $stmt->execute(['status' => $type]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="col-md-5">
        <select name="from_city" id="" class="from-trip form-select border-dark">
            <?php
            if ($results) {
                foreach ($results as $row) {
                    echo "<option value='" . $row['from_city'] . "' data-delivery-agent-id='" . $row['id'] . "'>" . $row['from_city'] . "</option>";

                }
            } else {
                echo "<option value=''>لا توجد بيانات متاحة</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-5">
        <select name="to_city" id="" class="to-trip form-select border-dark">
            <?php
            if ($results) {
                foreach ($results as $row) {
                    echo "<option value='" . $row['to_city'] . "' >" . $row['to_city'] . "</option>";                }
            } else {
                echo "<option value=''>لا توجد بيانات متاحة</option>";
            }
            ?>
        </select>
        <p class="error-to-trip"></p>
    </div>
<?php
} else {
    echo "<option value=''>لا توجد بيانات متاحة</option>";
}
?>


