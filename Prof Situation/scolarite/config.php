<?php
// Database configuration
$host = 'localhost'; // Database host (usually 'localhost')
$username = 'root'; // Database username
$password = ''; // Leave the password empty
$database = 'scolarite'; // Database name

// Create a database connection
$db = new mysqli($host, $username, $password, $database);

// Check for database connection errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Other application settings or constants can be defined here
?>