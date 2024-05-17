<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    include "db_conn.php";
    include 'php/User.php';

    $user = getUserById($_SESSION['id'], $conn);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تحرير الملف الشخصي</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 450px;
            width: 100%;
            animation: slideInDown 0.5s ease forwards;
        }

        .form-card h4 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .form-card img {
            width: 70px;
            margin-top: 10px;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form class="form-card shadow" action="php/edit_profile.php" method="post" enctype="multipart/form-data">

            <h4 class="display-4">تحرير الملف الشخصي</h4>
            <!-- error -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <!-- success -->
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">الإسم</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $user['fname'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">اسم المستخدم</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $user['username'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">تحرير الصورة</label>
                <input type="file" class="form-control" name="pp">
                <img src="upload/<?= $user['pp'] ?>" class="rounded-circle">
                <input type="hidden" name="old_pp" value="<?= $user['pp'] ?>">
            </div>

            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="profile.php" class="btn btn-secondary">الصفحة الرئيسية</a>
        </form>
    </div>
</body>

</html>

<?php } else {
    header("Location: login.php");
    exit;
} ?>
