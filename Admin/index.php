<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$q = "SELECT product.id, category.category, product.productname, product.description, 
        product.image, product.number, product.price, product.discount FROM `product` 
        LEFT JOIN category ON product.category = category.id ORDER by product.id ASC";
$result = mysqli_query($conn, $q);
$rows = mysqli_num_rows($result);


?>




<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-10"></div>
        <div class="col-lg-2" style="float:right; margin-top:5px; margin-left:50px; margin-right:-100;">
            <a href="addproduct.php" class="btn btn-info">Add new Product</a>
        </div>
    </div>
</div>

<div id="report" class="row" style="margin-left:2px;">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Product List </h3>
            </header>

            <table class="table table-striped table-advance table-hover table table-bordered">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php if ($rows > 0) {
                        while ($c = mysqli_fetch_array($result)) {
                            echo '
                    <tr>
                        <td>' . $c['id'] . '</td>
                        <td>' . $c['productname'] . '</td>
                        <td>' . $c['category'] . '</td>
                        <td>' . 
                        //jxg ajkgc asjkkg skldhcssod adjg
                        substr($c['description'],0,20).'...
                        </td>
                        <td>' . $c['number'] . '</td>
                        <td>' . $c['price'] . '</td>
                        <td>' . $c['discount'] . '</td>
                        <td>   <img src=" ../' . $c['image'] . '" alt="Product Img" height="42" width="42">
                        
                       </td>
                        
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-warning" href="editproduct.php?id=' . $c['id'] . '">Edit</a>
                                <a class="btn btn-danger" href="deleteproduct.php?id=' . $c['id'] . '">Delete</i></a>
                            </div>
                        </td>
                    </tr>
                    ';
                        }
                    } ?>

                </tbody>
            </table>
        </section>
    </div>
</div>


<!-- 
<script type="text/javascript">
    function report() {
        var print_div = document.getElementById("report");
        var print_area =  window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
        // This is the code print a particular div element
    }
</script> -->