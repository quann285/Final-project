<script>
    function BuyNow() {
        document.getElementById("buy-now").submit();
    }
</script>
<?php

include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION["cart"])) {
    ?>
    <!--Cart-->
    <div id="my-cart">
        <div class="row">
            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Information of product</div>
            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Amount</div>
            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Price</div>
        </div>
        <form method="post">
            <?php

            foreach ($_SESSION["cart"] as $prd_id => $qtt) {
                $arr_id[] = $prd_id;
            }
            $str_id = implode(",", $arr_id);

            $sql = "SELECT * FROM product
            WHERE prd_id IN($str_id)";
            $query = mysqli_query($conn, $sql);
            $total_price_all = 0;
            while ($row = mysqli_fetch_array($query)) {

                $total_price = $_SESSION["cart"][$row["prd_id"]] * $row["prd_price"];
                $total_price_all += $total_price;
                ?>
                <div class="cart-item row">
                    <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                        <img src="admin/img/products/<?php echo $row["prd_image"]; ?>">
                        <h4><?php echo $row["prd_name"]; ?></h4>
                    </div>

                    <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                        <input name="qtt[<?php echo $row['prd_id']; ?>]" type="number" id="quantity"
                               class="form-control form-blue quantity"
                               value=<?php echo $_SESSION["cart"][$row["prd_id"]]; ?>
                               min="1">
                    </div>
                    <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $total_price; ?>đ</b><a
                                href="modules/cart/cart_del.php?prd_id=<?php echo $row["prd_id"]; ?>">Xóa</a></div>
                </div>
                <?php
            }
            ?>

            <div class="row">
                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                </div>
                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Total:</b></div>
                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $total_price_all; ?>đ</b>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["mail"]) && isset($_POST["add"])) {

        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["mail"];
        $add = $_POST["add"];

        $str_body = '';
        $str_body .= '
    <p>
        <b>Customer:</b> ' . $name . '<br>
        <b>Phone:</b> ' . $phone . '<br>
        <b>Address:</b> ' . $add . '<br>
    </p>';

        $str_body .= '
    <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
	<tr bgcolor="#305eb3">
    	<td width="70%"><b><font color="#FFFFFF">Product</font></b></td>
        <td width="10%"><b><font color="#FFFFFF">Amount</font></b></td>
        <td width="20%"><b><font color="#FFFFFF">TPrice</font></b></td>
    </tr> ';

        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $total_price = $_SESSION["cart"][$row["prd_id"]] * $row["prd_price"];

            $str_body .= '
    <tr>
    	<td width="70%">' . $row["prd_name"] . '</td>
        <td width="10%">' . $_SESSION["cart"][$row["prd_id"]] . '</td>
        <td width="20%">' . $total_price . ' đ</td>
    </tr>';
        }
        $str_body .= '
    <tr>
    	<td colspan="2" width="70%"></td>
        <td width="20%"><b><font color="#FF0000">' . $total_price_all . ' đ</font></b></td>
    </tr>
    </table>';

        $str_body .= '
    <p>
	Thank you for shopping in our Store. The delivery department will contact you again to confirm after 5 minutes from the successful order.
    </p>';

        $mail = new PHPMailer(true);                     // Passing 'true' enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'toyeucau34@gmail.com';                  // SMTP username
            $mail->Password = 'Quanhg4312h';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('admin@gmail.com', 'Sneaker Store');
            $mail->addAddress($email);
            $mail->addCC('admin@gmail.com');

            //Content
            $mail->isHTML(true);                             // Set email format to HTML
            $mail->Subject = 'Order confirmation from Sneaker Store';
            $mail->Body = $str_body;
            $mail->AltBody = 'Order description';

            $mail->send();
            header('location:index.php?page_layout=success');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    ?>
    <!--	Customer Information	-->
    <div id="customer">
        <form id="buy-now" method="post">
            <div class="row">

                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Full name (required)" type="text" name="name" class="form-control" required>
                </div>
                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Phone (required)" type="text" name="phone" class="form-control" required>
                </div>
                <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Email (required)" type="text" name="mail" class="form-control" required>
                </div>
                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                    <input placeholder="Address (required)" type="text" name="add"
                           class="form-control" required>
                </div>

            </div>
        </form>
        <div class="row">
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                <a onclick="BuyNow()" href="#">
                    <b>Buy now</b>
                </a>
            </div>
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                <a href="#">
                    <b>Payment Online</b>
                </a>
            </div>
        </div>
    </div>

    <?php
} else {
    ?>
    <div class="alert alert-danger mt-3"> Your shopping cart is empty!</div>
    <?php
}
?>