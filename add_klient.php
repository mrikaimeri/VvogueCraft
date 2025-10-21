<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'client') {
    header("location:login.php");
}

require 'data_check.php';

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "client";

    $check = "SELECT * FROM users WHERE username='$username'"; // Kontrollon se a egziston username n'db
    $check_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) { 
        echo "<script type='text/javascript'> alert('This username exists'); </script>";
    } else {
        // hash i  psw 
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        // regjistrimi i perdoruesit n db
        $sql = "INSERT INTO users(username, lastname, phone, email, usertype, password) VALUES('$username','$user_lastname','$user_phone','$user_email','$usertype','$hashed_password')";
        
        $result = mysqli_query($data, $sql);
        
        if ($result) {
            echo "<script type='text/javascript'> alert('Client added'); </script>";
        } else {
            echo "Error";
        }
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>


    <style type="text/css">

       

        .div_deg {
    background-color: #B7957F;
    border-radius: 12px;
    width: 400px;
    max-width: 90%; 
    height: auto; 
    padding: 60px 20px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(93, 70, 37, 0.66);
    margin: 30px auto; 
}

#addclient-input {
    margin-top: 20px;
    background-color: transparent;
    border-radius: 10px;
    border: 1px solid white;
    box-shadow: 0 4px 12px rgba(93, 70, 37, 0.31);
    color: white;
    padding: 10px;
    width: 80%; 
    max-width: 300px;
    transition: all 0.3s ease;
}

#addclient-input:focus {
    outline: none;
    box-shadow: 0 4px 12px rgba(253, 229, 229, 0.4);
}

#addclient-btn {
    color: white;
    background-color: transparent;
    border: 1px solid white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(93, 70, 37, 0.66);
    margin-top: 20px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
}

#addclient-btn:hover {
    box-shadow: 0 8px 20px rgba(253, 229, 229, 0.33);
    transform: scale(1.05);
}

    </style>


    <?php
    
    include 'admin_css.php';
    
    ?>

</head>

<body>

    <?php
        
    include 'admin_sidebar.php';
        
        ?>

    <div class="content">
        <center>
            <h1><span><b>Add Client</b></span></h1>

            <div class="div_deg">

                <form action="" method="post">

                    <div>
                      
                        <input type="text" name="name" id="addclient-input" placeholder="Name">
                    </div>
                    
                    <div>
                      
                        <input type="text" name="lastname" id="addclient-input" placeholder="Username">
                    </div>
                    
                    
                    <div>
                      
                        <input type="email" name="email" id="addclient-input" placeholder="Email">
                    </div>

                    <div>
                      
                        <input type="number" name="phone" id="addclient-input" placeholder="Phone">
                    </div>

                    <div>
                       
                        <input type="password" name="password" id="addclient-input" placeholder="Password">
                    </div>

                    <div>
                        <input type="submit" class="btn" id="addclient-btn" name="add_student" value="Add">
                    </div>



                </form>


            </div>

        </center>
    </div>


</body>

</html>
