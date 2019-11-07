<?php include_once('include/header.php');
      include_once "include/config.php";
$db = new Database;
$sql = mysqli_query($db->getConnection(),"SELECT pr.*,ph.path,ph.isCover FROM `properties` as pr inner join photos as ph on pr.id = ph.property ORDER BY id ASC");
  $location =  @$_GET['location'] ;
  
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
  <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
  <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">

  </style>
</head>

<body>

  
  <!--Main layout-->
  <main>
    <div class="container">


         <hr class="my-5">
         <?php include ('include/searching.php'); echo $location;?>

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

    <?php while($row = mysqli_fetch_assoc($sql)) {
      $imagePath = $row['path'];
     ?>
          <!--Grid column-->
          <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">

                <!--Card image-->
                <div class="view overlay">
                 
                   <img src="<?=$imagePath?>" alt="No Image " class="card-img-top">
                    <a href="properties.php">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                
                </div>

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h4 class="card-title"><?=$row['name'];?></h4>
                  <a href= "properties.php">
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
    <?php } ?>
          <!--Grid column-->
          

        </div>          <!--Grid column-->

         

      </section>
      <!--Section: Products v.3-->

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
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->

   <?php include ('include/footer.php');?>

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
  $(document).ready(function(){
 
  // Initialize select2
  //$("#selUser").select2();
  $("#selUser").on('change',function(){
    console.log("selected");
    window.location.href="properties.php?location="+$("#selUser").val();
  });

  // Read selected option
  $('#but_read').click(function(){
    var username = $('#selUser option:selected').text();
    var userid = $('#selUser').val();

    $('#result').html("id : " + userid + ", name : " + username);

  });
}); 
  </script>
</body>

</html>
