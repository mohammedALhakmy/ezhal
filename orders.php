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
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
</head>

<style>
    .container-1 {
        text-align: center;
        width: 80%;
        margin: 10%;
        height: 70%;
        color: white;
        margin-top: 3%;
        margin-bottom: 5%;
        display: flex;
        position: relative;
        /* Use flexbox for layout */
        flex-direction: row;
        justify-content: center;
        align-items: center;
        align-content: center;
        /* Align items to the start of the container */
        /* Distribute space between form and image */
        padding: 20px;
        background-color: #ffffff;

    }

    .content {
        width: 100%;
    }

    .content h4 {
        color: #06657A;
        padding-right: 10px;
        text-align: right;
    }

    #regForm .content {
        display: none;
    }

    .step {
        margin: 0 15px;
        font-size: 20px;
        opacity: 0.5;
        color: #DDDDDD;
    }

    .step.active {
        opacity: 1;
        color: #06657A;
    }

    /* Mark the steps that are finished and valid: */


    .image-container {
        max-width: 600px;
        margin: 30px;
        height: 100%;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;

    }
</style>

<body>
<?php include 'master.php' ?>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <link href="css/style.css" rel="stylesheet">
    <!-- Spinner End -->






            <br><br><br><br><br><br><br><br>


            <main >
            <div class="container-1">
                <div class="form-container">
                    <form class="form-group1" action="gasolin1.php">
                        <div class="text-container">
                            <div class="text-box">
                                <p align="justify" class="mb-4" style="color:black; font-size: 24px; direction: rtl;">
                                    <b>الطلبات</b>
                                </p>
                            </div>
                        </div>
                        <div class="order-container">
                            <div class="order-box">
                                <a href="curr-order.php" class="btn btn-primary" style="width: 50%;">الطلبات الحالية</a>
                                <br><br>
                                <a href="prev-order.php" class="btn btn-primary" style="width: 50%;">الطلبات السابقة</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

</main>

<?php include 'layout/footer.php' ?>

            <!-- Footer End -->
            <!-- Template Javascript -->
            <script src="js/main.js"></script>
        </body>

</html>