<?php
$servername = "localhost";  // server name
$username = "root"; // username
$password = ""; // password
$database = "scolarite"; // name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
