<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assignment.css">
    <title>assignment 7</title>
</head>
<body>

    <form action="assignment7.php" method="post">
        Search: <input type="text" name="search_txt">
        <input type="submit">
    </form>
    
    <?php   
            if (isset($_POST['search_txt'])) {
                $search = $_POST['search_txt'];
                if ($search === null)
                    $search = "";
                $CSVfp = fopen("menuForPHP.csv", "r");
                if ($CSVfp !== FALSE) {

                    echo "<table>";

                    // HEADER
                    echo "<thead><tr>";
                    $data = fgetcsv($CSVfp, 1000, ",");
                    echo "<th>".$data[0]."</th><th>".$data[1]."</th><th>".$data[2]."</th><th>".$data[3]."</th>";
                    echo "</tr></thead>";
    
                    while (! feof($CSVfp)) {

                        // REST
                        $data = fgetcsv($CSVfp, 1000, ",");

                        //convert all strings to lower
                        $search_lower=strtolower($search);            

                        //search the search string in product id or prod name
                        if (! empty($data)){
                            $prd_id = $data[0];
                            $prd_name=$data[1];
                            //convert the strings to lowercase
                            $prod_id_lower=strtolower($prd_id);
                            $prod_name_lower=strtolower($prd_name);
                            if (str_contains($prod_name_lower, $search_lower) || str_contains($prod_id_lower, $search_lower) ) {
                                echo "<tr><td>".$data[0]."</td><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td></tr>";
                            }
                        }

                    }

                    echo "</table>";
                }
            } else {

                $CSVfp = fopen("menuForPhp.csv", "r");
                if ($CSVfp !== FALSE) {

                    echo "<table>";

                    // HEADER
                    echo "<thead><tr>";
                    $data = fgetcsv($CSVfp, 1000, ",");
                    echo "<th>".$data[0]."</th><th>".$data[1]."</th><th>".$data[2]."</th><th>".$data[3]."</th>";
                    echo "</tr></thead>";

                    while(! feof($CSVfp)) {
                        echo "<tr>";
                        $data = fgetcsv($CSVfp, 1000, ",");
                        echo "<td>".$data[0]."</td><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    
                }
            }
            
            fclose($CSVfp);
    ?>

</body>
</html>