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
    <title>الصفحة الشخصية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/profile edit/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-edit-profile {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php   include('master.php'); ?>
<form action="/php/edit_profile.php" method="POST">
<div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4" style="text-align: right; font-family: 'Noto Kufi Arabic', sans-serif;">
            إعدادات الحساب
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">عام</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">تغيير كلمة المرور </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">نبذة
                            عن المندوب </a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">حسابات التواصل الإجتماعي</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">الطلبات</a>
                    </div>
                    <div class="mt-3" style="text-align: center;">
                        <a href="/edit_profile.php" type="button" class="btn btn-primary"
                            style="display: inline-block; background-color: #06657a;">حفظ التغيرات</a>
                        <a href="/index.php" type="button" class="btn btn-default"
                            style="display: inline-block; margin-left: 5px;">إلغاء</a>
                    </div>


                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                            <img src="upload/<?= $user['pp'] ?>" class="profile-image img-fluid">
                                    
                                <div class="media-body ml-4">
                                    
                                   
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">الإسم</label>
                                    <input type="text" class="form-control" value="<?= $user['fname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="text" class="form-control mb-1" value="demo@mail.com">

                                </div>
                                <div class="form-group">
                                    <label class="form-label">مسار عمل المندوب</label>
                                    <input type="text" class="form-control" value="سائق خاص">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الحالية</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">إعادة كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">نبذة عن المندوب</label>
                                    <textarea class="form-control" rows="5"
                                        style="text-align: right;">اعمل كمندوب في منصة إزهل للخدمات اللوجستية</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الميلاد</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">المنطقة</label>
                                    <select class="custom-select">
                                        <option selected>الخرمة</option>
                                        <option>الخليج</option>
                                        <option>الدغمية</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">للتواصل</h6>
                                <div class="form-group">
                                    <label class="form-label">رقم الجوال</label>
                                    <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                            </div>




                            <div class="tab-pane fade" id="account-notifications">
                                <div class="card-body pb-2">
                                    <h6 class="mb-4">الطلبات</h6>
                                    <div class="row">
                                        <div class="col" style="text-align: center;">
                                            <button type="button" class="btn btn-primary"
                                                style="background-color: #06657a; width: 150px;">الحالية</button>
                                            <button type="button" class="btn btn-primary"
                                                style="background-color: #06657a; width: 150px;">السابقة</button>
                                        </div>
                                    </div>


                                </div>
                            </div>





    
   

</form>
  <script data-cfasync="false"
                            src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
                        <script type="text/javascript">
</body>

</html>

<?php } else {
    header("Location: login.php");
    exit;
} ?>
