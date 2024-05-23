<header class="header" style="
    position: fixed;
">
    <img src="img/loggoo.png" alt="شعار الموقع">
    <nav class="Navbar">
        <a href="index.php">الصفحة الرئيسية</a>

        <?php
        if (((isset($_SESSION['uid']) && isset($_SESSION['bene_dashboard']) && !isset($_SESSION['delivery_dashboard'])) || (!isset($_SESSION['delivery_dashboard']) && !isset($_SESSION['bene_dashboard'])))) { ?>
            <div class="has-submenu">
                <a href="services.php">الخدمات</a>
                <div class="submenu">
                    <div class="has2-submenu">
                        <a href="parcel.php">بريد إزهل</a>
                    </div>
                    <a href="./round-trip-page.php" class="sub"> الإنتقال بين المدن</a>
                    <a href="./service_one.php?id=1" class="sub">سائق خاص </a>
                    <a href="./service_one.php?id=4" class="sub">إيصال بنزين </a>
                    <a href="./service_one.php?id=2" class="sub">إيصال غاز </a>
                </div>
            </div>
            <a href="/mndobie.php">مندوبي إزهل</a>
            <a href="./team.php">فريق العمل</a>
            <a href="./about.php"> عن المنصة</a>
            <a href="./contact.php"> تواصل معنا</a>
        <?php } if (!isset($_SESSION['bene_dashboard']) && isset($_SESSION['delivery_dashboard'])) { ?>
            <div class="has-submenu">
                <a href="services.php">الخدمات</a>
                <div class="submenu">
                    <?php if ($_SESSION['Availability'] == "1") { ?>
                    <div class="has2-submenu"><a href="parcel_active.php">خدمات البريد إزهل المعلقة</a> </div>
                    <?php } if ($_SESSION['Availability'] == "2") { ?>
                    <a href="./round-trip-page.php" class="sub">الخدمات الإنتقال بين المدن المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "3") { ?>
                    <a href="driver_private.php" class="sub">الخدمات سائق خاص المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "4") { ?>
                    <a href="services_gasoline.php" class="sub">الخدمات إيصال بنزين المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "5") { ?>
                    <a href="gas.php" class="sub">الخدمات إيصال غاز  المعلقة</a>
                    <?php }?>
                </div>
            </div>
            <a href="./team.php">فريق العمل</a>
            <a href="./about.php"> عن المنصة</a>
        <?php } ?>

        <?php
        if (isset($_SESSION['uid']) && isset($_SESSION['uname'])) {
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