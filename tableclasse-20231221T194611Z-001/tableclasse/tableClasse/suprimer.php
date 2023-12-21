<?php

require "connexion.php";


$codeclasse = $_GET['Cod'];
$req = "DELETE FROM `classe` WHERE CodClasse='$codeclasse'";

$idcom->exec($req);

header('location: liste.php');
