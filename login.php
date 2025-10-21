<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Form</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body class="body_foto">

    <center>

        <div class="form_deg">
            
                <center class="title_deg">
                   <span><b> Log In</b></span>
                    
                   
                    <?php
                        
                    
                        error_reporting(0);
                        session_start();

                        if (isset($_SESSION['loginMessage'])) {
                        echo "<div style='color:red;'>" . $_SESSION['loginMessage'] . "</div>";
                        unset($_SESSION['loginMessage']);
                                                            }

                     ?>

                        
                   
                    
                    
                    
                </center>
                
                <form action="login_check.php" method="post" class="login_form">

                <div>
                    
                    <input type="text" name="username" placeholder="Username" id="inputi">
                </div>

                <div>
               
                    <input type="password" name="password" placeholder="Password" id="inputi">
                </div>

                <div>
                    <input class="btn" id="login-btn" type="submit" name="submit" value="Login">
                </div>


            </form>

        </div>


    </center>

</body>

</html>
