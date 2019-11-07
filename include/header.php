<?php
    include_once "config.php";
    $database = new Database;
    $query = 
    mysqli_query($database->getConnection(),"SELECT name FROM properties GROUP BY name");
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PDTWJ3Z');</script>
    <!-- End Google Tag Manager -->
    <title> Plotipap Investments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/magnific-popup.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.selectBox.css">
    <link type="text/css" rel="stylesheet" href="assets/css/dropzone.css">
    <link type="text/css" rel="stylesheet" href="assets/css/rangeslider.css">
    <link type="text/css" rel="stylesheet" href="assets/css/animate.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/leaflet.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/css/map.css">
    <link rel= "stylesheet" href="assets/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="assets/css/skins/default.css">

    <style>
        .navbar{
            background-color: #56a48b;   

        }
        li>a{
            color: white !important;
        }
        li>a:hover{
            color: black !important;
        }
    </style>
</head>
<body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDTWJ3Z"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) 
<div class="page_loader"></div>
-->
<!-- main header start -->
<header class="main-header sticky-header" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar fixed-top navbar-expand-lg navbar-white scrolling-navbar">
                    <a class="navbar-brand logo navbar-brand d-flex w-50 mr-auto" href="index.php">
                        <img src="assets/images/black-logo" alt="">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                     <ul class="nav nav-tabs mt-3">
        <li class="nav-item text-white">
            <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown text-white">
            <a href="properties.php" class="nav-link">Properties</a>
     
        </li>
        <li class="nav-item dropdown text-white">
            <a href="about.php" class="nav-link dropdown-toggle" data-toggle="dropdown">About Us</a>
            <div class="dropdown-menu">
                <a href="about.php" class="dropdown-item">Who We are</a>
                <a href="#" class="dropdown-item">Why Us</a>
                <a href="#" class="dropdown-item">Our agents</a>
                
                </div>
            </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Contact Us</a>
                <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Ruiru Branch</a>
                <a href="#" class="dropdown-item">Nairobi CBD</a>
           
                </div> 
                 </li>
                 <li>
                     <input type="text" class="form-control" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">

                 </li>
             </ul>

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- main header end -->
