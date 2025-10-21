<?php
require 'data_check.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php"); 
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $lastname = mysqli_real_escape_string($data, $_POST['lastname']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    
    if (!empty($_POST['password'])) {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET username='$username', lastname='$lastname', email='$email', phone='$phone', password='$hashed_password' WHERE id='$id'";
    } else {
        $query = "UPDATE users SET username='$username', lastname='$lastname', email='$email', phone='$phone' WHERE id='$id'";
    }

    $result2 = mysqli_query($data, $query);

    if ($result2) {
        $_SESSION['message'] = 'Customer updated successfully!';
        header("location:view_klient.php");
        exit();
    } else {
        die("Update failed: " . mysqli_error($data));
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
   
    <?php
    
    include 'admin_css.php';
    
    ?>
    
    <style type="text/css">
    
label {
    display: inline-block;
    width: 150px;
    text-align: right;
    padding: 10px 0;
    color: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 500;
}


.div_deg {
    background-color: #B7957F;
    width: 450px;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    padding-top: 70px;
    padding-bottom: 70px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    transition: all 0.3s ease;
}

#custdt-inpt {
    width: 200px;
    background-color: transparent;
    border-radius: 8px;
    border: 1px solid white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    color: white;
    padding: 8px 10px;
    margin: 8px 0;
    transition: all 0.3s ease;
}
 


.btn {
    margin-top: 15px;
    background-color: transparent;
    border: 1px solid white;
    color: white;
    border-radius: 8px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
}

@media screen and (max-width: 768px) {
    .div_deg {
        width: 95%;
        padding: 40px 20px;
    }

    label {
        width: 30%;
        font-size: 14px;
    }

    #custdt-inpt {
        width: 80%;
        padding: 8px;
        margin: 6px 0;
    }

    #custdt-btn {
        font-size: 14px;
        padding: 8px 16px;
    }
}

        
    </style>
    
    </head>
    <body>
    
    <?php
        
    include 'admin_sidebar.php';
        
        ?>
        
        <div class="content">
            
            <center>
        
           <h3><span><b>Change Customer Data</b></span></h3>
            
            <div class="div_deg">
            <form action="#" method="post">
                <div>
                <label>Name</label>
                    <input type="text" name="username" id="custdt-inpt" value="<?php echo "{$info['username']}";  ?>">
                </div>
                <div>
                 <label>Surname</label>
                    <input type="text" name="lastname"id="custdt-inpt" value="<?php echo "{$info['lastname']}";  ?>">
                </div>
                
                <div>
                <label>Email</label>
                    <input type="email" name="email" id="custdt-inpt" value="<?php echo "{$info['email']}";  ?>">
                
                </div>
                
                <div>
                <label>Tel</label>
                    <input type="number" name="phone" id="custdt-inpt" value="<?php echo "{$info['phone']}";  ?>">
                
                </div>
                
                <div>
                <label>Password</label>
                    <input type="text" name="password" id="custdt-inpt" value="<?php echo "{$info['password']}";  ?>">
                
                </div>
                
                <div>
                    <input  class="btn"type="submit" id="custdt-btn" name="update" value="Change">
                
                </div>
                </form>
            
            </div>
        
        </center>
        </div>
        
    
    
    </body>
</html>