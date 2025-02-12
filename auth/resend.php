<?php

include '../conect.php';


$email = filterRequest("email");
$veryfiycode = rand(10000 , 99999);
$data = array(
    "users_verfiycode" => $veryfiycode
);

updateData('users', $data , "users_email = '$email'");
sendEmailRemoteServer($email, "veryfiy code Ecommerce","your veryfiy code is : $veryfiycode");
