<?php
session_start();
ob_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
    exit();
}else{
    include "db_conn.php";
    include 'master.php';
    if (isset($_SESSION['delivery_id']) && isset($_GET['beneficiary_id'])) {
        $beneficiary_id = $_GET['beneficiary_id'];
        $delivery_id = $_SESSION['delivery_id'];
        $stmt = $conn->prepare("SELECT * FROM `chat` WHERE beneficiary_id=:beneficiary_id AND delivery_agent_id=:delivery_id");
        $stmt->execute(['beneficiary_id' => $beneficiary_id, 'delivery_id' => $_SESSION['delivery_id']]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    if (isset($_SESSION['bene_id']) && isset($_GET['delivery_agent_id'])){
        $delivery_agent_id = $_GET['delivery_agent_id'];
        $bene_id = $_SESSION['bene_id'];
        $stmt = $conn->prepare("SELECT * FROM `chat` WHERE delivery_agent_id=:delivery_agent_id AND beneficiary_id=:beneficiary_id");
        $stmt->execute(['beneficiary_id' => $bene_id, 'delivery_agent_id' => $delivery_agent_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
        $notes = $_POST['notes'];
        $beneficiary_id = $_POST['beneficiary_id'];
        $delivery_id = $_POST['delivery_id'];
        $sender = $_POST['sender'];
        $stmt = $conn->prepare("INSERT INTO `chat`(`beneficiary_id`,`delivery_agent_id`,`notes`,`sender`)
                                VALUES (:beneficiary_id,:delivery_agent_id,:notes,:sender)");
        $stmt->execute(['beneficiary_id'=>$beneficiary_id,'delivery_agent_id' => $delivery_id,'notes'=>$notes,'sender'=>$sender]);
        header('location: chat.php');
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat Interface</title>
        <style>




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
                /*max-width: 70%;*/
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

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .chat-container {
                width: 400px;
                margin: 50px auto;
                border: 1px solid #ccc;
                border-radius: 5px;
                overflow: hidden;
            }

            .chat-messages {
                height: 300px;
                overflow-y: scroll;
                padding: 10px;
            }
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

            .message {
                padding: 5px 10px;
                margin-bottom: 10px;
                border-radius: 5px;
                max-width: 70%;
            }

            .received-message {
                background-color: #f2f2f2;
                float: right;
            }

            .sent-message {
                background-color: #d4e2d4;
                float: left;
            }

            .message p {
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
    <div class="chat-container">
        <div class="chat-header">
            <?php
            if (isset($_SESSION['delivery_dashboard'])){
                echo "شات مع العملاء";
            } else {
                echo "شات مع المندوبين";
            }
            ?>
        </div>
        <form action="chat_m.php" method="post">
        <div class="chat-messages">
             <?php
                if (isset($_SESSION['delivery_id'])){
                    echo '<input type="hidden" name="delivery_id" value="'.$_SESSION['delivery_id'].'">';
                    echo '<input type="hidden" name="beneficiary_id" value="'.$_GET['beneficiary_id'].'">';
                    echo '<input type="hidden" name="sender" value="2">';
                }else{
                    echo '<input type="hidden" name="beneficiary_id" value="'.$_SESSION['bene_id'].'">';
                    echo '<input type="hidden" name="delivery_id" value="'.$_GET['delivery_agent_id'].'">';
                    echo '<input type="hidden" name="sender" value="1">';
                }

             if ($results) {
                 foreach ($results as $row)
                 {
                     if ($row['sender'] === "2") {
                         echo "<div class='message received-message'><p>" . $row['notes'] . "</p></div>";
                     }else if ($row['sender'] == "1"){
                         echo "<div class='message sent-message'><p>" . $row['notes'] . "</p></div>";
                     }
                 }
             }
                        ?>
            <div class="chat-input">
                <input type="text" id="message-input" name="notes" placeholder="كتابة محتوى الرساله ...">
                <button type="submit" name="submit">ارسال الرساله</button>
            </div>
        </div>
        </form>
    </div>
    </body>
    </html>
    <?php
}
