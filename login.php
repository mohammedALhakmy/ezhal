<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Login Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="container" id="container">
        <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); endif; ?>

        <div class="form-container sign-up">
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            <form class="shadow w-450 p-3" action="cod6e.php" method="post">
                <h1>إنشاء حساب</h1>
                <span>أو استخدم بريدك الالكتروني للتسجيل</span>
                <input type="text" name="Fname" placeholder="الإسم">
                <input type="email" name="Email" placeholder="البريد الالكتروني">
                <input type="password" name="password" placeholder="كلمة المرور">
                <div class="form-control">
                    <label for="">نوع تسجيل الدخول</label>
                    <select name="type" id="type">
                        <option value="1">المستفيد</option>
                        <option value="2">موظف توصيل</option>
                    </select>
                </div>
                <div class="form-control mt-3" id="delivery-options" style="display: none;">
                    <div class="form-control">
                        <label for="">خيارات موظف التوصيل</label>
                        <select class="form-select" name="delivery_option" id="delivery_option">
                            <option selected disabled>---</option>
                            <option value="1">مندوب لدى بريد إزهل</option>
                            <option value="2">مندوب الإنتقال بين المدن</option>
                            <option value="3">مندوب سائق خاص</option>
                            <option value="4">مندوب بنزين</option>
                            <option value="5">مندوب غاز</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="cod6e" class="btn btn-primary">التسجيل</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); endif; ?>

            <form action="cod6e.php" method="post">
                <h1>تسجيل الدخول</h1>
                <span>أو إستخدام بريدك الإلكتروني</span>
                <input type="email" name="Email" placeholder="البريد الإلكتروني">
                <input type="password" name="password" placeholder="كلمة المرور">
                <div class="form-control">
                    <label for="">نوع تسجيل الدخول</label>
                    <select name="type" id="type">
                        <option value="1">المستفيد</option>
                        <option value="2">موظف توصيل</option>
                    </select>
                </div>
                <a href="#">هل نسيت كلمة المرور؟</a>
                <button type="submit" name="submit" class="btn btn-primary">تسجيل الدخول</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>أهلا بعودتك</h1>
                    <p>أدخل بياناتك لتتمكن من إستخدام كافة ميزات موقنا</p>
                    <button class="hidden" id="login">تسجيل الدخول</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>مرحبا بك</h1>
                    <p>سجل بياناتك لتتمكن من إستخدام كافة ميزات موقنا</p>
                    <button class="hidden" id="register">التسجيل</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function() {
            var type = this.value;
            var deliveryOptions = document.getElementById('delivery-options');

            if (type == 2) {
                deliveryOptions.style.display = 'block';
            } else {
                deliveryOptions.style.display = 'none';
            }
        });
    </script>
    <script src="js/script1.js"></script>
</body>

</html>