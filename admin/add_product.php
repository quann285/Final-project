<?php
if (!defined('TEMPLATE')) {
    die("You don't have permission to access file, return to the page <a hred='index.php'>Login</a>");
}
if (isset($_POST["sbm"])) {
    $prd_name = $_POST["prd_name"];
    $prd_price = $_POST["prd_price"];
    $prd_warranty = $_POST["prd_warranty"];
    $prd_accessories = $_POST["prd_accessories"];
    $prd_promotion = $_POST["prd_promotion"];
    $prd_new = $_POST["prd_new"];
    $prd_image = $_FILES['prd_image']['name'];
    $file_tmp_name = $_FILES['prd_image']['tmp_name'];
    move_uploaded_file($file_tmp_name, 'img/products/' . $prd_image);
    $cat_id = $_POST["cat_id"];
    if (isset($_POST["prd_featured"])) {
        $prd_featured = $_POST["prd_featured"];
    } else {
        $prd_featured = 0;
    }

    $prd_details = $_POST["prd_details"];
    $prd_status = $_POST["prd_status"];
    $sql = "INSERT INTO product(
        prd_name,
        prd_price,
        prd_warranty,
        prd_accessories,
        prd_promotion,
        prd_new,
        prd_image,
        cat_id,
        prd_status,
        prd_featured,
        prd_details
    )
    VALUE(
        '$prd_name',
        '$prd_price',
        '$prd_warranty',
        '$prd_accessories',
        '$prd_promotion',
        '$prd_new',
        '$prd_image',
        '$cat_id',
        '$prd_status',
        '$prd_featured',
        '$prd_details'
        )";
    mysqli_query($conn, $sql);
    header('location:index.php?page_layout=product');
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
            <li><a href="">Product Management</a></li>
            <li class="active">Add product</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ADD PRODUCT</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name product:</label>
                                <input required name="prd_name" class="form-control" placeholder="Adidas neo">
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input required name="prd_price" type="number" min="0" class="form-control"
                                       placeholder="1000000đ">
                            </div>
                            <div class="form-group">
                                <label>Warranty:</label>
                                <input required name="prd_warranty" type="text" class="form-control" placeholder="week">
                            </div>
                            <div class="form-group">
                                <label>Accessories:</label>
                                <input required name="prd_accessories" type="text" class="form-control"
                                       placeholder="box">
                            </div>
                            <div class="form-group">
                                <label>Promotion:</label>
                                <input required name="prd_promotion" type="text" class="form-control"
                                       placeholder="cleaning">
                            </div>
                            <div class="form-group">
                                <label>New:</label>
                                <input required name="prd_new" type="text" class="form-control" placeholder="100%">
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input required name="prd_image" type="file">
                            <br>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="cat_id" class="form-control">
                                <option value=1>ADIDAS</option>
                                <option value=2>NIKE</option>
                                <option value=3>CONVERSE</option>
                                <option value=4>BITIS</option>
                                <option value=5>VANS</option>
                                <option value=6>MLD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status:</label>
                            <select name="prd_status" class="form-control">
                                <option value=1 selected>Stock!</option>
                                <option value=0>Product is coming!</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Featured:</label>
                            <div class="checkbox">
                                <label>
                                    <input name="prd_featured" type="checkbox" value=1>Featured
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Product Description:</label>
                            <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="sbm" type="submit" class="btn btn-success">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

