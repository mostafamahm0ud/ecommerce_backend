<?php
$servername = "mysql:host=localhost;dbname=e-commerce";
$user = "root";
$password = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", 
    // Utf-8 is for Arabic characters
);

try {
    $conn = new PDO($servername, $user, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
    header("Content-Type: application/json");
    include "function.php";

    // if (isset($notAut)) {
    //     checkAuthenticate() ; 
    // }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
