<?php    
error_reporting(0);    
session_start();

$servername = "localhost";
$username = "aderlin_admin";
$password = "adreline@2023";
$dbname = "blog_information";

try {  
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>