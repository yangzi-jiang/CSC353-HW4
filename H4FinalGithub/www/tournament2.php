

<html>
<title> My tournament webpage  </title>
<body>
<hr>
Welcome. You searched for tournaments with name:  <?php echo $_GET["tourney_name"]; ?><br>

<?php
require 'vendor/autoload.php'; // include Composer's autoloader
$input_search = $_GET["tourney_name"];

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$collection = $db->tournament_collection;

$cursor = $collection->find(['tourney_name' => $input_search]);

$tuple_count = 0;
foreach ($cursor as $row) { 
  $tuple_count++;
  echo "<p> You have the tournament $row[tourney_name] from $row[tourney_date] with surface $row[surface]";
}

echo "<p> There are $tuple_count tournaments with this search specification";


?>
</body>
</html>
