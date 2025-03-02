<?php

include '../conect.php';

$table = "address";

$addressId = filterRequest("addressid");
$name = filterRequest("name");
$city = filterRequest("city");
$street = filterRequest("street");
$lang = filterRequest("lang");
$lat = filterRequest("lat");


$data = array(
    "address_city" => $city,
    "address_name" => $name,
    "address_street" => $street,
    "address_lat" => $lang,
    "address_long" => $lat,
);
updateData($table, $data, "address_id = $addressId");
