<?php

include '../conect.php';

$userId = filterRequest("userid");

$data =  getAllData("cartview", "cart_userid= $userId", null, false);

$stmt = $conn->prepare("SELECT SUM(itemsprice) as totalprice ,count(countitems) as totalcount FROM `cartview`
WHERE cartview.cart_userid = $userId
GROUP BY cart_userid");
$stmt->execute();

$datacountprice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array("status" => "success", "data" => $data, "countprice" => $datacountprice));
