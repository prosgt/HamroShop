<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$q = "SELECT sales.id, product.id as pid ,  product.productname, product.description, 
product.image, sales.qty, sales.amount, sales.status FROM sales 
INNER JOIN product ON sales.pid = product.id   ORDER by sales.id ASC ";
$result = mysqli_query($conn, $q);
$rows = mysqli_num_rows($result);


?>




<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-10"></div>
        <div class="col-lg-2" style="float:right; margin-top:5px; margin-left:50px; margin-right:-100;">
            
        </div>
    </div>
</div>

<div id="report" class="row" style="margin-left:2px;">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Sales Product List </h3>
            </header>

            <table class="table table-striped table-advance table-hover table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php if ($rows > 0) {
                    while ($p = mysqli_fetch_array($result)) {
                        $a = 1;
                        if($p['status']==0)
                        {
                            $status = '<div class="btn btn-warning btn-sm">Processing</div>';
                        }
                        else
                        {
                            $status = '<div class="btn btn-success btn-sm">confirmed</div>';
                        }
                        echo '
                        <tbody>
                            <tr>
                                
                                <td>' . $a . '</td>
                                <td>' . $p['productname'] . '</td>
                                <td>' . substr($p['description'],0,40).'...</td>
                                <td>   <img src="../' . $p['image'] . '" alt="Product Img" height="40" width="40">
                                <td> ' . $p['qty'] . '</td>
                                <td>Rs. ' . $p['amount'] . '</td>
                                <td> ' . $status . '</td>
                                <td> <div class=" btn group btn-group-sm">
                                ';
                                if($p['status']==0)
                                {
                                   echo ' <a href="confirm.php?id='.$p['id'].'" class="btn btn-primary">Confirm</a>
                                    </div>';
                                }
                                 echo ' </td>

                            </tr>
                            ';
                            $a =$a+1;
                    }
                } else {
                    echo '<tr><h1>No product are in cart </h1></tr>';
                }
                ?>
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