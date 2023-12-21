<?php

$codeMatiere = $_POST["CodeMatiere"];
$newNomMatiere = $_POST["NomMatiere"];
$newCoefMatiere = $_POST["CoefMatiere"];
$newDepartement = $_POST["Departement"];
$newSemestre = $_POST["Semestre"];
$newOption = $_POST["Option"];
$newNbHeureCI = $_POST["NbHeureCI"];
$newNbHeureTP = $_POST["NbHeureTP"];
$newTypeLabo = $_POST["TypeLabo"];
$newBonus = $_POST["Bonus"];
$newCategories = $_POST["Categories"];
$newSousCategories = $_POST["SousCategories"];
$newDateDeb = $_POST["DateDeb"];
$newDateFin = $_POST["DateFin"];

//verfie le date
if ($newDateFin <= $newDateDeb) {
    echo "Erreur : La date de fin doit être supérieure à la date de début.";
   
    exit;
}

$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE Matieres SET 
    `Nom Matière` = :newNomMatiere,
    `Coef Matière` = :newCoefMatiere,
    `Département` = :newDepartement,
    `Semestre` = :newSemestre,
    `Option` = :newOption,
    `Nb Heure CI` = :newNbHeureCI,
    `Nb Heure TP` = :newNbHeureTP,
    `TypeLabo` = :newTypeLabo,
    `Bonus` = :newBonus,
    `Catègories` = :newCategories,
    `SousCatégories` = :newSousCategories,
    `DateDeb` = :newDateDeb,
    `DateFin` = :newDateFin
WHERE `Code Matière` = :codeMatiere";


$stmt = $pdo->prepare($query);
$stmt->bindParam(":codeMatiere", $codeMatiere, PDO::PARAM_STR);
$stmt->bindParam(":newNomMatiere", $newNomMatiere, PDO::PARAM_STR);
$stmt->bindParam(":newCoefMatiere", $newCoefMatiere, PDO::PARAM_STR);
$stmt->bindParam(":newDepartement", $newDepartement, PDO::PARAM_STR);
$stmt->bindParam(":newSemestre", $newSemestre, PDO::PARAM_STR);
$stmt->bindParam(":newOption", $newOption, PDO::PARAM_STR);
$stmt->bindParam(":newNbHeureCI", $newNbHeureCI, PDO::PARAM_STR);
$stmt->bindParam(":newNbHeureTP", $newNbHeureTP, PDO::PARAM_STR);
$stmt->bindParam(":newTypeLabo", $newTypeLabo, PDO::PARAM_STR);
$stmt->bindParam(":newBonus", $newBonus, PDO::PARAM_STR);
$stmt->bindParam(":newCategories", $newCategories, PDO::PARAM_STR);
$stmt->bindParam(":newSousCategories", $newSousCategories, PDO::PARAM_STR);
$stmt->bindParam(":newDateDeb", $newDateDeb, PDO::PARAM_STR);
$stmt->bindParam(":newDateFin", $newDateFin, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "La matière a été modifiée avec succès.";
    header("location: SelectM.php");
} else {
    echo "Erreur ";
}

$pdo = null;

?>
