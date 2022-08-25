<!DOCTYPE html>
<html>
<head>
    <title>Less than * mileage</title>
</head>
<body>
<?php 
    include "conn.php";  
    $less_mileage = $_GET['less_mileage'];
    $result= "<table border=`1`><tr><th>Car brand</th><th>Release year</th><th>Mileage</th><th>Condition avto</th></tr>";
    
    $cursor = $car_rental_available->find([]);
              
    foreach($cursor as $row){
        $car_brand = $row['car_brand'];
        $mileage = $row['mileage'];
        $condition_avto = $row['condition'];
        $release_year = $row['release_year'];

        if ($row["mileage"] < $less_mileage){
           
            $result .="<tr><th>$car_brand</th><th>$release_year</th><th>$mileage</th><th>$condition_avto</th></tr>";
        }
    }
    $result = $result."</table>";
    echo $result;
    echo "<script> localStorage.setItem('$less_mileage', '$result'); </script>"
?>

</body>
</html>