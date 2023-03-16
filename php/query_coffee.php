<?php // query_books.php
  require_once 'connect.php';

  $query  = "SELECT * FROM items_available";
  $result = $pdo->query($query); //$result is pointing to the first result in the query
  //fetch each row per loop

  echo "<table>";

  echo "<tr>";
  echo "<th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Cost</th>";
  echo "</tr>";

  while ($row = $result->fetch())
  {
    echo "<tr>";
    echo "<td>".($row['PROD_KEY'])."</td><td>".($row['PROD_NAME'])."</td><td>".($row['PROD_TYPE'])."</td><td>".($row['PROD_COST'])."</td>";
    echo "</tr>";
  }
?>
