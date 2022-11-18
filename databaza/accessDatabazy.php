<?php
$servername = "semestralka-webserver-DB-1";
$username = "root";
$password = "password";
$database = "myDB";
// pripojenie do databázy
global $accessDatabazy;
$accessDatabazy = new mysqli($servername, $username, $password, $database);
//kontrola pripojenia
if ($accessDatabazy->connect_error) {
    die("Connection failed: " . $accessDatabazy->connect_error);
}