<?php
$prd_id = $_GET["prd_id"];
$sql = "SELECT * FROM product
        WHERE prd_id = $prd_id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<!--Product List-->
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/products/<?php echo $row["prd_image"]; ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $row["prd_name"]; ?></h1>
            <ul>
                <li><span>Warranty:</span> <?php echo $row["prd_warranty"]; ?></li>
                <li><span>Accessories:</span> <?php echo $row["prd_accessories"]; ?></li>
                <li><span>Status:</span> <?php echo $row["prd_new"]; ?></li>
                <li><span>Promotion:</span> <?php echo $row["prd_promotion"]; ?></li>
                <li id="price">Not VAT</li>
                <li id="price-number"><?php echo $row["prd_price"]; ?>đ</li>
                <li class="<?php if ($row["prd_status"] == 0) {
                    echo "text-danger";
                } ?>" id="status"><?php if ($row["prd_status"] == 1) {
                        echo "stock!";
                    } else {
                        echo "product is coming!";
                    } ?></li>
            </ul>
            <div id="add-cart"><a href="modules/cart/cart_add.php?prd_id=<?php echo $row["prd_id"]; ?>">Buy now</a>
            </div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Reviews: <?php echo $row["prd_name"]; ?></h3>
            <?php echo $row["prd_details"]; ?>
        </div>
    </div>
    <?php
    if (isset($_POST["sbm"])) {
        $comm_name = $_POST["comm_name"];
        $comm_mail = $_POST["comm_mail"];
        date_default_timezone_set("Asia/BangKok");
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = $_POST["comm_details"];

        $sql = "INSERT INTO comment(
            comm_name,
            comm_mail,
            comm_date,
            comm_details,
            prd_id
        )
        VALUE(
            '$comm_name',
            '$comm_mail',
            '$comm_date', 
           ' $comm_details',
           '$prd_id'
        )";
        mysqli_query($conn, $sql);
    }
    ?>
<!--Comment-->
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Comment product</h3>
            <form method="post">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>

<!--Comments List-->
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php

            $prd_id = $_GET["prd_id"];
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $row_per_page = 2;
            $per_row = $page * $row_per_page - $row_per_page;
            $total_page = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT *FROM product WHERE prd_id = $prd_id ")) / $row_per_page);
            $list_page = "";
            $page_prev = $page - 1;
            if ($page_prev < 1) {
                $page_prev = 1;
            }
            $list_page .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $page_prev . '">&laquo</a></li>';
            for ($i = 1; $i <= $total_page; $i++) {
                $list_page .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $i . '">' . $i . '</a></li>';
            }
            $page_next = $page + 1;
            if ($page_next > $total_page) {
                $page_next = $total_page;
            }
            $list_page .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=product&prd_id=' . $prd_id . '&page=' . $page_next . '">&raquo</a></li>';
            $sql = "SELECT *FROM comment
          WHERE prd_id = $prd_id
          ORDER BY comm_id DESC";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                ?>

                <div class="comment-item">
                    <ul>
                        <li><b><?php echo $row['comm_name']; ?></b></li>
                        <li><?php echo $row['comm_date']; ?></li>
                        <li>
                            <p><?php echo $row['comm_details']; ?></p>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<!--End Comments List-->
</div>
<!--End Product List-->
<div id="pagination">
    <ul class="pagination">
        <?php
        echo $list_page;
        ?>
    </ul>
</div>