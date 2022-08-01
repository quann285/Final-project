<?php
if (!defined('TEMPLATE')) {
    die("You don't have permission to access file, return to the page <a hred='index.php'>Login</a>"); //báo lỗi ng dùng
}
$cat_id = $_GET["cat_id"];
$sql_cat = "SELECT * FROM category
WHERE cat_id =  $cat_id";
$query_cat = mysqli_query($conn, $sql_cat);
$row_cat = mysqli_fetch_array($query_cat);

if (isset($_POST["sbm"])) {
    $cat_name = $_POST["cat_name"];
    if (mysqli_num_rows(mysqli_query($conn, "SELECT *FROM category WHERE cat_name= '$cat_name'")) == 0) {
        $sql = "UPDATE category
      SET cat_name = '$cat_name' 
      WHERE cat_id = $cat_id";
        mysqli_query($conn, $sql);
        header('location:index.php?page_layout=category');
    } else {
        $error = '<div class="alert alert-danger">Category already exists!</div>';
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
            <li><a href="">Category Management</a></li>
            <li class="active"><?php echo $row_cat["cat_name"] ?></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $row_cat["cat_name"] ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Category Name:</label>
                                <input type="text" name="cat_name" required value="<?php echo $row_cat["cat_name"] ?>"
                                       class="form-control" placeholder="Category name...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

