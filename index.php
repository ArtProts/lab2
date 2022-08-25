<!DOCTYPE HTML>
<html>
<head>
    <title>LAB2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <form method="GET" action="get_brands.php">
        <p>Get car brands at this rental office
        <input type="submit" value="Get cars brands"/>
        <input type="button" value="Get cars brands from storage" id="get_brands" onclick="get_brands_()"> 
    </form>

    <form method="GET" action="less_mileage.php">
        <p>Get cars with less mileage than
        <input name="less_mileage"  type="number" value="0" id="less_mileage"/>
        <input type="submit" value="Get cars" />
        <input type="button" value="Get cars from storage"  onclick="less_mileage_()">
    </form>

    <form method="GET" action="profit.php" >
        <p>Select date to get profit
        <input name="date_profit" type=date id="profit">
        <input  type="submit" value="Get profit"/>
        <input type="button" value="Get profit from storage"  onclick="profit_()">
    </form>
</div>
    
<script>
function get_brands_() {
    let value  = localStorage.getItem('car_brand');
    document.getElementById('storage_table').innerHTML = value ;
}
function less_mileage_(){
    let key = document.getElementById("less_mileage").value; 
    let value  = localStorage.getItem(key);
    document.getElementById('storage_table').innerHTML = value ;
}
function profit_() {
    let key = document.getElementById("profit").value;
    let value  = localStorage.getItem(key);
    document.getElementById('storage_table').innerHTML = value ;
}
</script>
<div id="storage_table"></div>
</body>

</html>