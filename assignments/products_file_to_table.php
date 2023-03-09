<html>
<body>
    <form action="products_file_to_table.php" method="post">
        Search: <input type="text" name="search_txt">
        <input type="submit">
    </form>
    
    <?php   
            $search = $_POST['search_txt'];
            $CSVfp = fopen("menuForPHP.csv", "r");
            if ($CSVfp !== FALSE) {
                echo "<div>";
                echo "<table border=\"1\">";
                echo "<thead>";
                echo "<tr>";
                // read the first row, that is, header
                $data = fgetcsv($CSVfp, 1000, ",");
                echo "<th>".$data[0]."</th>";
                echo "<th>".$data[1]."</th>";
                echo "<th>".$data[2]."</th>";
                echo "</tr>";
                echo "</thead>";

                while (! feof($CSVfp)) {
                    // read second row onwards
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
                            echo "<tr><td>".$data[0]."</td><td>".$data[1]."</td><td>".$data[2]."</td></tr>";
                        }
                    }
                }
                echo "</table>"; echo "</div>";
                fclose($CSVfp);
            }
    ?>
</body>
</html>