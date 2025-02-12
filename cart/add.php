<?php

include '../conect.php';

$userId = filterRequest("userid");
$itemId = filterRequest("itemid");

$count = getData("cart", "cart_userid = $userId AND cart_itemid = $itemId", null, false);

$data = array(
    "cart_userid" => $userId,
    "cart_itemid" => $itemId,
);
insertData('cart', $data);

