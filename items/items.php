<?php

include '../conect.php';
$allData['status'] = 'success';
$category_id =  filterRequest("categoryid");
// $items =  getAllData('items', "items_categories = $category_id");
$userId = filterRequest("userid");
$stmt = $conn->prepare("SELECT itemsview.* , 1 AS favorite FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userId
WHERE items_categories = $category_id
UNION ALL 
SELECT * , 0 AS favorite FROM itemsview
WHERE items_categories = $category_id AND items_id NOT IN (SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemsid = itemsview.items_id AND favorite.favorite_usersid = $userId)");

$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $items));
} else {
    echo json_encode(array("status" => "failure"));
}
