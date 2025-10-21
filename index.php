<?php
require 'data_check.php';



$sql="SELECT * FROM products";

$result=mysqli_query($data,$sql);

error_reporting(0);
session_start(); 
session_destroy();

if($_SESSION['message'])
{
    $message=$_SESSION['message'];
    
    echo "<script type='text/javascript'>
    
    alert('$message');
    
    </script>";
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sistemi Menaxhimit te Koleksionit te Veshjeve</title>
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJpYt0jZrY7f8zNRzLD4FwPhggzZCnbOTmRJ0hb7gA4xtmkn1E+fS5eDKrD8" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-lZN37fDqDtb13GqfPz8lZ6ZXZJkSTyYP2rK7g6iJt1YjF3V9Cb2aWzHfnvOKA3Bx" crossorigin="anonymous"></script>



<style>
    

.contact-form {
    max-width: 600px;
    margin: 50px auto; 
    display: flex;
    flex-direction: column;
    gap: 15px;
    background-color: #EFE7DA;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    align-items: center; 
    text-align: center; 
}

.contact-form input,
.contact-form textarea {
    width: 90%; 
    max-width: 500px; 
    padding: 12px;
    border: 1px solid #C1B6A4;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: 0.2s ease-in-out;
}

.contact-form button {
    width: 50%; 
    max-width: 200px;
}
;

.contact-form h3 {
    color: #B29079!important;
    font-size: 28px;
    text-align: center;
    margin-bottom: 5px;
}
.contact-form p {
    text-align: center;
    color: #7a6e63;
    margin-bottom: 20px;
}



.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #B29079;
    box-shadow: 0 0 5px #B29079;
}
.contact-form button {
    background-color: #B29079;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.2s;
}
.contact-form button:hover {
    background-color: #a67b63;
}

@media screen and (max-width: 600px) {

nav ul {
    display: flex;
    justify-content: space-between; 
    padding:0;
}

nav ul li {
    margin: 3px 4px;
    font-size: 6px; 
}
.btn{
    font-size:5px;
    padding:3px;
}



.main_img {
    width: 100%;
    height: auto;
    object-fit: cover; 
}

.welcome_img {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.col-md-6 {
    width: 50%; 
    margin-bottom: 20px;
}

.about_img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
}

.teksti h1 {
    font-size: 18px; 
}

.teksti p {
    font-size: 14px; 
}


footer .footer-container {
    display: flex;
    justify-content: space-between; 
    padding: 10px;
}

footer .col {
    margin-bottom: 10px;
    font-size: 14px; 
}

footer .icon i {
    font-size: 20px; 
}


.container #about .col-md-12, .container #about .col-md-6 {
    width: 30%; 
    margin-right: 1%; 
    margin-bottom: 20px; 
}
.container img{
    display:inline;
}
.about_img {
    width: 130%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
}

.blogdesc {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    padding: 10px;
    margin-top: 10px;
}


iframe {
    width: 150%; 
    height: 250px;
}


.regj input, .regj textarea {
    width: 50%; 
    font-size: 14px;
    padding: 10px;
}

.btn {
    width: 100%; 
    font-size: 16px; 
}

.footer_text {
    font-size: 8px; /
    
}
 .logo{
    display:none;
}
footer #logoja{
    display: none;
}

}

/*pjesa e about*/ 
@media (max-width: 600px) {
    
    #about {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px; 
    }

    
    #about .col-md-6 {
        width: 100%; 
        margin: 0;
        text-align: center; 
    }

    #about .col-md-6 img {
        max-width: 65%; 
        height: auto; 
        margin: 0 auto; 
        border-radius: 8px;
        box-shadow: 0 0 2px 4px black;

        
    }

    #about .h1,
    #about .p,
    #about .h5 {
        text-align: center; 
        width: 1000%; 
        margin: 20px 0; 
        padding: 10px 10px;
    }
}


/*pjesa e blog*/
@media (max-width: 600px) {
    .blogbanner h1 {
        font-size: 24px;
        text-align: center;
    }

    
    .container#about {
        padding: 10px;
    }

    
    .col-md-12,
    .col-md-6 {
        width: 100%; 
        margin: 10px 0; 
        text-align: center; 
    }

    .col-md-12 img,
    .col-md-6 img {
        width: 90%; 
        height: auto; 
        margin-left: 0; 
    }

    
    .blogdesc {
        top: 70%; 
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%; 
        text-align: center;
    }

    .blogdesc h1 {
        font-size: 20px; 
        line-height: 1.4;
    }

    .blogdesc button {
        width: 120px; 
        height: 50px; 
        font-size: 14px;
        padding: 5px 10px; 
    }

    .blogdesc a {
        font-size: 14px; 
    }
}

    </style>

</head>


<body>
    <nav>
        <label class="logo"><span>Vogue Craft<span></label>

        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="#about">About</a> </li>
            <li><a href="shop.php">Shop</a> </li>
            <li><a href="#blog">Blog</a> </li>
            <li><a href="#contactbanner">Contact</a></li>
            <li><a href="login.php" class="btn">Login</a> </li>
        </ul>
    </nav>  

    <div class="section1" id="home">
        <img class="main_img" src="img/hermesimg.jpeg">

    </div>

 <!-- Sekcioni About -->
<div class="container" id="about">

        <div class="col-md-6">
            <img class="about_img" src="img/homeimg.jpeg" alt="VogueCraft Image" style="width:100%;margin-left:150px; border-radius:8px;box-shadow:0 0 2px 4px black; height:auto;">
        </div>

        
        <div class="teksti" style="margin-right:5px;margin-left:180px;">
            <h1><span>About Us</span></h1>
            <p style="color:#564024;font-size:20px">Welcome to <span>VogueCraft</span> where quality meets style. We’re dedicated to bringing you a curated collection of clothing that combines modern design with exceptional comfort and sustainability.</p>

           
            <h5 style="font-size:17px;"><b><span>Our Mission</span></b></h5>
            <p style="color:#564024; font-size:17px;">Our goal is to deliver a unique shopping experience where you find pieces that not only look good but also feel good to wear. We’re here to help you express your style while making responsible choices.</p>
         </div>
        
    
</div>


<!-- Sekcioni Blog -->
<div class="blogbanner" id="blog">
    <h1><span><b>Blog</b></span></h1>
</div>

<!-- Blog -->
<div class="container" id="about">
    <!--fotografite -->
    <div class="col-md-12" style="position: relative;">
        <img class="about_img" src="img/blog2.jpeg" alt="VogueCraft Image" 
             style="width:80%; object-fit:cover; height:400px; margin-left:40px; border-radius:8px; box-shadow:0 0 6px black;">
        
   
        <div class="blogdesc" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <h1 style="color:white;"><b>Upcoming Deals</b></h1>
            <button style="background-color:black; color:white;width:150px;height:60px;border-radius:8px;  font-weight:500; padding: 10px 20px; border: none; cursor: pointer;">
                <a href="learnmore.php" style="color: white; text-decoration: none;">Learn More</a>
            </button>
        </div>
    </div>


    <div class="col-md-6">
        <div class="col-md-12" style="position: relative;">
            <img class="about_img" src="img/blog3.jpeg" alt="VogueCraft Image" 
                 style="width:80%; object-fit:cover; height:400px; margin-left:50px; border-radius:8px; box-shadow:0 0 6px black;">
            
            <div class="blogdesc" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
      
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="col-md-12" style="position: relative;">
            <img class="about_img" src="img/blog1.jpeg" alt="VogueCraft Image" 
                 style="width:80%; object-fit:cover; height:400px; margin-left:40px; border-radius:8px; box-shadow:0 0 6px black;">
            
         
            <div class="blogdesc" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <h1 style="color:white;"><b>Upcoming Collection</b></h1>
                <button style="background-color:black; color:white;width:150px;height:60px;border-radius:8px; font-weight:500; padding: 10px 20px; border: none; cursor: pointer;">
                    <a href="newcollection.php" style="color: white; text-decoration: none;">Discover Now</a>
                </button>
            </div>
        </div>
    </div>
</div>

    

<!--seksioni i kontaktit-->
    <section id="contactbanner">
        <h1><b>Contact Us</b></h1> 
    </section>
    
    <section id="contact-details" class="shop">
        <div class="details">

       
            <p>GET IN TOUCH</p>
            <h1>Visit one of our agency locations or contact us</h1>
            <h4>Head Office</h4>
            <div>
                <ol>
                    
                    <p><bold>Address:</bold> 324 Main Street, Building 5, Pristina</p>
                    <p><bold>Phone:</bold> +383 44 123 456 / 046 877 778</p>
                    <p><bold>Hours:</bold> 10:00-18:00, Mon-Sat</p>
                    
                </ol>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11737.360892896297!2d21.142825661106798!3d42.65414516995319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ef1e1ab385f%3A0x4eeba7cc13123d32!2sBill%20Klinton%20Bulvar%C4%B1%2C%20Prishtina!5e0!3m2!1ssr!2s!4v1731218011719!5m2!1ssr!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"
        </div>

    </section>    





 

                <form class="contact-form" action="feedbacks.php" method="POST">
                    <h3>Leave a Message</h3>
            <p>We’d love to hear from you!</p>
            
            <input type="text" name="username" placeholder="Your Name" required>
                        <input type="text" name="lastname" placeholder="Last Name" required>

            <input type="email" name="email" placeholder="Your Email" required>
                        <input type="number" name="phone" placeholder="Phone" required>

            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send</button>
                </form>
            

   


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
