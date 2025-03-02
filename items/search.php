<?php

include '../conect.php';

$search = filterRequest("search");
$userId = filterRequest("userid");

// Define the WHERE clause for the search
$where = "items_name LIKE :search OR items_name_ar LIKE :search";

// Define the parameterized values for the search
$values = array(":search" => "%$search%");

// Call the getAllData function to fetch the results
$result = getAllData("itemsview", $where, $values, false);

// If data is found, add favorite status and discounted price
if ($result['status'] === 'success') {
    $items = $result['data'];

    // Fetch favorite items for the user
    $stmt = $conn->prepare("SELECT favorite_itemsid FROM favorite WHERE favorite_usersid = :userid");
    $stmt->bindParam(":userid", $userId, PDO::PARAM_INT);
    $stmt->execute();
    $favoriteItems = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Process each item to add favorite status and discounted price
    foreach ($items as &$item) {
        $item['favorite'] = in_array($item['items_id'], $favoriteItems) ? 1 : 0;
        $item['itempricediscount'] = $item['items_price'] - ($item['items_price'] * $item['items_discount'] / 100);
    }

    // Return the final result as JSON
    echo json_encode(array("status" => "success", "data" => $items));
} else {
    echo json_encode(array("status" => "failure"));
}