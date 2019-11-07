
<?php
	include_once "config.php";
    $database = new Database;
	$query = 
	mysqli_query($database->getConnection(),"SELECT name FROM properties GROUP BY name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
  <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <select id='selUser' style='width: 200px; margin-bottom: 5px'>
	  <?php while($row = mysqli_fetch_assoc($query)) {?>
	 	 <option value='<?=$row['name']?>'><?=$row['name']?></option>
	  <?php } ?>
	 
	</select>

<br/>
<div id='result'></div>
<script>
    $(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();
  $("#selUser").on('change',function(){
  	console.log("selected");
  	window.location.href="location.php?location="+$("#selUser").val();
  });

 });
</script>
</body>




</html>