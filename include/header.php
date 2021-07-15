<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hamro online Mall - buy every thing in one stall</title>

  <!-- Bootstrap core CSS -->
  <link href="assest/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assest/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">E-Mall</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">My Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="track.php">Track my order</a>
          </li>
            <?php
            //echo $_SESSION['id'];
            if (isset($_SESSION['id']))
              {
                echo' <br> <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php">'.$_SESSION['fname'].' '. $_SESSION['lname'].'</a>
                  
                </li>';
              }
              else
              {
                echo' <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
                </li>';
              }
            ?> 
          <li>

          </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>