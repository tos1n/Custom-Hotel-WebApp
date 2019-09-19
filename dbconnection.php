<?php
//require "file.php"

$server = "localhost";
$username = "root";
$password = "";
$database = "Hotel_App";



$connection = mysqli_connect($server, $username, $password, $database);
    if ($connection){
        echo "Database connection was successful";
    } else{
        die("Error.");
    }


    
?>