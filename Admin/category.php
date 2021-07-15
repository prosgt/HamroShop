<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';
$error = '';
$success = '';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $category = $_POST['category'];
    $desc = $_POST['description'];
    if(empty($category))
    {
        $error = 'Category should not be empty';
    }
    else
    {
        $sql = "INSERT INTO category (category ,description)VALUES ('$category', '$desc')";
        $ack = mysqli_query($conn, $sql);
        if ($ack) {
            $success = 'Category added successfully!!!';
        } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
if($_SERVER['REQUEST_METHOD']=='GET')
{
    if((isset($_GET['id']))&& $_GET['del'] == 1)
    {
            $id = $_GET['id'];
            $sql = "DELETE from category where id = $id";
             $ack = mysqli_query($conn, $sql);
             if ($ack) {
            $success = 'Category deleted successfully!!!';
             } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
            }

    }

}



///fetching data from database

$q = "SELECT category.id, category.category, count(product.category) as totalproduct, category.description FROM 
        category LEFT JOIN product ON category.id = product.category GROUP by category.id";
$result = mysqli_query($conn, $q);
$rows = mysqli_num_rows($result);
?>




<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-10"></div>
        <div class="col-lg-2" style="float:right; margin-top:5px; margin-left:50px; margin-right:-100;">
            <a ></a>
        </div>
    </div>
</div>

<div id="report" class="row" style="margin-left:2px;">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
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
                <h3>Category List </h3>
            </header>

            <table class="table table-striped table-advance table-hover table table-bordered">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Total Product</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <?php if ($rows > 0) {
                        while ($c = mysqli_fetch_array($result)) {
                            echo '
                    <tr>
                        <td>' . $c['id'] . '</td>
                        <td>' . $c['category'] . '</td>
                        <td>' . $c['totalproduct'] . '</td>
                        <td>' . $c['description'] . '</td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a class="btn btn-warning" href="category.php?id=' . $c['id'] .'">Edit</a>
                                <a class="btn btn-danger" href="category.php?id=' . $c['id'] . '&&del=1">Delete</i></a>
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


<div class="row" style="margin-left:2%;">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Add New Category</h3>
            </header>
            <div class="panel-body">
                <form class="form-horizontal" action="category.php" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="category" class="form-control">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description *</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control">
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