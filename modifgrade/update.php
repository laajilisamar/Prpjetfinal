<?php
$matProf = $_POST["MatProf"];
$newGrade = $_POST["Grade"];
$newDateNomin = $_POST["DateNomin"];
$pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "UPDATE modifgrade SET Grade = :newGrade, DateNomin = :newDateNomin WHERE MatProf = :matProf";
$stmt = $pdo->prepare($query);
$stmt->bindParam(":newGrade", $newGrade, PDO::PARAM_STR);
$stmt->bindParam(":newDateNomin", $newDateNomin, PDO::PARAM_STR);
$stmt->bindParam(":matProf", $matProf, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "Le grade a été modifié avec succès pour le MatProf: " . $matProf;
    header("location: select.php");
} else {
    echo "Erreur";
}

$pdo = null;
?>
