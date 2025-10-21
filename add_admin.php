
<?php
session_start();
require 'data_check.php';
$error = '';


$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}


$adminUsername = "mrika"; 

// Password i ri
$newPassword = "admin12345"; 


$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);


$sql = "UPDATE users SET password = ? WHERE username = ? AND usertype = 'admin'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $hashedPassword, $adminUsername);


$stmt->close();
$conn->close();
?>