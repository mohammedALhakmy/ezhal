<?php
session_start();
ob_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    if (isset($_SESSION['bene_id'])){
        $id = $_SESSION['bene_id'];
        $stmt_gasoline = $conn->prepare("SELECT g.*, da.* FROM `gasoline` g 
               INNER JOIN `delivery_agent` da ON g.delivery_agent_id = da.ID_Number
               WHERE g.beneficiary_id=:bene_id GROUP BY g.delivery_agent_id");
        $stmt_gasoline->execute(['bene_id' => $id]);
        $results_gasoline = $stmt_gasoline->fetchAll(PDO::FETCH_ASSOC);

        $stmt_parcel = $conn->prepare("SELECT p.*, da.* FROM `parcel` p 
               INNER JOIN `delivery_agent` da ON p.delivery_agent_id = da.ID_Number
               WHERE p.beneficiary_id=:bene_id GROUP BY p.delivery_agent_id");
        $stmt_parcel->execute(['bene_id' => $id]);
        $results_parcel = $stmt_parcel->fetchAll(PDO::FETCH_ASSOC);
        $results = array_merge($results_gasoline, $results_parcel);
    }
    if (isset($_SESSION['delivery_id'])) {
        $delivery_id = $_SESSION['delivery_id'];
        $stmt_gasoline = $conn->prepare("SELECT g.*, be.* FROM `gasoline` g 
                   INNER JOIN `beneficiary` be ON g.beneficiary_id = be.ID_Number
                   WHERE g.delivery_agent_id=:bene_id GROUP BY g.beneficiary_id");
        $stmt_gasoline->execute(['bene_id' => $delivery_id]);
        $results_gasoline = $stmt_gasoline->fetchAll(PDO::FETCH_ASSOC);
        $stmt_parcel = $conn->prepare("SELECT p.*, be.* FROM `parcel` p 
           INNER JOIN `beneficiary` be ON p.beneficiary_id = be.ID_Number
           WHERE p.delivery_agent_id=:bene_id GROUP BY p.beneficiary_id");
        $stmt_parcel->execute(['bene_id' => $delivery_id]);
        $results_parcel2 = $stmt_parcel->fetchAll(PDO::FETCH_ASSOC);
        $all_customers = array_merge($results_gasoline, $results_parcel2);
    }





    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <style>


        .chat-container {
            margin: 201px auto;
            max-width: 950px;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .chat-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .chat-messages {
            padding: 10px;
            overflow-y: auto;
            max-height: 300px;
        }

        .message {
            margin-bottom: 10px;
        }

        .message .sender {
            font-weight: bold;
        }

        .message .message-body {
            background-color: #fff;
            padding: 8px;
            border-radius: 5px;
            display: inline-block;
            max-width: 70%;
        }

        .message.from-me .message-body {
            background-color: #dcf8c6;
            align-self: flex-end;
        }

        .message.from-me .sender {
            text-align: right;
        }

        .message.from-me .message-body {
            background-color: #dcf8c6;
            align-self: flex-end;
        }

        .chat-input {
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ccc;
        }

        .chat-input input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .chat-input button {
            margin:10px ;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .chat-input button:hover {
            background-color: #45a049;
        }
        .message {
            margin: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            clear: both;
        }

        .from-delivery {
            float: left;
            background-color: #ddd;
            text-align: start;
        }

        .from-beneficiary {
            float: right;
            background-color: #faf5f5;
            text-align: end;
        }

    </style>
</head>
<body>
<div style="display: flex;">
    <div style="flex: 1;" class="chat-container">
        <div class="chat-header">
            <?php
            if (isset($_SESSION['delivery_dashboard'])){
                echo "اختار شات مع العملاء";
            } else {
                echo "اختار شات مع المندوبين ";
            }
            ?>
        </div>
        <div style="text-align: center;padding: 10px">
            <?php
            if (isset($_SESSION['bene_id'])){
                if ($results) {
                    foreach ($results as $row) {
                        echo "<li style='color: #0d6efd'><a href='chat_m.php?delivery_agent_id=" . $row['ID_Number'] . "'>اسم المندوب: " . $row['Fname'] . "</a></li>";

                    }
                }
    }
            else{
                if ($all_customers) {
                    foreach ($all_customers as $row2) {
                        echo "<li style='color: #0d6efd'><a href='chat_m.php?beneficiary_id=" . $row2['ID_Number'] . "'>اسم العميل: " . $row2['Fname'] . "</a></li>";

                    }
                }
    }

            ?>
        </div>

    </div>
</div>

</body>
</html>

<?php
}
