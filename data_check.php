<?php
$host = "localhost";  
$user = "emmn";  
$password = "3lm4m1m3r1";  
$db = "closeting"; 

$data = mysqli_connect($host, $user, $password, $db);  // Lidhja me db

if ($data === false) {
    die("Connection error");
}
?>
