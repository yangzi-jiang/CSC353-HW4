<html>
<title> Your player webpage  </title>
<body>

<hr>
Welcome. You searched for players with name:  <?php echo $_GET["player"]; ?><br>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$input_search = $_GET["player"];

$collection = $db->player_collection;

$cursor = $collection->find(['name' => $input_search]);
	 	
$tuple_count = 0;
foreach ($cursor as $row) { 
  $tuple_count++;
  echo "<p> You have the player with name:  $row[name] from $row[ioc]. 
  They are $row[ht] tall and play with their $row[hand] hand.";
}

echo "<p> There are $tuple_count players with this search specification";

?>
</body>
</html>