<?php
session_start();
include  "db_conn.php";
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
    $Email = strtolower($_POST['Email']);
    $type = $_POST['type'];
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
                    $_SESSION['uemail']= $beneficiary['Email'];
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
                    $_SESSION['uname'] =  $beneficiary['Fname'];
                    $_SESSION['uemail']= $beneficiary['Email'];
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
if(isset($_POST['login'])){
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $password = $_POST['password'];

    if(empty($user)){
        echo '<div class="alert alert-danger" role="alert">ادخل اسم المستخدم او البريد الالكتروني</div>';
    } elseif(empty($password)){
        echo '<div class="alert alert-danger" role="alert">ادخل كلمة المرور</div>';
    } else{
        $sql = "SELECT * FROM users WHERE (username = ? OR email = ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $user, $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            $userData = mysqli_fetch_assoc($result);
            if(password_verify($password, $userData['password'])){
                $_SESSION['id'] = $userData['user_id'];
                $_SESSION['user'] = $userData['username'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['role'] = $userData['role'];
                $_SESSION['uni_id'] = $userData['uni_id'];
                $_SESSION['col_id'] = $userData['col_id'];
                $_SESSION['dep_id'] = $userData['dep_id'];
                $_SESSION['lap_id'] = $userData['lap_id'];
                $_SESSION['loged'] = true;
                header("location: ./index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">اسم الدخول او كلمة المرور غير صحيحة</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">اسم الدخول او البريد الالكتروني غير موجود</div>';
        }

        mysqli_stmt_close($stmt);
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
            $stmt = $conn->prepare("INSERT INTO `delivery_agent`(`Fname`, `Lname`, `Email`, `Password`)
                                VALUES (:Fname, :Lname, :Email, :Password)");
            $stmt->execute(['Fname' => $Fname, 'Lname' => $Lname, 'Email' => $Email, 'Password' => $Password]);
//            header('location: delivery_dashboard.php');
            header('location: login.php');
        }
    } catch(PDOException $e) {
        echo "فشل التحميل: " . $e->getMessage();
    }
}


