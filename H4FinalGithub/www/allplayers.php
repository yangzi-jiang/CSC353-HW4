
<html>
<head>
<!-- <link href="css/addons/datatables.min.css" rel="stylesheet"> -->
<!-- <script type="text/javascript" src="js/addons/datatables.min.js"></script> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/css/mdb.min.css" />
<link href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/extensions/export/bootstrap-table-export.min.js"></script>


<meta name="description" content="Bootstrap.">
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<title> All Players Webpage  </title>
</head>

<h1> All Players Webpage </h1>
<h2> Filter By Players Name </h2>

<body>

<table id = "myTable" class="table table-striped table-bordered table-sm" data-pagination="true">

  <thead>
    <tr>
      <th data-field="name" data-sortable="true">Name</th>
      <th data-field="country" data-sortable="true">Country</th>
      <th data-field="height" data-sortable="true">Height</th>
      <th data-field="hand" data-sortable="true">Hand</th>
    </tr>
  </thead>
  <tbody>
    <?php
    require 'vendor/autoload.php'; // include Composer's autoloader


    $conn = new MongoDB\Client('mongodb://localhost');

    $db = $conn->tennis_database;
    $collection = $db->player_collection;

    $cursor = $collection->find();

    $tuple_count = 0;

    foreach ($cursor as $row) {
        $tuple_count++;
        // echo "<p> You have the player with name:  $row[name] from $row[ioc]. 
        // They are $row[ht] tall and play with their $row[hand] hand.";
    
      echo '<tr>';
      echo '<td>'. $row['name'],'</td>';
      echo '<td>'. $row['ioc'],'</td>';
      echo '<td>'. $row['ht'],'</td>';
      echo '<td>'. $row['hand'],'</td>';
      echo '</tr>';
    }
    "<p> There are $tuple_count players in the database";
  ?>
</table>

</body>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>
</html>
