<?php

require 'data_check.php';
session_start();

$data = mysqli_connect($host, $user, $password, $db);


if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE usertype='client'";
$result = mysqli_query($data, $sql);


error_reporting(0);


if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php"); 
    exit();
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <?php include 'admin_css.php'; ?>

    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

.content {
    margin-left: 250px; 
    padding: 20px;
}

.table_th {
            padding: 10px 10px;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: rgba(105, 74, 42, 0.8);
            color: white;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .table_td {
            padding: 15px 20px;
            background-color: #D7BDA6;
            text-align: center;
            font-size: 12px;
            color: black;
            border-radius: 8px;
            border-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .table tr {
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .table tr:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        table {
            border-collapse: separate;
            border-spacing: 0 10px;
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn{
            background-color:rgb(93, 82, 54);
            color:white;
        }
        .btn:hover{
            background-color:antiquewhite;
        }
        
        @media (max-width: 600px) {
        
        .content {
            margin-left: 0;
            padding: 5px;
        }

        table {
            width: 100%;
            margin: 10px 0;
        }

        .table_th {
            padding: 8px 10px;
            font-size: 9px; 
        }

        .table_td {
            padding: 4px 2px;
            font-size: 8px; 
        }

        .table tr {
            margin-bottom: 5px;
        }
        .btn {
            padding: 5px 4px;
            font-size: 8px; 
        }
    }
</style>

</head>

<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h2><b>Customer Data</b></h2>

            <?php
            if ($_SESSION['message']) {
                echo "<p style='color: green;'>" . $_SESSION['message'] . "</p>";
            }
            unset($_SESSION['message']);
            ?>

            <br><br>

            <table border="1px">
                <tr>
                    <th class="table_th">Name</th>
                    <th class="table_th">Username</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Tel</th>
                    <th class="table_th">Password</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>

               <?php while ($info = $result->fetch_assoc()) { ?>
<tr>
    <td class="table_td"><?php echo $info['username']; ?></td>
    <td class="table_td"><?php echo $info['lastname']; ?></td>
    <td class="table_td"><?php echo $info['email']; ?></td>
    <td class="table_td"><?php echo $info['phone']; ?></td>
    <td class="table_td"><?php echo $info['password']; ?></td>
    <td class="table_td">
        <a onClick="return confirm('Are you sure?');" class="btn" href="delete.php?id=<?php echo $info['id']; ?>">Delete</a>
    </td>
    <td class="table_td">
        <a class="btn" href="update_klient.php?id=<?php echo $info['id']; ?>">Change</a>
    </td>
</tr>
<?php } ?>

            </table>
        </center>
    </div>

</body>

</html>
