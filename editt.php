<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root ";
$password = " ";
$dbname = "ezhall ";

$conn = new mysqli($fname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// فلتر بناء على اسم المندوب
$name_filter = isset($_GET['name']) ? $_GET['name'] : '';
$name_condition = $name_filter != '' ? " WHERE name LIKE '%$name_filter%'" : '';

// فلتر بناء على نوع الخدمة
$service_filter = isset($_GET['service']) ? $_GET['service'] : '';
$service_condition = $service_filter != '' ? ($name_condition != '' ? " AND" : " WHERE") . " service = '$service_filter'" : '';

// استعلام SQL لاسترجاع بيانات المندوبين مع تطبيق الفلترين
$sql = "SELECT * FROM mndobee" . $name_condition . $service_condition;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // عرض البيانات في جدول HTML
    echo "<table><tr><th>الصورة</th><th>الاسم</th><th>النبذة التعريفية</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td><img src='uploads/".$row['image']."' height='100' width='100'></td><td>".$row['name']."</td><td>".$row['bio']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "لا توجد بيانات لعرضها";
}
$conn->close();
?>