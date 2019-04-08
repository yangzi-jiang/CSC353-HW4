<html>
<title> Testing your connection </title>
<body>
<h1> My player webpage </h1>
<hr>
Welcome. You searched for players with country:  <?php echo $_GET["ioc"]; ?><br>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$input_search = $_GET["ioc"];

$collection = $db->player_collection;

$cursor = $collection->find(['ioc' => $input_search]);
	 	
$tuple_count = 0;
foreach ($cursor as $row) { 
  $tuple_count++;
  // Two ways to write the same thing. Note the single-quotes in the second form
  echo "<p> You have the player with country:  $row[ioc] named $row[name]. 
  They are $row[ht] tall and play with their $row[hand] hand.";
}

echo "<p> There are $tuple_count players with this search specification";


?>
</body>
</html>