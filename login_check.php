<?php
error_reporting(0);
session_start();
require 'data_check.php';

$data = mysqli_connect($host, $user, $password, $db); 
if (!$data) { 
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Kontrollo password-in hash-uar
        if (password_verify($pass, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];

            if ($row["usertype"] == "user") {
                header("Location: index.php");
                exit();
            } elseif ($row["usertype"] == "admin") {
                header("Location: adminhome.php");
                exit();
            }
        } else {
            $_SESSION['loginMessage'] = "Username or password incorrect";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['loginMessage'] = "Username or password incorrect";
        header("Location: login.php");
        exit();
    }

    mysqli_stmt_close($stmt);
}
?>
