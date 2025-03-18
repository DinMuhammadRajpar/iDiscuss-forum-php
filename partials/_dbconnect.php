<?php

$servername = 'localhost';
$username = 'root';
$password = "";
$database = "techforum";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die('Database not connected. Please checkout this error'. mysqli_error($conn));
} 

?>