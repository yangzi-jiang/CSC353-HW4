
<html>
<title> Welcome to Tennis Database Search Website</title>
<body>
<hr>
<h1>Tournament Search</h1>

<form action = "/alltourneys.php">
  <button type="submit">All Tounrneys</button>
  </button>
</form>

<p> Use the search field below to find tournaments. Please use the format: "Name"</p>
<form action="/tournament2.php" method="get">
  Tournament Name:<br>
  <input type="text" name="tourney_name" value="">
  <br><br>
  <input type="submit" value="Submit"> 
</form> 


<br>
<br>
<h1>Match Search</h1>
<!-- <form action = "/allmatches.php">
  <button type="submit">All Matches</button>
  </button>
</form> -->
<p> Use the search fields below to find matches based on tournament name. Use format "Name"</p>
<form action="/match.php" method="get">
  Tournament Name:<br>
  <input type="text" name="tourney_name" value="">
  <br><br>
  <input type="submit" value="Submit"> 
  
</form> 

<br>
<br>
<h1>Player Search</h1>

<form action = "/allplayers.php">
  <button type="submit">All Players</button>
  </button>
</form>

<p> Use the search fields below to find players based on player's attributes. 
  Please use the format "Firstname Lastname"</p>
<form action="/player.php" method="get">
  Player Name:<br>
  <input type="text" name="player" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 


<p> Please use the three-letter country abbreviation to search. Ex: "USA" "NED" "ITA"</p>
<form action="/playerioc.php" method="get">
  Player Country:<br>
  <input type="text" name="ioc" value="">
  <br><br>
  <input type="submit" value="Submit">
</form> 

<p> Please use "R" for right hand and "L" for left hand.</p>
<form action="/playerhand.php" method="get">
  Player Hand:<br>
  <input type="text" name="hand" value="">
  <br><br>
  <input type="submit" value="Submit">
  
</form>

<?php
require 'vendor/autoload.php'; // include Composer's autoloader

$conn = new MongoDB\Client('mongodb://localhost');

$db = $conn->tennis_database;

$tournaments = $db->tournament_collection;
$players = $db->player_collection;
$matches = $db->match_collection;

?>
</body>
</html>

