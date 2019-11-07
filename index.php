<?php 
include_once "include/header.php";
include_once "include/config.php";
$db = new Database;
$sql = mysqli_query($db->getConnection(),"SELECT pr.*,ph.path,ph.isCover FROM `properties` as pr inner join photos as ph on pr.id = ph.property GROUP BY id ORDER BY id ASC ");
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
  <style>
    .carousel-item .view img{
      max-height:400px !important;
          }
    .carousel-caption{
      text
    }
    .card-img-top{
      max-height:300px !important;
    }
    .overlay{
      max-height:200px !important;
    }
    .w-container{
      text-size: 10px;
    }
  </style>
</head>

<body>

    <!--Main layout-->
  <main class="pt-2">
    <div class="container">

      <!--Carousel Wrapper-->
<!--Carousel Wrapper-->
<div id="carousel" style="max-height:500px;margin-top:78px" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#property-1" data-slide-to="0" class="active"></li>
    <li data-target="#property-2" data-slide-to="1"></li>
    <li data-target="#property-3" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="http://localhost/plotipap/assets/images/property-2.jpg"
          alt="First slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">
          Juja Farm Heights. Prime plots going at 650,000</h3>
          <a href="properties.php" class="btn btn-outline-white btn-lg">Read More
                   </a>
      
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="http://localhost/plotipap/assets/images/property-1.jpg"
          alt="Kitengela">
                <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Kitengela, prime plots at 1m only hurry for a good deal!</h3>
        <a href="properties.php" class="btn btn-outline-white btn-lg">Read More
                   </a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="http://localhost/plotipap/assets/images/property-5.jpg"
          alt="Kamulu">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Kamulu plots at 900,000 each</h3>
        <a href="properties.php" class="btn btn-outline-white btn-lg">Read More
                   </a>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#Juja Farm" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#Kitengela" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<!--/.Carousel Wrapper-->
  
	
	  <div class="w3-container">
			<p>
            <strong>Your Trustworthy dealer in real estate. Lands are available from all over the country.
                  Find your dream properties. All lands have ready title deeds. Buy any of our lands at discounted prices. We sell plots and land all over kenya. All our properties are genuine and have Title deeds. We source land near upcoming government and privates sector projects.</strong>
          </p>
			</div>
      <!--Section: Jumbotron-->

      <hr class="my-5">

      <!--Section: Cards-->
      <section class="text-center">
        <div class="w3-container">
          <p><strong>Recent and Latest Properties </strong></p>
        </div>

        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

    <?php while($row = mysqli_fetch_assoc($sql)) {
      $imagePath = $row['path'];
      $id = $row['id'];
     ?>
          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card" >

                <!--Card image-->
                <div class="view overlay">
                 
                   <img src="<?=$imagePath?>" alt="No Image " class="card-img-top">
  				          <a href="product.php?property=<?=$id?>">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                
                </div>

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title"><?=$row['name'];?></h4>
  				        <a href="product.php?property=<?=$id?>">
                  <!--Text-->
                                <p class="card-text">
                    <strong><?=$row['description'];?></strong>
                  </p>
  				          </a>
              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->
    <?php }  ?>
          <!--Grid column-->
          

        </div>
        <!--Grid row-->

        <!--Pagination-->
        <nav class="d-flex justify-content-center wow fadeIn">
          <ul class="pagination pg-blue">

            <!--Arrow left-->
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>

            <li class="page-item active">
              <a class="page-link" href="#">1
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>

      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
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
