<?php
// raportimin e gabimeve per me pa qka esht keq
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'data_check.php';


$data = new mysqli($host, $user, $password, $db);

if ($data->connect_error) {
    die("Lidhja me bazën e të dhënave dështoi: " . $data->connect_error);
}

// Kontrolloni nese ID eshte dergu dhe esht numerik
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("ID është e pavlefshme.");
}

// pergaditja e qurey per me mar te dhena specifike
$stmt = $data->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// kontrollimi se  a jan kthy te dhenat
if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
} else {
    die("Nuk u gjet asnjë produkt me këtë ID.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detailed Description</title>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}


.container {
    width: 80%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-top: 30px;
}

.product-details {
    display: flex;
    align-items: center; 
    justify-content: space-between; 
    gap: 20px; 
}


.product-image {
    flex: 1;
    max-width: 40%; /
}

.product-image img {
    width: 100%; 
    height: auto;
    border-radius: 8px;
}


.product-description {
    flex: 2;
    max-width: 55%; 
}

h1 {
    text-align: center;
    color: #2c3e50;
}

h2 {
    font-size: 28px;
    color: #34495e;
    margin-top: 20px;
}

p {
    font-size: 18px;
    line-height: 1.6;
    color: #555;
    margin: 10px 0;
}


a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}

a:hover {
    background-color: #2980b9;
}

/* Responsiviteti */
@media (max-width: 768px) {
    .product-details {
        flex-direction: column; 
        align-items: center;
    }

    .product-image {
        max-width: 80%; 
        margin-bottom: 20px;
    }

    .product-description {
        max-width: 80%;
    }
}

        </style>
</head>
<body>
    <div class="container">
        <h1>Product Detailed</h1>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($info['photo']); ?>" alt="Foto e Produktit">
            </div>
            <div class="product-description">
                <h2><?php echo htmlspecialchars($info['product']); ?></h2>
                <p><strong>Brand:</strong> <?php echo htmlspecialchars($info['brand']); ?></p>
                <p><strong>Detailed Description:</strong> <?php echo htmlspecialchars($info['detailed_description']); ?></p>
                <p><strong>Size availability:  <select>
                <option>Size</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                </select></p>
               
                <a href="shop.php">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
