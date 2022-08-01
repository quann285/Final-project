<?php
if (!defined("TEMPLATE")) {
    die("You don't have permission to access file, return to the page <a href= 'index.php'>Login</a>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SNEAKER STORE</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

</head>
<body>
<?php
if (isset($_POST["sbm"])) {
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    $sql = "SELECT *FROM user
		WHERE user_mail = '$mail'
         AND user_pass = '$pass'";

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {

        $_SESSION["mail"] = $mail;
        $_SESSION["pass"] = $pass;

        $row = mysqli_fetch_array($query);
        $_SESSION['name'] = $row["user_full"];
        $_SESSION['level'] = $row["user_level"];

        header('Location: index.php');
    } else {
        $error = ' <div class="alert alert-danger">This account not valid!</div>';
    }
}
?>
<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <div class="panel-body">
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class=" zmdi zmdi-account material-icons-name"></i></label>
                                <input type="Email" name="mail" placeholder="E-mail"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class=" zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me!</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="sbm" class="form-submit" value="Login"/>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="signin-image">
                    <figure>
                        <img src="img/signin-image.png" alt="sign up image">
                        <a href="sign_up.php" class="signup-image-link">Create account!</a>
                    </figure>
                </div>
            </div>
    </section>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
