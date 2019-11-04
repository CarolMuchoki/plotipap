<html>
<head>
<title>Plotipap Lands for sale</title>
<link rel="stylesheet" href="css/w3.css">
</head>
<body>
<center>
<div class="w3-panel w3-pink">
  <h1 class="w3-opacity">
  <b>Search Functionality using php, MySQL</b></h1>
</div>
<?php 
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "phplogin";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("select * from employee where name LIKE '%$search%' OR company LIKE '%$search%'  LIMIT 0 , 10");
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
                echo $results['email'];
                echo "</td><td>";
                echo $results['company'];
                echo "</td></tr>";              
            }
                echo "</table>";        
        } else {
            echo 'No results found!';
        }
?>
<p>
  <div class="w3-container w3-blue">
  <h4 style="text-shadow:1px 1px 0 #444">A tutorial on <a href="https://technopoints.co.in" target="new">Technopoints</a></h4></p>
</div>
</body>
</html>