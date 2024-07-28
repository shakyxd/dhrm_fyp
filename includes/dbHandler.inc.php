<?php

$serverName = "localhost";
$dbUsername = "id20359512_root";
$dbPassword = "!wd!9J>f#!%lO}a$";
$dbName = "id20359512_fyp";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}