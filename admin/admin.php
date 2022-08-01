<?php
if (!defined("TEMPLATE")) {
    die("You don't have permission to access file, return to the page, <a href= 'index.php'>Login</a>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sneaker Store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <script src="js/lumino.glyphs.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Sneaker</span>Store</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg> <?php echo $_SESSION["name"]; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">

                        <li><a href="logout.php">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <?php
        if ($_SESSION["level"] == 1) {
            ?>
            <li class="active"><a href="index.php">
                    <svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg>
                    Dashboard</a></li>
            <li><a href="index.php?page_layout=user">
                    <svg class="glyph stroked male user ">
                        <use xlink:href="#stroked-male-user"/>
                    </svg>
                    Member Management</a></li>
            <li><a href="index.php?page_layout=category">
                    <svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder"/>
                    </svg>
                    Category Management</a></li>
            <li><a href="index.php?page_layout=product">
                    <svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>
                    Product Management</a></li>
            <?php
        }
        ?>
        <?php
        if ($_SESSION["level"] == 2) {
            ?>
            <li class="active"><a href="index.php">
                    <svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg>
                    Dashboard</a></li>
            <li><a href="index.php?page_layout=category">
                    <svg class="glyph stroked open folder">
                        <use xlink:href="#stroked-open-folder"/>
                    </svg>
                    Category Management</a>
            </li>
            <li><a href="index.php?page_layout=product">
                    <svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>
                    Product Management</a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>

<?php
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case "product":
            include_once("product.php");
            break;
        case "add_product":
            include_once("add_product.php");
            break;
        case "edit_product":
            include_once("edit_product.php");
            break;
        case "category":
            include_once("category.php");
            break;
        case "add_category":
            include_once("add_category.php");
            break;
        case "edit_category":
            include_once("edit_category.php");
            break;
        case "user":
            include_once("user.php");
            break;
        case "add_user":
            include_once("add_user.php");
            break;
        case "edit_user":
            include_once("edit_user.php");
            break;
    }
} else {
    include_once("dashboard.php");
}
?>
</body>
</html>