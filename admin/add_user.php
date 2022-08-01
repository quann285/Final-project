<?php
if ($_SESSION["level"] == 2) {
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">You don't have permission to access file
    </div>
    <?php
} else {
    ?>
    <?php
    if (!defined("TEMPLATE")) {
        die("You don't have permission to access file, return the page <a href=index.php>Login<a/> ");
    }
    if (isset($_POST["sbm"])) {

        $user_full = $_POST["user_full"];
        $user_mail = $_POST["user_mail"];
        $user_pass = $_POST["user_pass"];
        $user_re_pass = $_POST["user_re_pass"];
        $user_level = $_POST["user_level"];

        if (mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE user_mail = '$user_mail'")) == 0) {
            if ($user_pass == $user_re_pass) {
                $sql = "INSERT INTO user (
                    user_full ,
                    user_mail ,
                    user_pass ,
                    user_level)
                    VALUES (
                    '$user_full',
                    '$user_mail',
                    '$user_pass',
                    '$user_level') ";
                mysqli_query($conn, $sql);
                header("location: index.php?page_layout=user");
            } else {
                $pass_error = '<div class="alert alert-danger">Password incorrect!</div>';
            }
        } else {
            $mail_error = '<div class="alert alert-danger">Email already exists!</div>';
        }
    }
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li><a href="">Member Management</a></li>
                <li class="active">Add member</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add member</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            if (isset($mail_error)) {
                                echo $mail_error;
                            }
                            if (isset($pass_error)) {
                                echo $pass_error;
                            }
                            ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input name="user_full" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input name="user_pass" required type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Re-password:</label>
                                    <input name="user_re_pass" required type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Level:</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Staff</option>
                                    </select>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Add</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
