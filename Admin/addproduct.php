<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';
$error = '';
$success = '';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$q = "select * from category";
$result = mysqli_query($conn, $q);
$rows = mysqli_num_rows($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pname = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $dis = $_POST['dis'];
    $number = $_POST['number'];
    $category = $_POST['category'];
    //$Img = $_FILES['img']['name'];
    //echo $Img;
    $Target = '/assest/upload/image' . '/' . basename($_FILES['img']['name']);
    $Target1 = 'assest/upload/image' . '/' . basename($_FILES['img']['name']);

    //  $Target2= 'img'.'/'.basename($_FILES['img']['name']);
   // echo $Target;
    //move_uploaded_file($_FILES["img"]["tmp_name"], $Target);




    if (empty($pname) && empty($desc) && empty($price) && empty($dis) && empty($category)) {
        $error = 'Please fill the form properly';
    } else {
        $sql = "INSERT INTO product (category,productname,description,image,number,price,discount)VALUES ('$category', '$pname', '$desc', '$Target1', '$number', '$price', '$dis')";
        $ack = mysqli_query($conn, $sql);
        move_uploaded_file($_FILES['img']['tmp_name'], '..' . $Target);
        if ($ack) {
            $success = 'User added successfully!!!';
        } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}






?>






<nav class="navbar navbar-dark " style="float:right;">
    <!-- Navbar content -->
    <a href="product.php" class="btn btn-primary">View Products</a>
</nav><br>
<div class="row" style="margin-left:2%;">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Adding New Products</h3>
                <?php
                if ($error != '') {
                    echo $error;
                    $error = '';
                }
                if ($success != '') {
                    echo $success;
                    $success = '';
                }

                ?>
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="addproduct.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" min="1"  name="price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount (%)</label>
                        <div class="col-sm-10">
                            <input type="number" name="dis" min="0" max="99" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Number of product</label>
                        <div class="col-sm-10">
                            <input type="number" min="1"  name="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-control m-bot15" name="category">
                                <option value="">Select category</option>
                                <?php if ($rows > 0) {
                                    while ($c = mysqli_fetch_array($result))

                                        echo '<option value="' . $c['id'] . '">' . $c['category'] . '</option>
                                ';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="img" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Add New Product </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>