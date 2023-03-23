<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/headfoot.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/edit_db.css">
    <title>expresso - edit</title>
</head>
<body>
    
<?php
    
    include 'html/header.html';

?>

<div class="container">
    

<?php 
    require_once 'php/connect.php';   

    if (isset($_POST['reset'])){
        $product_id=""; $product_name="";$product_type="";$product_cost="";$records="";
    }

    if (!(isset($records))){
        $product_id=""; $product_name="";$product_type="";$product_cost="";$records="Waiting for instruction...";
    }

    function get_post($pdo, $var) {
        return $pdo->quote($_POST[$var]);
    }

    if (isset($_POST['search']) && (isset($_POST['product_type']) || isset($_POST['product_name'])))
    {
        $product_id   = get_post($pdo, 'product_id');        
        $product_name    = get_post($pdo, 'product_name');
        $product_type   = get_post($pdo, 'product_type');
        $product_cost   = get_post($pdo, 'product_cost');
        
        $query  = "SELECT * FROM items_available where PROD_KEY = $product_id or PROD_NAME =$product_name";
        $result = $pdo->query($query);

        if ($result->rowCount() == 1) {
            $records = "Returned search.";
        } else if ($result->rowCount() > 1) {
            $records = "More than one occurrence found.";
        } else {
            $records = "No results found.";
        }

        if ($row = $result->fetch()){        
            $product_id=$row['PROD_KEY'];
            $product_name=$row['PROD_NAME'];
            $product_cost=$row['PROD_COST'];
            $product_type=$row['PROD_TYPE'];
        }
    }

    if (isset($_POST['insert']) && (isset($_POST['product_type'])  && isset($_POST['product_name'])))
    {
        $product_id   = get_post($pdo, 'product_id');        
        $product_name    = get_post($pdo, 'product_name');
        $product_type   = get_post($pdo, 'product_type');
        $product_cost   = get_post($pdo, 'product_cost');
        
        $query  = "INSERT INTO items_available VALUES " . "($product_id, $product_name, $product_type, $product_cost)";
        $result = $pdo->query($query);

        if ($result->rowCount() == 1) {
            $records = "Insert success.";
        } else if ($result->rowCount() > 1) {
            $records = "More than one occurrence found.";
        } else {
            $records = "No results found.";
        }
    } 

    if (isset($_POST['update']) && (isset($_POST['product_id'])))
    {
        $product_id   = get_post($pdo, 'product_id');        
        $product_name    = get_post($pdo, 'product_name');
        $product_type   = get_post($pdo, 'product_type');
        $product_cost   = get_post($pdo, 'product_cost');     
        
        $query  = "UPDATE items_available SET PROD_NAME=$product_name, PROD_TYPE=$product_type, PROD_COST=$product_cost WHERE PROD_KEY=$product_id";
        $result = $pdo->query($query);

        if ($result->rowCount() == 1) {
            $records = "Update success.";
        } else if ($result->rowCount() > 1) {
            $records = "More than one occurrence found.";
        } else {
            $records = "No results found.";
        }
    }   

    if (isset($_POST['delete']) && (isset($_POST['product_id'])))
    {
        $product_id = get_post($pdo, 'product_id');        
        
        $query  = "DELETE FROM items_available WHERE PROD_KEY=$product_id";
        $result = $pdo->query($query);

        if ($result->rowCount() == 1) {
            $records = "Update success.";
        } else if ($result->rowCount() > 1) {
            $records = "More than one occurrence found.";
        } else {
            $records = "No results found.";
        }


    }  

    
    //
    echo <<<_END
    <form action='edit_database.php' method="post">
    <table class="edit">
    <tr>
       <th>Product ID</th>
       <td colspan='4'> <input type="text" class="textIn" name="product_id" value='$product_id'> </td>
    </tr>
    <tr>
       <th>Product Name</th>
       <td colspan='4'> <input type="text" class="textIn" name="product_name" value='$product_name'> </td>
    </tr>
    <tr>
       <th>Product Type</th>
       <td colspan='4'> <input type="text" class="textIn" name="product_type" value='$product_type'> </td>
    </tr>
    <tr>
       <th>Cost</th>
       <td colspan='4'> <input type="text" class="textIn" name="product_cost" value='$product_cost'> </td>
    </tr>
    <tr>
        <td colspan='5' style="text-align: center;"> $records </td>
    </tr>
    <tr>
        <td class="buttons">
        <input type="submit" name= "search" value="Search"> 
        </td>
       <td class="buttons">
       <input type="submit" name= "reset" value="Reset">
       </td>
       <td class="buttons">
       <input type="submit" name= "insert" value="Insert">
       </td>
       <td class="buttons">
       <input type="submit" name= "delete" value="Delete">
       </td>
       <td class="buttons">
       <input type="submit" name= "update" value="Update">
       </td>
    </tr>
    <table>
    </form>
  _END;
?>

</div>


</body>
</html>