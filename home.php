<?php

include 'conect.php';

$allData = array();
$allData['status'] = 'success';
$categories =  getAllData('categories', null, null, false);
$items =  getAllData('itemsview', "items_discount != 0", null, false);

$allData['categories'] = $categories;
$allData['items'] = $items;

echo json_encode($allData);
?>
