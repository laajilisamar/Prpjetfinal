<?php
// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "scolarite";

function connect($host, $db, $user, $password)
{
	
	try {
		
		$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		$conn = new PDO($dsn, $user, $password, $options);
		
		return $conn;

	} catch (PDOException $e) {
		die($e->getMessage());
	}
}
$conn = connect($host, $db, $user, $password);
