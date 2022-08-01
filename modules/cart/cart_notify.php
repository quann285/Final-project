<div id="cart" class="col-lg-3 col-md-3 col-sm-12">
    <a class="mt-4 mr-2" href="index.php?page_layout=cart">Cart</a><span class="mt-3">
    <?php
    if (isset($_SESSION["cart"])) {
        if (isset($_POST["qtt"])) {
            foreach ($_POST["qtt"] as $prd_id => $qtt) {
                $_SESSION["cart"][$prd_id] = $qtt;
            }
        }
        $count = 0;
        foreach ($_SESSION["cart"] as $prd_id => $qtt) {
            $count += $qtt;
        }
        echo $count;
    } else {
        echo 0;
    }
    ?>
    </span>
</div>