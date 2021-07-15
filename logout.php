<?php
session_start();

$_SESSION['id']= '';
$_SESSION['fname']='';	
$_SESSION['lname']='';
$_SESSION['address']='';
              //  $_SESSION['phone']=$r['phone'];
$_SESSION['email']='';
$_SESSION['image'] = '';
session_destroy();
header('location:index.php');



?>