<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "KitchenKourier";


$conn = mysqli_connect($server,$user , $password , $database);

if(!$conn){
    die("Error... Could not connect to the database....");
}





