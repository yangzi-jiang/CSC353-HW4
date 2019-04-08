<link href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-pagination="true"
  data-search="true"
  data-url="json/data1.json">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="name">Item Name</th>
      <th data-field="price">Item Price</th>
    </tr>
  </thead>
</table>

<?php
    require 'vendor/autoload.php'; // include Composer's autoloader


    $conn = new MongoDB\Client('mongodb://localhost');
?>