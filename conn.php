<?php
// phpinfo();
require_once __DIR__ ."/vendor/autoload.php";

$client = new MongoDB\Client;

$car_rental_available = $client->car_rental->available_vehicles;
$car_rental_office = $client->car_rental->rent_office;