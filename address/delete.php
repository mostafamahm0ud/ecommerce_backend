<?php

include '../conect.php';

$addressId = filterRequest("addressid");

deleteData('address', "address_id = $addressId");