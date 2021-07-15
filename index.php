<?php
include_once 'include/header.php';
include_once 'config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$q = "select * from product where number>0";
$q2 = "select * from category";
$result = mysqli_query($conn, $q);
$result2 = mysqli_query($conn, $q2);
$category = mysqli_num_rows($result2);
$rows = mysqli_num_rows($result);
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
                    while ($c = mysqli_fetch_array($result))
                    {
                    $mp = $c['price'];
                    $dis = $c['discount'];
                    $sp = $mp - ($dis*$mp/100);
                        echo '
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="'.$c['image'].'" style="height:260px; width:260px;" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">' . $c['productname'] . '</a>
                            </h4>
                            <h5 style="color:red;"><strike>Rs. ' . $c['price'] . '</strike></h5>
                            

                            <h6>Rs. ' . $sp . '</h6>

                            <p class="card-text">' . substr($c['description'],0,30).'...
                            
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            '// <div class="btn btn-primary btn-sm" style="float:right;">Add to cart</div>
                        
                        
                        
                        .'  
                        <a href="detail.php?id='.$c['id'].'" style="float:right;" class="btn btn-sm btn-info">more </a>
                        
                        </div>
                    </div>
                </div>';
                    }
                }
                ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->






<?php
include_once 'include/footer.php'
?>