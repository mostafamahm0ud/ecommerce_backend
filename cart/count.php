<?php

include '../conect.php';

$userId = filterRequest("userid");
$itemId = filterRequest("itemid");

$stmt = $conn->prepare("SELECT COUNT(cart.cart_id) as count FROM cart WHERE cart_userid = $userId AND cart_itemid = $itemId");
$stmt->execute();

$count = $stmt->rowCount();

$data = $stmt->fetchColumn();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure", "data" => "0"));
}
