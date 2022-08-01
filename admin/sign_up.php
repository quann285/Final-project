<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SNEAKER STORE</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once("connect.php");
if (isset($_POST["sbm"])) {

    $user_full = $_POST["user_full"];
    $user_mail = $_POST["user_mail"];
    $user_pass = $_POST["user_pass"];
    $user_level = $_POST["user_level"];

    if ($user_full == "" || $user_mail == "" || $user_pass == "" || $user_level == "") {
        echo "Please, input information in form";
    } else {
        $sql = "SELECT* FROM user where user_full='$user_full'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            echo "This account is Invalid ";
        } else {

            $sql = "INSERT INTO user(
                  user_full,
                  user_mail,
                  user_pass,
                  user_level
                  )
                   VALUES 
                  (
                  '$user_full',
                  '$user_mail',
                  '$user_pass',
                  '$user_level'
                  )";

            mysqli_query($conn, $sql);
            echo "Congratulations on your successful account registration!
                 Return to Login page! <a href= 'index.php'>Login</a>
                 ";
        }
    }
}
?>

<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user_full" id="name" placeholder="Your Name:"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="user_mail" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="user_pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="level" name="user_level" id="level" placeholder="Level"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">terms of service!!!</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="sbm" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="img/signup-image.png" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link"></a>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>