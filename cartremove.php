<?php
include_once 'include/header.php';
include_once 'config/config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: cart.php');
    } else {
        $id = $_GET['id'];
       
        // if(empty($id))
        // {
        //     header('Location:index.php');
        // }
        $uid = 1;
        $q = "DELETE from cart where id = $id";
        $ack = mysqli_query($conn, $q);
        if ($ack) {
            $success = 'User added successfully!!!';
            header('Location: cart.php');
        } else {
            $error =  "Error: ";
        }
    }
}
?>
