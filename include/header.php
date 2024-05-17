<?php
session_start();
?>
<header class="header" style="
    position: fixed;
">
    <img src="img/loggoo.png" alt="شعار الموقع">
    <nav class="Navbar">
        <a href="index.php">الصفحة الرئيسية</a>
        <div class="has-submenu">
            <a href="services.php">الخدمات</a>
            <div class="submenu">
                <div class="has2-submenu">
                    <a href="service.php">بريد إزهل</a>
                </div>
                <a href="/round-trip-page.php" div="" class="sub"> الإنتقال بين المدن</a>
                <a href="/driverS1_content.php" div="" class="sub">سائق خاص </a>
                <a href="/gasolin.php" div="" class="sub">إيصال بنزين </a>
                <a href="/gas.php" div="" class="sub">إيصال غاز </a>
            </div>
        </div>
        <a href="/mndobie.php">مندوبي إزهل</a>
        <a href="./team.php">فريق العمل</a>
        <a href="./about.php"> عن المنصة</a>
        <a href="./contact.php"> تواصل معنا</a>
        <?php
        if (isset($_SESSION['uid']) && !empty($_SESSION['uname'])) {
            echo '<span>'.$_SESSION['uname'].'</span> / ';
            echo '<a href="./logout.php">تسجيل خروج</a>';
        } else {
            echo '<a href="./login.php">تسجيل الدخول</a>';
        }
        ?>

    </nav>
    <form onsubmit="event.preventDefault();" role="search" class="search-form">
        <label for="search"></label>
        <div class="search-container">
            <input id="search" type="search" placeholder="إبحث" autofocus required>
            <button type="submit" class="search-button">بحث</button>
        </div>
    </form>

    <div class="icons" style="margin-top: 24px;">
        <a style="margin: 0 !important;" href="/profile.php"> <div class="fas fa-bell" id="bell-btn"></div></a>
    </div>
</header>