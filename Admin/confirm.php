<?php

if(!isset($_SESSION['id']))
{
    header('location:index.php');
}
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
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(!isset($_GET['id']) || empty($_GET['id']))
    {
        header('Location: product.php');
    }
    else
    {
        $id = $_GET['id'];

    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $q = "UPDATE sales set status=1 where id = $id";
    $ack = mysqli_query($conn, $q);
        if ($ack) {
           // $success = 'User added successfully!!!';
            header('Location: sell.php');
        } else {
            $error =  "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
