<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل المندوب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3" 
              action="d_process.php" 
              method="post"
              enctype="multipart/form-data">

            <h4 class="display-4  fs-1"> التسجيل كمندوب لدى إزهل</h4><br>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">الإسم :</label>
                <input type="text" 
                       class="form-control"
                       name="deliveryagent_name"
                       id="deliveryagent_name"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">اسم المستخدم:</label>
                <input type="text" 
                       class="form-control"
                       name="username"
                       id="username"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">كلمة المرور:</label>
                <input type="password" 
                       class="form-control"
                       name="password"
                       id="password"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">نوع المندوب:</label>
                <select class="form-select" 
                        name="deliveryagent_type"
                        id="deliveryagent_type"
                        required>
                    <option selected disabled value="">اختر النوع</option>
                    <option value="gaz">مندوب غاز</option>
                    <option value="pnzin">مندوب بنزين</option>
                    <option value="travel">مندوب الإنتقال بين المدن</option>
                    <option value="driver">مندوب سائق خاص</option>
                    <option value="mail">مندوب لدى بريد إزهل</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">تسجيل</button>
            <a href="login.php" class="link-secondary">تسجيل الدخول</a>
        </form>
    </div>
</body>
</html>