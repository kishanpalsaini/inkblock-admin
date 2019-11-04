<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With,access-control-allow-origin,Authorization,authorization,Origin,Content-Type,Version');


$servername = "localhost";  
$username = "root";
$password = "";
$database="inkblockstudio";
// Create connection


$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");

?>