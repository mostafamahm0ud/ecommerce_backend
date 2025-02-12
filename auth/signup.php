<?php

include '../conect.php';

$username = filterRequest("username");
$email = filterRequest("email");
$password = sha1($_POST["password"]);
$phone = filterRequest("phone");
$veryfiycode = rand(10000 , 99999);


$stmt = $conn ->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
$stmt ->execute(array($email , $phone));
$count = $stmt ->rowCount();
if ($count > 0) {
  printFailure("email or phone already exist");
} else {
   $data = array(
       "users_name" => $username,
       "users_email" => $email,
       "users_password" => $password,
       "users_phone" => $phone,
       "users_verfiycode" => $veryfiycode,
   );
    // sendEmailRemoteServer($email, "veryfiy code", "your veryfiy code is: $veryfiycode");
    insertData('users', $data);
}
?>
