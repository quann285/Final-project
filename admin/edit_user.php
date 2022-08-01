<?php
if ($_SESSION["level"] == 2) {
    ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">You don't have permission to access file
    </div>
    <?php
} else {
    ?>
    <?php
    if (!defined('TEMPLATE')) {
        die("You don't have permission to access file, return to the page <a hred='index.php'>Login</a>");
    }
    $user_id = $_GET["user_id"];
    $sql_user = "SELECT * FROM user
            WHERE user_id = '$user_id' ";
    $query_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_array($query_user);

    if (isset($_POST["sbm"])) {
        $user_mail = $_POST["user_mail"];
        $user_full = $_POST["user_full"];
        $user_pass = $_POST["user_pass"];
        $user_re_pass = $_POST["user_re_pass"];
        $user_level = $_POST["user_level"];
        $row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_mail = '$user_mail'AND user_id != $user_id"));
        if ($row == 0) {
            if ($user_pass == $user_re_pass) {
                $sql = "UPDATE user 
                    SET user_mail = '$user_mail' ,
                        user_full = '$user_full' ,
                        user_pass = '$user_pass' ,
                        user_level = '$user_level'
                    WHERE user_id = '$user_id'";
                mysqli_query($conn, $sql);
                header("location:index.php?page_layout=user");

            } else {
                $error_pass = '<div class="alert alert-danger">Password incorrect!</div>';
            }
        } else {
            $error_mail = '<div class="alert alert-danger">Email already exists!</div>';
        }
    }
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li><a href="index.php?page_layout=user">Member Management</a></li>
                <li class="active"><?php echo $row_user["user_full"]; ?></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Member: <?php echo $row_user["user_full"]; ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            if (isset($error_mail)) {
                                echo $error_mail;
                            }
                            if (isset($error_pass)) {
                                echo $error_pass;
                            }
                            ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" name="user_full" required class="form-control"
                                           value="<?php echo $row_user["user_full"]; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" name="user_mail" required
                                           value="<?php echo $row_user["user_mail"]; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" name="user_pass" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Re-Password:</label>
                                    <input type="password" name="user_re_pass" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status:</label>
                                    <select name="user_level" class="form-control">
                                        <option <?php if ($row_user["user_level"] == 1) {
                                            echo 'selected';
                                        } ?> value=1>Admin
                                        </option>

                                        <option <?php if ($row_user["user_level"] == 3) {
                                            echo 'selected';
                                        } ?> value=3>Member
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
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
