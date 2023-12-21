<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);


$servername = "localhost";

$username = "root";

$password = "";

$dbname = "scolarite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
//$sql = "CREATE DATABASE scolarite";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

// $conn->close();