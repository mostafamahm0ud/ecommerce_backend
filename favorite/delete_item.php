<?php

include '../conect.php';

$favoriteId = filterRequest("id");

deleteData('favorite', "favorite_id = $favoriteId");