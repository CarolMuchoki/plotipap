<html>
<head>
<title>Plotipap Lands for sale</title>
<link rel="stylesheet" href="css/w3.css">
</head>
<body>
<center>
<div class="w3-panel w3-pink">
  <h1 class="w3-opacity">
</div>
<?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "propertymanager";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from properties where name LIKE '%$search%' OR price LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display search result

         if (!$query->rowCount() == 0) {
                echo "Search found :<br/>";
                echo "<table class='w3-table-all'>";    
                echo "<tr class='w3-red'><td>Employee name</td><td>Email</td><td>Company</td></tr>";                
            while ($results = $query->fetch()) {
                echo "<tr><td>";            
                echo $results['name'];
                echo "</td><td>";
                echo $results['price'];
                echo "</td><td>";             
            }
                echo "</table>";        
        } else {
            echo 'No results found!';
        }
?>
</div>
</body>
</html>