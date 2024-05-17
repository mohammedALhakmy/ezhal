<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            padding: 0px;
            margin: 0;
            font-family: Serif;
        }

        table {


            margin: 2em auto;
            border-collapse: collapse;
            width: 90%;
            min-width: 300px;
            /*  border: 1px solid #06657A;*/
            /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);*/
            border-radius: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        th {
            background-color: #06657A;
            color: white;
            box-shadow: none;

        }

        th:first-child {
            border: none;
            box-shadow: none;
            /* border-top-right-radius: 30px; */
            border-start-start-radius: 20px 20px;
        }

        .last-row {
            border: none;
            /* border-bottom-left-radius: 30px; */
            border-end-end-radius: 20px 20px;
            direction: rtl;

        }

        h1 {
            text-align: center;
            animation: fadeIn 3s infinite;
            margin-top: 20px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .edit-btn,
        .delete-btn {
            border: none;
            background-color: transparent;
            cursor: pointer;
            font-size: 1.2em;
            /* Larger icons for better visibility */
        }

        .fas {
            /* Additional styling for Font Awesome icons */
            margin-right: 5px;
        }

        .main-heading {
            color: #06657A;
        }

        tr:hover {
            border: none;
            background-color: #f5f5f5;
            transform: scale(1.02);
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }


        tr:first-child:hover {
            border: none;
            box-shadow: none;
        }

        tr:last-child:hover {

            box-shadow: none;
        }

        @media only screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }
        }

        .filter-box {
            text-align: center;
            margin: 20px 0;
        }

        .filter-input,
        .filter-select {
            padding: 10px;
            width: 50%;
            max-width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            vertical-align: middle;
        }

        .filter-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #06657A;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

        <?php   include('master.php'); ?>

    <h1 class="main-heading">الطلبات السابقة</h1>
    <nav class="container-fluid">
        <div class="filter-box">
            <select id="filterSelect" class="filter-select">
                <option value="">أختر الخدمة</option>
                <option value="service1">خدمة إيصال غاز</option>
                <option value="service2">خدمة إيصال بنزين</option>
                <option value="service3">خدمة نقل بين المدن</option>
                <option value="service3">خدمة بريد أزهل</option>
                <option value="service3">خدمة سائق خاص</option>
            </select>
            <input type="text" id="filterInput" class="filter-input" placeholder="ابحث هنا...">
            <button onclick="filterTable()" class="filter-button"><i class="fa fa-search"></i></button>
        </div>
    </nav>

    <?php
    function displayServiceName($name)
    {
        switch ($name) {
            case 'Gaz':
                return 'غاز';
            case 'Gasoline':
                return 'بنزين';
            default:
                return '';
        }
    }

    function displayOrderStatus($status)
    {
        switch ($status) {
            case 'Pending':
                return 'قيد الانتظار';
            case 'Accepted':
                return 'مقبولة';
            case 'Rejected':
                return 'مرفوضة';
            default:
                return '';
        }
    }

    include 'php/connection_db.php';

    // Fetch data from the "orders" table
    $result = $conn->query('SELECT * FROM orders  where user_id = ' . $_SESSION['id'] . '');

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Start building the HTML table
        echo '<table>
            <tr>
                <th>رقم الطلب</th>
                <th>الخدمة المطلوبة</th>
                <th>تاريخ الطلب</th>
                <th>عدد الفئات</th>
                <th>المجموع الحالي</th>
                <th>حالة الطلب</th>
            </tr>';

        // Loop through each row of data and display it in the table
        while ($row = $result->fetch_assoc()) {
            $orderStatus = displayOrderStatus($row['order_status']);
            $service = displayServiceName($row['requested_service']);
            echo '<tr>
                <td>' . $row['order_number'] . '</td>
                <td>' . $service . '</td>
                <td>' . $row['order_date'] . '</td>
                <td>' . $row['category_count'] . '</td>
                <td>' . $row['current_total'] . '</td>
                <td>' . $orderStatus . '</td>
            </tr>';
        }

        // Close the HTML table
        echo '</table>';
    } else {
        echo 'No data found in the "orders" table.';
    }

    // Close the connection
    $conn->close();
    ?>

</body>

</html>