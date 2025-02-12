<?php

include '../conect.php';

$userId = filterRequest("userid");
$itemId = filterRequest("itemid");


$data = array(
    "favorite_usersid" => $userId,
    "favorite_itemsid" => $itemId,
);
insertData('favorite', $data);