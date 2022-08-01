<?php

if(isset($_GET["page"])){
    $page = $_GET["page"] ;
}
else{
    $page = 1 ;
}
if(isset($_POST["keyword"])){
    $keyword = $_POST["keyword"] ;
}
else{
    if(isset($_GET["kwd"])){
        $keyword = $_GET["kwd"] ;
    }
    else{
        $keyword = "" ;
    }
}



$arr = explode(" " , $keyword) ;
$new_keyword = "%".implode("%" , $arr)."%" ;

$rows_per_page = 9 ;
$per_row = $page *$rows_per_page - $rows_per_page ;

$total_pages = ceil(mysqli_num_rows(mysqli_query($conn , "SELECT *FROM product WHERE prd_name LIKE '$new_keyword'"))/$rows_per_page) ;
$list_pages = "";


$prev_page = $page - 1 ;
if($prev_page<=0){
    $prev_page = 1 ;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&kwd='.$keyword.'&page='.$prev_page.'">&laquo</a></li>';

for($i=1 ; $i<=$total_pages ; $i++){
    if($page == $i){
        $list_pages .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=search&kwd='.$keyword.'&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&kwd='.$keyword.'&page='.$i.'">'.$i.'</a></li>';
    }
}

$next_page = $page +1 ;
if($next_page>$total_pages){
    $next_page = $total_pages ;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&kwd='.$keyword.'&page='.$next_page.'">&raquo</a></li>';


$sql = "SELECT * FROM product 
        WHERE prd_name LIKE '$new_keyword'
        LIMIT $per_row, $rows_per_page";
$query = mysqli_query($conn , $sql ) ;
$rows = mysqli_num_rows($query) ;

?>


<!--	List Product	-->
<div class="products">
    <div id="search-result">Search results for products <span><?php echo $keyword ;?></span></div>
    <?php
    $i = 0 ;
    while($row = mysqli_fetch_array($query)){
        if($i == 0) {
            ?>
            <div class="product-list card-deck">
            <?php
        }
        ?>
        <div class="product-item card text-center">
            <a href="index.php?page_layout=product&prd_id=<?php echo $row["prd_id"] ;?>"><img src="admin/img/products/<?php echo $row["prd_image"] ;?>"></a>
            <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row["prd_id"] ;?>"><?php echo $row["prd_name"] ;?></a></h4>
            <p>Price: <span><?php echo $row["prd_price"] ;?>đ</span></p>
        </div>
        <?php
        $i++ ;
        if($i == 3 ){
            $i=0 ;
            ?>
            </div>
            <?php
        }
    }
    if($rows%3!=0){
    ?>
</div>
<?php
}
?>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">

        <?php
        if(mysqli_num_rows(mysqli_query($conn , "SELECT *FROM product WHERE prd_name LIKE '$new_keyword'")) > $rows_per_page){
            echo $list_pages ;
        }
        else{
            echo "" ;
        }
        ?>

    </ul>
</div>