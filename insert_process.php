<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>ezhal</title>

  <script src="main.js"></script>
  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <?php
  $con = mysqli_connect("localhost", "root", "", "ezhall2");

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $comment = $_POST['comment'];
  $userID = isset($_SESSION['id']) ? 'مستخدم' : 'زائر';

  $sql = "INSERT INTO message (name, email, subject, comment, user_type) 
VALUES ( '$name', '$email','$subject', '$comment','$userID')";
  if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
  } else {
    echo "<script>alert('تم الارسال بنجاح')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
  }
  echo "";
  mysqli_close($con);
  ?>
</body>

</html>