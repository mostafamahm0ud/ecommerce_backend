<?php

include '../conect.php';

$email = filterRequest("email");
$veryfiyCode = rand(10000 , 99999);


$stmt = $conn ->prepare("SELECT * FROM users WHERE users_email = ?");
$stmt ->execute(array($email));
$count = $stmt ->rowCount();

if ($count > 0) {

    $data = array(  
        "users_verfiycode" => $veryfiyCode,
    );
    updateData('users', $data , "users_email = '$email'");
    sendEmailRemoteServer($email, "veryfiy code Ecommerce","your veryfiy code is : $veryfiyCode");
}
