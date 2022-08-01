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
    ?>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php?page_layout=add_user">
                        <svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg>
                    </a></li>
                <li class="active">User List</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User List</h1>
            </div>
        </div>

        <div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Add user
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table
                                data-toolbar="#toolbar"
                                data-toggle="table">
                            <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_GET["page"])) {
                                $page = $_GET["page"];
                            } else {
                                $page = 1;
                            }
                            $row_per_page = 2;
                            $per_row = $page * $row_per_page - $row_per_page;
                            $total_page = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user")) / $row_per_page);//lay ra san pham

                            $list_page = "";
                            $page_prev = $page - 1;
                            if ($page_prev <= 0) {
                                $page_prev = 1;
                            }
                            $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_prev . '">&laquo</a></li>';

                            for ($i = 1; $i <= $total_page; $i++) {
                                $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $i . '">' . $i . '</a></li>';
                            }
                            $page_prev = $page + 1;
                            if ($page_prev >= $total_page) ;
                            $page_prev = $total_page;
                            $list_page .= ' <li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_prev . '">&raquo</a></li>';

                            $sql = "SELECT user_id, user_full, user_mail, user_pass, user_level
                            FROM user
                            LIMIT $per_row, $row_per_page";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {

                                ?>
                                <tr>
                                    <td style=""><?php echo $row["user_id"] ?></td>
                                    <td style=""><?php echo $row["user_full"] ?></td>
                                    <td style=""><?php echo $row["user_mail"] ?></td>
                                    <td><span class="label label-<?php if ($row["user_level"] == 1) {
                                            echo "danger";
                                        } else {
                                            echo "warning";
                                        }
                                        ?>">
                                        <?php if ($row["user_level"] == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "Staff";
                                        }
                                        ?>
                                    </span></td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_user&user_id=<?php echo $row["user_id"]; ?>"
                                           class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#staticBackdrop<?php echo $row["user_id"]; ?>"><i
                                                    class="glyphicon glyphicon-remove "></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop<?php echo $row["user_id"]; ?>"
                                             data-backdrop="static" data-keyboard="false" tabindex="-1"
                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            Delete <?php echo $row["user_full"]; ?> </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you want to delete? <?php echo $row["user_full"]; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel
                                                        </button>
                                                        <a href="del_user.php?user_id=<?php echo $row["user_id"]; ?>"
                                                           class="btn btn-danger">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                echo $list_page;
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <?php
}
?>

