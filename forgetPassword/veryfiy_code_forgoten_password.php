<?php
include '../conect.php';

$email = filterRequest("email");
$veryfiyCode = filterRequest("veryfiycode");

$stmt = $conn->prepare("SELECT * FROM users where users_email = '$email' AND users_verfiycode ='$veryfiyCode'");
$stmt->execute();
$count = $stmt->rowCount();
result($count);

?>