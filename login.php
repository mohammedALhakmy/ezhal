<?php
include 'master.php';
if(isset($_SESSION['uid'])){
    header('Location: services.php');  }
?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3" action="cod6e.php" method="post">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); endif; ?>

            <?php if(isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['errors']; ?>
                </div>
                <?php unset($_SESSION['errors']); endif; ?>
            <h4 class="display-4  fs-1">تسجيل الدخول</h4><br>
            <div class="form-control">
                <label for="">نوع تسجيل الدخول</label>
                <select name="type" id="type">
                    <option value="1">المستفيد</option>
                    <option value="2">موظف توصيل</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">ايميل المستخدم</label>
                <input type="text" class="form-control" name="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : ''; ?>">
            </div>


            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" name="password">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="دخول"/>
            <a href="regist.php" class="link-secondary">انشاء حساب</a>
        </form>
    </div>
<?php
include 'include/footer.php';
include 'include/script.php';
?>