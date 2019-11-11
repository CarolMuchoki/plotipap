
<?php
include ('include/config.php');

 session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  $db=new Database;
/*  $result= mysqli_query($db->getConnection(), "SELECT username From users where username=$id");*/
  //$result=mysqli_query($db,$query);
$total = 0;
if( !isset($_SESSION['total']) || $_SESSION['total'] == 0 ){
  $_SESSION['total'] = $_POST['total'];
}
$total = $_SESSION['total'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

  <!--Main layout-->
  <main class=" pt-2">
            
                
                <h2 style ="text-align: center;"><?php  if (isset($_SESSION['username'])) : ?>
      <h2 style ="margin-left: 205px">Welcome <strong><?php echo $_SESSION['username']; ?> Your total amount is</strong></h2>

                <div class="col-lg-4 col-md-6">

                  <h3 style="text-align: right;">Amount: <?=Database::formatCurrency($total)?></h3>
 
                  </div>
              <hr>


<?php

if (isset($_POST['submit'])){
  /*header("location:payment.php");*/
}
?>
  </main>
  <!--Main layout-->
   <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    
      <button> <a href="index.php?logout='1'" style="color: red;">logout</a> </button>
    <?php endif ?> 

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
