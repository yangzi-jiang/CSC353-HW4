<html>
<head>
<meta name="description" content="Bootstrap.">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script><title> All Tournaments Webpage  </title>
</head>
<body>
<hr>
<h1>All Tourneys</h1>

<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$collection = $db->tournament_collection;

$cursor = $collection->find();

$tuple_count = 0;

foreach ($cursor as $row) { 
  $tuple_count++;
  echo "<p> You have the tournament $row[tourney_name] from $row[tourney_date] with surface $row[surface]";
}

echo "<p> There are $tuple_count tournaments with this search specification";

?>
</body>

<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>

</html>
