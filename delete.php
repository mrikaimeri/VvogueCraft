<?php
require 'data_check.php';


$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = mysqli_real_escape_string($data, $_GET['id']);

    // SQL për fshirjen   $sql = "DELETE FROM users WHERE id='$user_id'";
    $result = mysqli_query($data, $sql);

    if ($result) {

        header("Location: view_klient.php?deleted");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($data);
    }

} else {
    echo "No valid ID provided!";
}
?>
