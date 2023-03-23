<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/headfoot.css">
    <link rel="stylesheet" href="css/general.css">
    <title>expresso - view</title>
</head>
<body>
    <?php
    
        include 'html/header.html';

    ?>

    <form action="items_available.php" method="post">
        Search: <input type="text" name="search_txt">
        <input type="submit">
    </form>
    
    <?php        
        require_once 'php/connect.php';
        if (isset($_POST['search_txt'])){
            $search = $_POST['search_txt'];
        
            $query  = "SELECT * FROM items_available where LOWER(PROD_KEY) like '%$search%' OR LOWER(PROD_NAME) like '%$search%' OR LOWER(PROD_TYPE) like '%$search%' OR LOWER(PROD_COST) like '%$search%'";
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
        } else {
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
        }
    ?>

</body>
</html>
