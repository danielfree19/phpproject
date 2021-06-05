<?php

$serverName = "127.0.0.1";
$dbUsername = "root";
$dbPass = "";
$dbName = "phpProj";


$conn = mysqli_connect($serverName,$dbUsername,$dbPass,$dbName);
mysqli_query($conn,"SET NAMES utf8");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


