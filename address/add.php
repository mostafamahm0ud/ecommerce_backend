<?php

include '../conect.php';

$table = "address";
$userId = filterRequest("userid");
$name = filterRequest("name");
$city = filterRequest("city");
$street = filterRequest("street");
$lang = filterRequest("lang");
$lat = filterRequest("lat");


$data = array(
    "address_userid" => $userId,
    "address_name" => $name,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lang,
    "address_long" => $lat,
);
insertData($table, $data);
