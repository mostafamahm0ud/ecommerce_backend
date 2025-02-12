<?php

include '../conect.php';

$userId = filterRequest("userid");
$itemId = filterRequest("itemid");

$data = array(
    "cart_usersid" => $userId,
    "cart_itemsid" => $itemId,
);
deleteData('cart', "cart_id=(SELECT cart_id FROM cart WHERE cart_userid = $userId AND cart_itemid = $itemId LIMIT 1)");
