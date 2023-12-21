<?php
$host="localhost";
$user="root";
$password="";
$db="scolaritè";
$dsn="mysql:host=$host;dbname=$db";
try{

    $idcom= new PDO($dsn, $user, $password);
    $idcom->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}


catch (PDOException $e) {
    
    echo ('Erreur : ' . $e->getMessage());

    exit();
    }
?>