<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Feedback</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>



<?php
require 'data_check.php';


if ($data === false) {
    die("Error: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $lastname = mysqli_real_escape_string($data, $_POST['lastname']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $message = mysqli_real_escape_string($data, $_POST['message']);

    $sql = "INSERT INTO messages (username, lastname, email, phone, message) 
            VALUES ('$username', '$lastname', '$email', '$phone', '$message')";

       if (mysqli_query($data, $sql)) {
        
        echo "<script>
            alert('Thankyou for your feedback!');
            window.location.href = 'index.php';
        </script>";
        exit();
    } else {
        echo "Something went wrong!: " . mysqli_error($data);
    }
}


?>
