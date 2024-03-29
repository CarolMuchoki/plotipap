<?php include('include/header.php');
include_once "include/config.php"; 
if(!isset($_GET['property'])){
  die("Error");
}
$propertyId = $_GET['property'];
$db = new Database;
$data = mysqli_query($db->getConnection(),"
  SELECT A.*, B.property, C.description,C.additional_info, C.id FROM units A LEFT JOIN sections B ON B.id=A.section LEFT JOIN properties C ON C.id = B.property  WHERE C.Id = $propertyId");

$coverImage = mysqli_query($db->getConnection(),"SELECT * FROM photos WHERE isCover = 1 AND property = $propertyId");
$otherImages = mysqli_query($db->getConnection(),"SELECT * FROM photos WHERE property = $propertyId");

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

<body>

  
  
  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">
        <?php
        if ($info = mysqli_fetch_assoc($data)){
             $addInfo= $info['additional_info'];


          ?>
        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <?php if($img = mysqli_fetch_assoc($coverImage)) {
             $imagePath = $img['path']; ?>
          <img src="<?=$imagePath?>" class="img-fluid" alt="">
        <?php } ?>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">Check Status</span>
              </a>
             
              </div>

            <p class="lead">
              <span><?=$info['cost'];?></span>
            </p>

            <p class="lead font-weight-bold"><?=$info['description'];?></p>

        

            <form class="d-flex justify-content-left" method="post" action="unit.php">
              <!-- Default input -->
             <input type="hidden"
            name="id"
            value="0">
			  <div class = "button-wrapper">
      			  <a button class="btn btn-primary btn-md my-0 p" type="submit" href = "unit.php?id=<?=$propertyId?>" >View Sections		 
				   </a>
				   </div>
			

            </form>

          </div>
          <!--Content-->

        </div>

    <?php } if(mysqli_num_rows($data) == 0){ ?>
      <h1>Not Found !</h1>
    <?php }  ?>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
       
        <div class="col-md-6 text-center">
         

          <h4 class="my-4 h4">Additional information</h4>

          <p><?=$addInfo;?></p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

  <?php while ($img=mysqli_fetch_assoc($otherImages)){
        $pic = $img['path'];
     
       ?>
        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4">


          <img src="<?= $pic?>" height="233.33px" width="350px" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
       
        <!--Grid column-->
<?php } ?>
      </div>
      <!--Grid row-->
 
    </div>
  </main>
  <!--Main layout-->
  
  <?php include ('include/footer.php');?>

    <!--/.Footer-->

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
