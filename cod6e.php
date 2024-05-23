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
    $Email = strtolower($_POST['Email']);
    $type = $_POST['type'];

    $Password =password_hash($_POST['Password'],PASSWORD_BCRYPT,["cost"=>6]);
    try {
        if ($type == 1) {
            $stmt = $conn->prepare("INSERT INTO `beneficiary`(`Fname`, `Lname`, `Email`, `Password`)
                                VALUES (:Fname, :Lname, :Email, :Password)");
            $stmt->execute(['Fname' => $Fname, 'Lname' => $Lname, 'Email' => $Email, 'Password' => $Password]);
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
    $delivery_agent_id = $_POST['delivery_agent_id'];
    $sessionID = $_SESSION['uid'];
    $Order_Date =  date("Y-m-d");
    $Order_Time = date("H:m");
    $type_s = $_POST['type'];
    try {
            $stmt = $conn->prepare("INSERT INTO `parcel`(`Parcel_Type`,`state`,`Track_Number`, `Cost`,`Select_Details`,`delivery_agent_id`,`beneficiary_id`,`Order_Date`,`Order_Time`,`type_s`)
                                VALUES (:Parcel_Type, :state, :Track_Number, :Cost,:Select_Details,:delivery_agent_id,:beneficiary_id,:Order_Date,:Order_Time,:type_s)");
    $stmt->execute(['Parcel_Type' => $Parcel_Type, 'state' => $state, 'Track_Number' => $Track_Number, 'Cost' => $Cost,'Select_Details'=>$Select_Details,'delivery_agent_id'=>$delivery_agent_id,
        'beneficiary_id' =>$sessionID,'Order_Date'=>$Order_Date,'Order_Time'=>$Order_Time,'type_s'=>$type_s]);
            header('location: bene_dashboard.php');

    } catch(PDOException $e) {
        echo "فشل التحميل: " . $e->getMessage();
    }
}


