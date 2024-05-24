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
            <a href="chat.php">شات</a>
        <?php } if (!isset($_SESSION['bene_dashboard']) && isset($_SESSION['delivery_dashboard'])) { ?>
            <div class="has-submenu">
                <a href="services.php">الخدمات</a>
                <div class="submenu">
                    <?php if ($_SESSION['Availability'] == "1") { ?>
                    <div class="has2-submenu"><a href="parcel_active.php">خدمات البريد إزهل المعلقة</a> </div>
                    <?php } if ($_SESSION['Availability'] == "2") { ?>
                    <a href="./round-trip.php" class="sub">الخدمات الإنتقال بين المدن المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "3") { ?>
                    <a href="driver_private.php" class="sub">الخدمات سائق خاص المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "4") { ?>
                    <a href="services_gasoline.php" class="sub">الخدمات إيصال بنزين المعلقة</a>
                    <?php } if ($_SESSION['Availability'] == "5") { ?>
                    <a href="gas.php" class="sub">الخدمات إيصال غاز  المعلقة</a>
                    <?php }?>
                </div>
            </div>
            <a href="chat.php">شات</a>
            <a href="./team.php">فريق العمل</a>
            <a href="./about.php"> عن المنصة</a>

        <?php } ?>

        <?php
        if (isset($_SESSION['uid']) && isset($_SESSION['uname'])) {
            if (isset($_SESSION['delivery_dashboard'])){
                echo '<a href="profile.php?profile='.$_SESSION['uid'].'"><span>'.$_SESSION['uname'].'</span></a> / ';
                echo '<a href="./logout.php">تسجيل خروج</a>';
            }else{
                echo '<span>'.$_SESSION['uname'].'</span> / ';
                echo '<a href="./logout.php">تسجيل خروج</a>';
            }
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


<!--<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">-->
<!--    <a href="index.php"-->
<!--       class="navbar-brand d-flex align-items-center px-4 px-lg-5">-->
<!--    </a>-->
<!--    <div class="navbar"><a href="index.php"-->
<!--                           class="navbar-brand d-flex align-items-center px-4 px-lg-5">-->
<!---->
<!---->
<!--        </a>-->
<!--        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarCollapse">-->
<!--            <div class="navbar-nav ms-auto p-4 p-lg-0">-->
<!--                <img src="The Trips_files/loggo.png" alt="شعار الموقع">-->
<!--                <a href="index.php" class="nav-item nav-link active">الرئيسية</a>-->
<!--                <div class="nav-item dropdown m-0">-->
<!--                    <nav>-->
<!--                    </nav>-->
<!--                </div>-->
<!--                <div class="nav-item dropdown">-->
<!--                    <a href="services_page.php" class="nav-item nav-link"> الخدمات</a>-->
<!--                    <div class="dropdown-menu fade-down m-0">-->
<!--                        <a href="sendreqouest.php" class="dropdown-item"> أرسل او إستلم-->
<!--                            شحنتك</a>-->
<!--                        <a href="gas_page.php" class="dropdown-item">غاز</a>-->
<!--                        <a href="gasolin_page.php" class="dropdown-item">بنزين</a>-->
<!--                        <a href="round-trip-page.php" class="dropdown-item"> الإنتقال بين المدن</a>-->
<!--                        <a href="driver.php" class="dropdown-item">سائق خاص</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <a href="mndobie_page.php" class="nav-item nav-link">مندوبي إزهل</a>-->
<!--                <a href="team_page.php" class="nav-item nav-link"> فريق العمل</a>-->
<!--                <a href="about_page.php" class="nav-item nav-link"> عن المنصة</a>-->
<!--                <a href="contact_page.php" class="nav-item nav-link">تواصل معنا</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->