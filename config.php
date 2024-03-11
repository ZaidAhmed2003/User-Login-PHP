<?php
$servername = "localhost";
$username = "root";
$password = "03302411283";
$dbname = "loginsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Unable to connect to server" . $conn->connect_error);
}