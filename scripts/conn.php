<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csgocasestats";
$dbname2 = "cases";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname2);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};

?>
