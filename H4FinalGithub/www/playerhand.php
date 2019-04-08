<html>
<title> Testing your connection </title>
<body>
<h1> My player webpage </h1>
<hr>
Welcome. You searched for players with dominent hand:  <?php echo $_GET["hand"]; ?><br>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$input_search = $_GET["hand"];

$collection = $db->player_collection;

$cursor = $collection->find(['hand' => $input_search]);
	 	
$tuple_count = 0;
foreach ($cursor as $row) { 
  if ($row['hand'] == $input_search){

    $tuple_count++;
	// Two ways to write the same thing. Note the single-quotes in the second form
    echo "<p> You have the player with dominent hand:  $row[hand] named $row[name]. 
    They are $row[ht] tall and from $row[ioc].";
  }
}

echo "<p> There are $tuple_count players with this search specification";


?>
</body>
</html>