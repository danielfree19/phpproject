<?php

$serverName = "danielfree19.Ddns.Net";
$dbUsername = "arkadi";
$dbPass = "danielfree99";
$dbName = "phpProj";

$conn = mysqli_connect($serverName,$dbUsername,$dbPass,$dbName);
mysqli_query($conn,"SET NAMES utf8");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}


