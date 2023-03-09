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

<!-- <?php

    $CSVfp = fopen("menuForPhp.csv", "r");
    if ($CSVfp !== FALSE) {

        echo "<table>";

        // HEADER
        echo "<tr>";
        $data = fgetcsv($CSVfp, 1000, ",");
        echo "<th>".$data[0]."</th><th>".$data[1]."</th><th>".$data[2]."</th><th>".$data[3]."</th>";
        echo "</tr>";

        while(! feof($CSVfp)) {
            echo "<tr>";
            $data = fgetcsv($CSVfp, 1000, ",");
            echo "<td>".$data[0]."</td><td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td>";
            echo "</tr>";
        }

        echo "</table>";

    }
    fclose($CSVfp);
    
?> -->

<?php

    $CSVfp = fopen("menuForPhp.csv", "r");
    if ($CSVfp !== FALSE) {

        $data_header = fgetcsv($CSVfp, 1000, ",");

        while(! feof($CSVfp)) {
            $data = fgetcsv($CSVfp, 1000, ",");
            $prod_name[$data[0]] = $data[1];
            $prod_type[$data[0]] = $data[2];
            $prod_cost[$data[0]] = $data[3];
        }

    }
    fclose($CSVfp);

    $prod_name_asort = $prod_name;
    asort($prod_name_asort);
    // $prod_type_asort = $prod_type;
    // asort($prod_type_asort);
    // $prod_cost_asort = $prod_cost;
    // asort($prod_cost_asort);

    echo "<table>";

    echo "<tr>";
    foreach($data_header as $key=>$value) {
        echo "<th>".$value."</th>";
    }
    echo "</tr>";

    
    foreach($prod_name_asort as $key=>$value) {
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "<td>".$prod_type[$key]."</td>";
        echo "<td>".$prod_cost[$key]."</td>";
        echo "</tr>";
    }

    echo "</table>";
    
?>

</body>
</html>