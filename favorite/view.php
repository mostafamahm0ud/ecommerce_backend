<?php

include '../conect.php';

$userId = filterRequest("userid");


getAllData("myfavorite", "favorite_usersid = ?", array($userId));