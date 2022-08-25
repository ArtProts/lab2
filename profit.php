<!DOCTYPE html>
<html>
<head>
    <title>Profit</title>
</head>

<body>
 <?php
    include('conn.php');
    $date_profit = $_GET["date_profit"];     
    $time= strtotime($date_profit);       
    $cursor = $car_rental_office->find([]);
                  
    $result= "<table border = `1`><tr><th>Car</th><th>Profit for $date_profit</th><th>Profit from the beginning of the lease to $date_profit </th></tr>";

    foreach($cursor as $row) {
            
          $time_all_sec = floatval($row['date_end'] - $row['date_start']);
          //echo  $time_all_sec . " ";
          $profit_this_day = $row['price_rent'] / $time_all_sec * 86400;

          if ($date_profit == $row['date_start']){
            $profit_this_day = $profit_this_day - ($row['date_start'] - strtotime("00:00:00")) * ($row['price_rent'] / $time_all_sec);
          }
          else if ($date_profit==$row['date_end']){
            $profit_this_day = $profit_this_day - ( 86400 - $row['date_end'] + strtotime("00:00:00")) * ($row['price_rent'] / $time_all_sec);
          }

      
          $before_slctd_date_sec = floatval(strtotime($date_profit) - $row['date_start']);
          $profit_before_this_day = $row['price_rent'] / $time_all_sec * $before_slctd_date_sec;
                    
          $result = $result."<tr><td>{$row['car_brand']}</td><td>$profit_this_day</td><td>$profit_before_this_day</td></tr>";
        }   
      
   

    if($result == ""){
      echo "NO CARS FOR RENT";
    }
    else{
      $result = $result."</table>";
         echo $result;
    }
  
    echo "<script> localStorage.setItem('$date_profit', '$result'); </script>";
  ?>
    
</body>
</html>