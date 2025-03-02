<?php

include '../conect.php';

$userId = filterRequest("userid");

getAllData('address', "address_userid = $userId");
