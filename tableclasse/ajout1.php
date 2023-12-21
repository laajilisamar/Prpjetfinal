<?php

require "connexion.php";

//$ncin=$_POST['ncin_user'];

$codeclasse=$_POST['code_classe'];
$classe=$_POST['classe'];
$depar=$_POST['department'];

$option=$_POST['option'];
$niveau=$_POST['niveau'];
$classearab=$_POST['classe_arab'];
$optionarab=$_POST['option_arab'];
$departmentarab=$_POST['departement_arab'];

$niveauarab=$_POST['niveau_arab'];
$codeetape=$_POST['code_etape'];
$codesalima=$_POST['code_Salima'];


//$etat=$_POST['etat'];
//br=$_POST['nbrjr'];

$req="INSERT INTO `classe`(`CodClasse`, `IntClasse`, `Departement`, `Optionn`, `Niveau`, `IntCalsseArabB`, `OptionAaraB`, `DepartementAaraB`, `NiveauAaraB`, `CodeEtape`, `CodeSalima`) 
VALUES ('$codeclasse','$classe','$depar','$option','$niveau','$classearab','$optionarab','$departmentarab','$niveauarab','$codeetape','$codesalima')";
$idcom->exec($req);

header('location:liste.php');





