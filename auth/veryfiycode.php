<?php
include '../conect.php';

$email = filterRequest("email");

$veryfiy = filterRequest("veryfiycode");

$stmt = $conn->prepare("SELECT * FROM users where users_email = '$email' AND users_verfiycode ='$veryfiy'");
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array("users_approve" => "1" );
    updateData('users',$data ,"users_email = '$email'",);
}else {
    printFailure('Verify Code not Correct');
}

?>