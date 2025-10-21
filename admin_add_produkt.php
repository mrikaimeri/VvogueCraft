<?php

require 'data_check.php';
session_start();

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}


if(!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif($_SESSION['usertype'] == 'client') {
    header("location:login.php");
}



if (isset($_POST['add_teacher'])) { // shtimi per nje produkt
    $t_name = mysqli_real_escape_string($data, $_POST['name']);
    $t_lastname = mysqli_real_escape_string($data, $_POST['lastname']);
    $t_description = mysqli_real_escape_string($data, $_POST['description']);
    $t_detailed_description = mysqli_real_escape_string($data, $_POST['detailed_description']);

    $file = $_FILES['image']['name']; //foto per produkt
    $tmp_name = $_FILES['image']['tmp_name'];
    $dst = "./img/" . $file;
    $dst_db = "img/" . $file;

    if (move_uploaded_file($tmp_name, $dst)) { // me ngarku file
        $sql = "INSERT INTO products (product, brand, description, detailed_description, photo) VALUES ('$t_name', '$t_lastname', '$t_description', '$t_detailed_description', '$dst_db')";
        $result = mysqli_query($data, $sql);

        if ($result) { // kontrollon nese veprimi ka qene i suksesshem
            header('location:admin_add_produkt.php');
        } else {
            echo "Error: " . mysqli_error($data);
        }
    } else {
        echo "Failed to upload image."; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>
    <style>
      .div_deg {
    padding: 40px 20px; 
    width: 44%;
    max-width: 500px; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #B7957F;
    color: white;
    text-align: center;
    border-radius: 12px; 
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
    margin: 30px auto;
    height: auto; 
}

#addprod-inpt {
    background-color: transparent;
    border-radius: 8px;
    border: 1px solid white;
    padding: 10px;
    width: 80%; 
    max-width: 300px;
    margin: 10px 0;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    color: white;
}

#addimg-inpt {
    display: block;
    margin: 20px auto 10px auto;
}

.content h2{
    margin-top:10px;
}
#addprod-btn {
    background-color: transparent;
    border-radius: 8px;
    border: 1px solid white;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    color: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    margin-top: 20px;
}

#addprod-btn:hover {
    box-shadow: 0 8px 20px rgba(253, 229, 229, 0.33);
    transform: scale(1.05);
}


        @media screen and (max-width: 768px) {
    .div_deg {
        width: 90%; 
        padding: 40px 20px;
        height: auto; 
    }

    label {
        font-size: 14px; 
    }

    #addprod-inpt {
        width: 50%;
        padding: 8px; 
    }

    #addimg-inpt {
        width: 30%!important;
        padding:10px;
    }

    #addprod-btn {
        font-size: 14px;
        padding:13px; 
    }
}
    </style>
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h2><b>Add Products</b></h2><br><br>
            <div class="div_deg">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="name">Product</label>
                        <input type="text" name="name" id="addprod-inpt" required>
                    </div>
                    <br>
                    <div>
                        <label for="lastname">Brand</label>
                        <input type="text" name="lastname" id="addprod-inpt" required>
                    </div>
                    <br>
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" id="addprod-inpt" required></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="detailed_description">Detailed Description</label>
                        <textarea name="detailed_description" id="addprod-inpt" required></textarea>
                    </div>
                     <div>
                        <label for="price">Price</label>
                        <textarea name="Price" id="addprod-inpt" required></textarea>
                    </div>
                    <br>
                    <div>
                        <input type="file" name="image" id="addimg-inpt" required>
                    </div>
                    <br>
                    <div>
                        <button type="submit" name="add_teacher" id="addprod-btn">Add</button>
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
