<?php

include '../conect.php';

$userId = filterRequest("userid");
$itemId = filterRequest("itemid");


deleteData('favorite', "favorite_usersid = $userId AND favorite_itemsid = $itemId");



