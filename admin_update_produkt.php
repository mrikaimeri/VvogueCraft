<?php
session_start();
require 'data_check.php';


if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: admin_view_produkt.php");
    exit();
}

$id = $_GET['id'];


$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($data, $sql);
$product = mysqli_fetch_assoc($result);


if (isset($_POST['update'])) {
    $product_name = mysqli_real_escape_string($data, $_POST['product']);
    $brand = mysqli_real_escape_string($data, $_POST['brand']);
    $description = mysqli_real_escape_string($data, $_POST['description']);
    $detailed_description = mysqli_real_escape_string($data, $_POST['detailed_description']);
    $price = mysqli_real_escape_string($data, $_POST['price']);

    
    if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_folder = "uploads/" . $photo_name;
        move_uploaded_file($photo_tmp, $photo_folder);
        $sql_update = "UPDATE products SET product='$product_name', brand='$brand', description='$description', detailed_description='$detailed_description', price='$price', photo='$photo_folder' WHERE id='$id'";
    } else {
        $sql_update = "UPDATE products SET product='$product_name', brand='$brand', description='$description', detailed_description='$detailed_description', price='$price' WHERE id='$id'";
    }

    mysqli_query($data, $sql_update);
    header("Location: admin_view_produkt.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Product</title>
    <?php include 'admin_css.php'; ?>
    <style>
        .update_form {
            width: 50%;
            height:40%;
            margin: 50px auto;
            padding: 30px;
            background-color: rgba(143, 112, 80, 0.8);
            border-radius: 10px;
             font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .update_form h2 {
            text-align: center;
            margin-bottom: 20px;
            color:white;
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .update_form input, .update_form textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            background-color:transparent;
            border-radius: 8px;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            border: 1px solid white;
                        box-shadow: 0 4px 10px rgba(0,0,0,0.2);

            font-size: 16px;
        }
        .update_form label{
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                color:white;
        }
        .update_form img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            display: block;
            margin-bottom: 10px;
            border-radius: 10px;
        }
        .update_form input[type="submit"] {
            width: 50%;
            background-color: #B7957F;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            transition: 0.3s;
        }
        .update_form input[type="submit"]:hover {
            background-color: transparent;
            color:#52350b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <div class="update_form">
            <h2>Update Product</h2>
            <form method="post" enctype="multipart/form-data">
                <label>Product Name:</label><br>
                <input type="text" name="product" value="<?php echo htmlspecialchars($product['product']); ?>" required><br>

                <label>Brand:</label><br>
                <input type="text" name="brand" value="<?php echo htmlspecialchars($product['brand']); ?>" required><br>

                <label>Description:</label><br>
                <textarea name="description" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea><br>

                <label>Detailed Description:</label><br>
                <textarea name="detailed_description" rows="4"><?php echo htmlspecialchars($product['detailed_description']); ?></textarea><br>

                <label>Price:</label><br>
                <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>

                <label>Current Photo:</label><br>
                <img src="<?php echo htmlspecialchars($product['photo']); ?>" alt="Current Photo"><br>

                <label>Upload New Photo (optional):</label><br>
                <input type="file" name="photo"><br>

                <input type="submit" name="update" value="Update Product">
            </form>
        </div>
    </div>
</body>
</html>
