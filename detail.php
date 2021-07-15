<?php
include_once 'include/header.php';
include_once 'config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: index.php');
    } else {
        $id = $_GET['id'];
        // if(empty($id))
        // {
        //     header('Location:index.php');
        // }
        $q = "select * from product where id = $id";
        $q2 = "select * from category";
        $result = mysqli_query($conn, $q);
        $result2 = mysqli_query($conn, $q2);
        $category = mysqli_num_rows($result2);
        $rows = mysqli_num_rows($result);
    }
}
?>






<!-- Page Content -->
<div class="container-fluid" style="margin:0; margin-top:0; padding:0;">

    <div class="row" style="margin:0; margin-top:0; padding:0;">

        <div class="col-lg-2">

            <h1 class="my-4" style="font-family:'Futura XBlk BT'">E-Mall</h1>
            <div class="list-group" style="margin:0;padding:0;">
                <div class="list-group-item">Category</div>
                <?php if ($category > 0) {
                    while ($c = mysqli_fetch_array($result2))
                    echo '<a href="category.php?id=' . $c['id'] . '" class="list-group-item">' . $c['category'] . '</a>
                        ';
                } ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-10">

            <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel" style="width:100%">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="assest/img/slide/slide1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="assest/img/slide/slide2.webp" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="assest/img/slide/slide3.webp" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">
                <?php if ($rows > 0) {
                    while ($c = mysqli_fetch_array($result)) {
                        $mp = $c['price'];
                        $dis = $c['discount'];
                        $sp = $mp - ($dis * $mp / 100);
                        echo '
                
            <!-- /.row -->

        
<!-- /.container -->



</div>
<div class="container">


    
    <div class="row">
        <div class="col-lg-6 border">
            <!-- <div class="card-body"> -->
            <input id="myid" type="hidden" name="id" value="2">
            <img src="' . $c['image'] . '" class="img-fluid mb-3 img-thumbnail"style="height:460px; width:460px;" alt="" style="position: center;">
        </div>
        <div class="col-lg-6 border">

                    

    <h2>   ' . $c['productname'] . '</h2>
    ' . $c['description'] . '
            <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                
            </div>
            <h4 style="text-center"><strike class="text-danger">Rs.' . $c['price'] . '</strike><br> <span>Rs.' . $sp . ' </span> <span class="text-danger"> (' . $c['discount'] . '%off)</span></h4>
            <form action="cart.php" method="POST">
                <input type="number" class="col-12" name="qty"  max="' . $c['number'] . '"  placeholder="Quantity" class=" col-2 form-control qty">
                    <span>Only ' . $c['number'] . ' left in stock</span>
                    <div class="btn-group col-12" style="padding-left: 0px; padding-top:20px;">
                <!-- <input type="button" value="Add To Cart" class="btn btn-success mb-3" onclick="return addToCart();"> -->

                <!-- 	<a href="itemdb.php?id=" class="btn btn-success mb-3">Add to card</a> 
     -->
                 <input type="Hidden" name="pid" value="'.$c['id'].'">
                <button class="btn btn-info mb-3 addToCart" data-id="2" type="submit">Add to cart</button>
                </form>
                
            </div>
            </span>
        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<?php
include_once 'include/footer.php'
?>