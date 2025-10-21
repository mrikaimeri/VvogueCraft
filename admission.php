<?php

 session_start();
require 'data_check.php'; 

if ($_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
    exit();
}


//query per me mar te dhanuna
$sql = "SELECT * FROM messages";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Gabim në query: " . mysqli_error($data)); //gabimet
}

?>
 

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>
</head>

<style>
    .table_th {
        padding: 15px;
        font-size: 18px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: rgba(143, 112, 80, 0.8);
        color: #fff;
        text-align: center;
        border-radius: 8px;
    }

    .table_td {
        padding: 15px;
        background-color: bisque;
        color: #2c3e50;
        text-align: center;
        font-size: 16px;
        font-family: Arial, sans-serif;
        border-radius: 8px;
    }

    .table tr {
        margin-bottom: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .table tr:hover {
        transform: scale(1.01);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    table {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 90%;
        margin: 20px auto;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    @media (max-width: 600px) {
        .table_th {
            font-size: 13px;
            padding: 7px;
        }

        .table_td {
            font-size: 10px;
            padding: 6px;
        }

        table {
            width:80%;
            margin-right: 10px;
        }

        .table tr {
            margin-bottom: 5px;

        }
    }




</style>

<body>

<?php include 'admin_sidebar.php'; ?>

<div class="content">
    <center>
        <h2><b>Feedbacks from visitors of our website</b></h2>
        <br><br>

        <table border="1px">
            <tr>
                <th class="table_th">Name</th>
                <th class="table_th">Username</th>
                <th class="table_th">Email</th>
                <th class="table_th">Tel</th>
                <th class="table_th">Message</th>
            </tr>

            <?php
           
            while ($info = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td class='table_td'>" . htmlspecialchars($info['username']) . "</td>
                        <td class='table_td'>" . htmlspecialchars($info['lastname']) . "</td>
                        <td class='table_td'>" . htmlspecialchars($info['email']) . "</td>
                        <td class='table_td'>" . htmlspecialchars($info['phone']) . "</td>
                        <td class='table_td'>" . htmlspecialchars($info['message']) . "</td>
                    </tr>";
            }
            ?>
        </table>
    </center>
</div>

</body>

</html>
