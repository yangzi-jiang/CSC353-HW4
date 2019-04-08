
<html>
<meta name="description" content="Bootstrap.">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<title> All Matches Webpage  </title>
<body>

<hr>
<h1>All Matches</h1>

<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$collection = $db->match_collection;

$cursor = $collection->find();
	 	
$tuple_count = 0;
foreach ($cursor as $row) { 
  // if ($row['tourney_name'] == $input_search){
    $tuple_count++;
    echo "<p> You have match number $row[match_num] from tournament $row[tourney_name]. 
    The score was $row[score]. The winner was $row[winner_name] and the loser was $row[loser_name]";
    // $name = $collection->find(['name'=>$row['name']])->toArray();

  // }
}

echo "<p> There are $tuple_count matches with this search specification";

?>
</body>
</html>