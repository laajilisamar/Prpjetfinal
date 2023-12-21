
<?php
ini_set('display_errors', "1");
error_reporting(E_ALL);
require_once 'db_connection.php';
require 'inputs.php';
$NumAbs = random_int(100,1000000);

$request = "insert into AbsEnsg (NumAbs,MatriculeProf, Session, DateAbs, Seance, Motif, TypeSeance, CodeClasse, CodeMatiere, Justifier) 
        VALUES ($NumAbs,$MatriculeProf,$Session,'$DateAbs','$Seance','$Motif','$TypeSeance','$CodeClasse','$CodeMatiere',$Justifier)";
$n = $conn->exec($request);
if ($n) {
    header("location: index.php");
} else {
    echo "Error adding the record.";
}

?>