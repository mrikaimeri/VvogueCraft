<?php
session_start();

$host = "localhost";  
$user = "emmn";  
$password = "3lm4m1m3r1";  
$db = "closeting"; 

$data = mysqli_connect($host, $user, $password, $db);  // Lidhja me db
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}


if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['message']);
}

$sql = "SELECT * FROM products";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($data));
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemi Menaxhimit te Koleksionit te Veshjeve</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />

    <style>
#pro-cont {
    padding: 20px; 
    border: 1px solid antiquewhite;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(92, 59, 43, 0.3);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    background-color: #fff;
    margin-left: 100px; 
    margin-bottom: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
}

#pro-cont:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(92, 59, 43, 0.4);
}

#pro-cont h6 {
    font-weight: 600;
    color: #564024;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 5px 0; /* pak hapësirë ndërmjet titujve */
}

#pro-cont h5 {
    color: #564024;
    font-family: 'Times New Roman', Times, serif;
    margin: 5px 0;
    line-height: 1.4; /* më shumë hapësirë për lexim */
    font-size: 14px; /* zvogëlo pak për të mos mbushur shumë */
}
.prof{
    border-radius:8px;
    padding:5px;
    box-shadow: 0 4px 5px rgba(92, 59, 43, 0.4);
}
.star {
    color: #f1c40f;
    margin: 8px 0;
}

#cart {
    color: #52350b;
    cursor: pointer;
    font-size: 20px;
    margin-top: 5px;
}

.more a {
    text-decoration: none;
    color: black;
    font-weight: 500;
    font-size: 13px;
}

.more a:hover {
    color: darkgoldenrod;
}


.prof {
    width: 100%;
    height: 300px;
    border-radius: 15px;
    object-fit: cover;
    margin-bottom: 10px;
}

@media (max-width: 600px) {
    #pro-cont {
        margin-left: 10px;
        padding: 15px;
        font-size: 12px;
    }

    .prof {
        height: 220px;
    }
}


    </style>
</head>

<body>

    <section id="shopbanner">
        <h1><span><b>Shop</b></span></h1>
    </section>

    <div class="container" id="shop">

        <?php
        while ($info = $result->fetch_assoc()) {
        ?>
            <section id="pro-cont">
                <img class="prof" src="<?php echo "{$info['photo']}" ?>" alt="Product Image">
                <h6><?php echo "{$info['brand']}" ?></h6>
                <h6><?php echo "{$info['product']}" ?></h6>
                <h5><?php echo "{$info['description']}" ?></h5>
                <h5><?php echo "{$info['price']}" ?></h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    
                </div>
                <a href="#"><i class="fa fa-shopping-cart" id="cart"></i></a>
                <div class="more">
                <a href="detailed_description.php?id=<?php echo $info['id']; ?>">More</a>
            </div>
            </section>
        <?php
        }
        ?>

    </div>

    <footer>

<div class="footer-container">
    <section id="logoja">
        <span><b>VogueCraft</b></span> 
    </section>

    <div class="col">
        <h4>Contact</h4>
        <p><strong>Address:</strong> 324 Main Street, Building 5, Pristina</p>
        <p><strong>Phone:</strong> +383 44 123 456 / 046 877 778</p>
        <p><strong>Hours:</strong> 10:00-18:00, Mon-Sat</p>
        <div class="icon">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-pinterest-p"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
        </div>
    </div>

    <div class="col" id="about" >
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Our Story</a>
        <a href="#">Our Values</a>
        <a href="#">Our Mission</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign in</a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track my Order</a>
        <a href="#">Help</a>
    </div>

    <div class="col col-install-app">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="img/Google-Play-Store-APP-Download.png" alt="">
            <img src="img/app store logoo2.png" alt="">
        </div>
        <p>Secured Payment Gateways</p>
        <section id="payment">
            <img src="img/maestro payment logo.png" alt="">
            <img src="img/mastercard payment logo.png" alt="">
            <img src="img/payment_method_card_visa-512.webp" alt="">
        </section>
        
    </div>
</div>


<h3 class="footer_text">All @copyright reserved by VogueCraft</h3>
</footer>

</body>
</html>
