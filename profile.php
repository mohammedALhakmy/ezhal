<?php
session_start();
ob_start();
if(!isset($_SESSION['uid']) && isset($_SESSION['delivery_dashboard'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    $uid = $_SESSION['uid'];
    $stmt = $conn->prepare("SELECT * FROM `delivery_agent` WHERE ID_Number = :uid");
    $stmt->bindParam(':uid', $uid);
    $stmt->execute();
    $beneficiary = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($beneficiary) {
        if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST['profile_submit'])) {
            $avatarName=$_FILES['photo']['name'];
            $avatarSize=$_FILES['photo']['size'];
            $avatarTmp=$_FILES['photo']['tmp_name'];
            $avatarType=$_FILES['photo']['type'];
            $avatarAllowedExtension=array("jpeg","jpg","pdf","png","gif");
            @ $avatarExtension=strtolower(end(explode('.',$avatarName)));
            $avatar =rand(0,100000000).'_'.$avatarName;
            move_uploaded_file($avatarTmp,"img/profile/".$avatar);
            $Fname = $_POST['Fname'];
            $Email = $_POST['Email'];
            $notes = $_POST['notes'];
            $Availability = $_POST['Availability'];
            $sessionID = $_SESSION['uid'];
            $phone = $_POST['phone'];
            $date_barth = $_POST['date_barth'];
            $area = $_POST['area'];
            $ac_tw = $_POST['ac_tw'];
            $ac_f = $_POST['ac_f'];
            $ac_li = $_POST['ac_li'];
            $ac_in = $_POST['ac_in'];
            $OldPassword = $_POST['OldPassword'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            if ($password === $password_confirm) {
                $PasswordConf =password_hash($_POST['password'],PASSWORD_BCRYPT,["cost"=>6]);
                $stmt = $conn->prepare("UPDATE `delivery_agent` SET Fname=:Fname, Email=:Email, photo=:photo, notes=:notes,
                            date_barth=:date_barth, area=:area, phone=:phone, ac_f=:ac_f, ac_tw=:ac_tw, ac_li=:ac_li, ac_in=:ac_in, Password=:Password, 
                            Availability=:Availability WHERE ID_Number=:ID_Number");
                $stmt->execute([
                    'Fname' => $Fname,
                    'Email' => $Email,
                    'photo' => $avatar,
                    'notes' => $notes,
                    'date_barth' => $date_barth,
                    'area' => $area,
                    'phone' => $phone,
                    'ac_f' => $ac_f,
                    'ac_tw' => $ac_tw,
                    'ac_li' => $ac_li,
                    'ac_in' => $ac_in,
                    'Password' => $PasswordConf,
                    'Availability' => $Availability,
                    'ID_Number' => $sessionID // هنا يجب تحديد الشرط الذي يحدد أي سجل سيتم تحديثه
                ]);
                header('location: delivery_dashboard.php');
            }else{
                $stmt = $conn->prepare("UPDATE `delivery_agent` SET Fname=:Fname, Email=:Email, photo=:photo, notes=:notes,
                            date_barth=:date_barth, area=:area, phone=:phone, ac_f=:ac_f, ac_tw=:ac_tw, ac_li=:ac_li, ac_in=:ac_in, 
                            Availability=:Availability WHERE ID_Number=:ID_Number");
                $stmt->execute([
                    'Fname' => $Fname,
                    'Email' => $Email,
                    'photo' => $avatar,
                    'notes' => $notes,
                    'date_barth' => $date_barth,
                    'area' => $area,
                    'phone' => $phone,
                    'ac_f' => $ac_f,
                    'ac_tw' => $ac_tw,
                    'ac_li' => $ac_li,
                    'ac_in' => $ac_in,
                    'Availability' => $Availability,
                    'ID_Number' => $sessionID // هنا يجب تحديد الشرط الذي يحدد أي سجل سيتم تحديثه
                ]);
                header('location: delivery_dashboard.php');
            }


        }
        ?>
    <br>
    <br>
    <br>
    <br>
    <br>
        <link href="./Send Request Page_files/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./Send Request Page_files/style.css">
        <link rel="stylesheet" href="css/sty5le.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4" style="text-align: right; font-family: 'Noto Kufi Arabic', sans-serif;">
        إعدادات الحساب
    </h4>

    <div class="card overflow-hidden">
        <form action="profile.php" method="post" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-primary"
                                style="display: inline-block; background-color: #06657a;" name="profile_submit">حفظ التغيرات</button>
                        <button type="button" class="btn btn-default"
                                style="display: inline-block; margin-left: 5px;">إلغاء</button>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="img/profile/<?php echo $beneficiary['photo'] ?>" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4" style="text-align: end;">
                                    <label class="btn btn-outline-primary">
                                        تغيير الصورة الشخصية
                                        <input type="file" accept="image/*"  name="photo" class="account-settings-fileinput">
                                    </label> &nbsp;
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">الإسم</label>
                                    <input type="text" class="form-control" name="Fname" value="<?php echo $beneficiary['Fname']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني</label>
                                    <input type="text" class="form-control mb-1" name="Email" value="<?php echo $beneficiary['Email']?>">

                                </div>

                                <div class="form-control">
                                    <label for="">مسار عمل المندوب</label>
                                    <select class="form-select" name="Availability" id="Availability">
                                        <option selected disabled>---</option>
                                        <option <?php echo $beneficiary['Availability'] === "1" ? "selected" : ""?> value="1">مندوب لدى بريد إزهل</option>
                                        <option <?php echo $beneficiary['Availability'] === "2" ? "selected" : ""?> value="2">مندوب الإنتقال بين المدن</option>
                                        <option <?php echo $beneficiary['Availability'] === "3" ? "selected" : ""?> value="3">مندوب سائق خاص</option>
                                        <option <?php echo $beneficiary['Availability'] === "4" ? "selected" : ""?> value="4">مندوب بنزين</option>
                                        <option <?php echo $beneficiary['Availability'] === "5" ? "selected" : ""?> value="5">مندوب غاز</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الحالية</label>
                                    <input type="password" name="OldPassword" value="<?php echo $beneficiary['Password']?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">كلمة المرور الجديدة</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">إعادة كلمة المرور الجديدة</label>
                                    <input type="password" name="password_confirm" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">نبذة عن المندوب</label>
                                    <textarea class="form-control" name="notes" rows="5"
                                              style="text-align: right;"><?php echo $beneficiary['notes']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">الميلاد</label>
                                    <input type="text" class="form-control" name="date_barth" value="<?php echo $beneficiary['date_barth']?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">المنطقة</label>
                                    <input type="text" class="form-control" name="area" value="<?php echo $beneficiary['area']?>">
                                </div>

                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">للتواصل</h6>
                                <div class="form-group">
                                    <label class="form-label">رقم الجوال</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $beneficiary['phone']?>">
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" name="ac_tw" value="<?php echo $beneficiary['ac_tw']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="ac_f" value="<?php echo $beneficiary['ac_f']?>">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" name="ac_li" value="<?php echo $beneficiary['ac_li']?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="ac_in" value="<?php echo $beneficiary['ac_in']?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
                    <script data-cfasync="false"
                            src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                    <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script type="text/javascript">

                    </script>
 <?php
}
}
