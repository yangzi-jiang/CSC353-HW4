
<html>
<title> Your match webpage  </title>
<body>
<hr>
Welcome. You searched for matches with name:  <?php echo $_GET["tourney_name"]; ?><br>
<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$input_search = $_GET["tourney_name"];

$collection = $db->match_collection;

$cursor = $collection->find(['tourney_name' => $input_search]);

$tuple_count = 0;
foreach ($cursor as $row) { 
  // if ($row['tourney_name'] == $input_search){
    $tuple_count++;
    echo "<p> You have match number $row[match_num] from tournament $row[tourney_name] with score $row[score].";

    echo 'The winner of the match was <a href="playerInfo.php?player='. $row['winner_name'] . '">' . $row['winner_name'] . '</a>';
    // echo "<form action='' method='get'>
    //       <input type='hidden' name='player' value='.$row[loser_name].'> 
    //       </form>";
    echo " ";
    $playerInfo = $row['loser_name'];
    echo 'The loser of the match was <a method="get" href="playerInfo.php?player=' . $playerInfo . '">' . $playerInfo . '</a>';
  // }
}

echo "<p> There are $tuple_count matches with this search specification";

?>
</body>
</html>