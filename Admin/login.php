<?php
session_start();
//include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $email  = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $error = 'Please input all required inputs';
    } 
    else{
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * from user where email= '$email'and password = '$password' and type = 2";
        $result= mysqli_query($conn,$sql);
        $rows=mysqli_num_rows($result);
        if($rows>0)
        {
            while($r=mysqli_fetch_assoc($result))
            {
                $_SESSION['uid']=$r['id'];
                $_SESSION['fname']=$r['firstname'];	
                $_SESSION['lname']=$r['lastname'];
                $_SESSION['address']=$r['address'];
              //  $_SESSION['phone']=$r['phone'];
                $_SESSION['email']=$r['email'];
                $_SESSION['image'] = $r['image'];
            }
        header('Location:index.php');
      echo $_SESSION['uid'];

        } else {
            $error =  '<div class=" btn-danger"> wrong username or password!!!</div>';
        }
    } 
    
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>


<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                   
                    <h4 class="card-title mt-2">Sign up</h4>
                </header>
                <article class="card-body">
                    <?php 
                    if(isset($_SESSION['error']))
                    {
                        $e = $_SESSION['error'];
                        echo $e;
                        $_SESSION['error']  = '';
                    }

                        if(!empty($error))
                        {
                            echo $error;
                            $error= '';
                        }
                        if(!empty($success))
                        {
                            echo $success;
                            $success = '';
                        }
                    ?>
                    <form action="login.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email address *</label>
                            <input type="email" required name="email" class="form-control" placeholder="">
                            <!-- <small class="form-text text-muted"></small> -->
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label> password *</label>
                            <input class="form-control" name="password" pattern="(?=.*\d).{8,}" required type="password">
                        </div>
                        <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Login </button>
                        </div> <!-- form-group// -->
                        <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy.</small>
                    </form>
                </article> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


</div>
<!--container end.//-->