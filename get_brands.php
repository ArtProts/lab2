<!DOCTYPE html>
<html>
<head>
    <title>Car brand</title>
</head>
<body>
    <?php
        include "conn.php";  
        $result = "<table border=`1`><tr><th>Car brand at this rental office</th></tr>";
            
        $cursor = $car_rental_available->find([]);  

        foreach($cursor as $row){
            $car_brand = $row['car_brand'];
            $result .= "<tr><td>$car_brand</td></tr>" ;
        }
        $result = $result."</table>";
        echo $result;
        echo "<script> localStorage.setItem('car_brand', '$result'); </script>"
        ?>
    </table>
</body>
</html>