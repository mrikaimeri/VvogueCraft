<?php
session_start(); 

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .content {
            margin-left: 250px; 
            padding: 40px 20px;
        }

        .content h1 {
            color: rgb(107, 82, 50);
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }

   
        .dashboard-card {
            background-color: #B7957F;
            color: white;
            border-radius: 10px;
            padding: 30px;
            margin: 20px auto;
            width: 80%;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0,0,0,0.25);
        }

    
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                padding: 20px 10px;
            }
            .dashboard-card {
                width: 95%;
                padding: 20px;
            }
            .content h1 {
                font-size: 26px;
            }
        }

        @media (max-width: 480px) {
            .content h1 {
                font-size: 22px;
            }
            .dashboard-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>
    
    <div class="content">
        <h1>Admin Dashboard</h1>

    
        <div class="dashboard-card">
            <h2>Welcome, Admin!</h2>
            <p>Use the sidebar to manage products, clients, and messages.</p>
        </div>

    </div>
</body>
</html>
