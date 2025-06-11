<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$host = "localhost";
$port = 3307;
$user = "root";
$pass = "";
$db = "tesis_db";
$conn = new mysqli($host, $user, $pass, $db, $port);
;
?>