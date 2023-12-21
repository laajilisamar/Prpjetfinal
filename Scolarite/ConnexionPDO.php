<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "scolarite";

try {
    $idcon = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $idcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur Connexion: " . $e->getMessage();
    exit();
}
?>


 
