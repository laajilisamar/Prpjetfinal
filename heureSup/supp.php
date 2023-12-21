<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');
$con = new Connection();
$con = $con->getConnection();
$newHeureSup = new HeureSup($con);

$session = isset($_GET['session']) ? $_GET['session'] : 0; // 0 is a default value
$matprof = isset($_GET['matprof']) ? $_GET['matprof'] : 0;
$newHeureSup->supprimerHeureSup($session,$matprof);

echo "<h4> Supprimer avec succées ! </h4>";
echo "<a href='affiche.php'>Retourner a la liste </a>";





?>