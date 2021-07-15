<?php
include_once 'include/header.php';
include_once 'include/sidebar.php';
include_once 'include/navbar.php';
include_once '../config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(!isset($_GET['id']))
    {
        header('location:index.php');
    }
    else
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM PRODUCT where id = $id";
        $ack = mysqli_query($conn, $sql);
        if ($ack) {
            $success = 'Product  removed  successfully!!!';
        } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
        }

        if ($error != '') {
            echo $error;
            $error = '';
        }
        if ($success != '') {
            echo $success.'<a  href="product.php" class="btn btn-primary">Go back >>></a>';
            $success = '';
        }

    }
}




?>