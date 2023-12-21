<?php

require "connexion.php";

$codeclasse = $_POST['code_classe'];
$classe = $_POST['classe'];
$depar = $_POST['department'];
$option = $_POST['option'];
$niveau = $_POST['niveau'];
$classearab = $_POST['classe_arab'];
$optionarab = $_POST['option_arab'];
$departmentarab = $_POST['departement_arab'];
$niveauarab = $_POST['niveau_arab'];
$codeetape = $_POST['code_etape'];
$codesalima = $_POST['code_Salima'];

// Utilisation d'une requête SELECT avec mysqli pour vérifier si la clé primaire existe déjà
$query = "SELECT CodClasse FROM classe WHERE CodClasse = '$codeclasse'";
$result = $idcom->query($query);

$req2 = "UPDATE classe SET CodClasse='$codeclasse', IntClasse='$classe', Departement='$depar', Optionn='$option', 
                               Niveau='$niveau', IntCalsseArabB='$classearab', OptionAaraB='$optionarab', 
                               DepartementAaraB='$departmentarab', NiveauAaraB='$niveauarab', 
                               CodeEtape='$codeetape', CodeSalima='$codesalima'
            WHERE CodClasse='$codeclasse'";

   if($result->num_rows == 0) {

    $idcom->query($req2);
    header('location:liste.php');
} else  {
    // Utilisation d'une requête UPDATE correcte avec une clause WHERE pour spécifier la condition
    echo "La clé primaire existe déjà. Veuillez choisir une autre clé.";
    
}

?>
