<?php
$host = "localhost";
$username = "root";
$password = "";
$databaseName = "view";

$conn = new mysqli($host,$username,$password,$databaseName);
if ($conn->connect_error){
    die("Failed to connecth to the database");
}
