<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Matière</title>
    <link rel="stylesheet" href="assets/css/styleForm.css">
</head>
<style>
        /* Style pour diviser le formulaire en deux colonnes */
        .form-container {
            display: flex;
            justify-content: center; /* Centrer horizontalement les deux colonnes */
            background-color: rgba(0, 122, 255, 0.1); /* Arrière-plan bleu transparent */
            padding: 20px; /* Marge intérieure pour l'arrière-plan */
        }
        
        .form-column {
            flex: 1;
            padding: 5px;
        }
        .form-column:first-child {
            margin-left: 100px; /* Ajoute une marge à droite du bloc de formulaire de gauche */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        </style>
        
<body>
<?php
include_once "ConnexionPDO.php";

$message = "";

if (isset($_POST['button'])) {
    $codeMatiere = $_POST['codeMatiere'];
    $nomMatiere = $_POST['nomMatiere'];
    $coefMatiere = $_POST['coefMatiere'];
    $departement = $_POST['departement'];
    $semestre = $_POST['semestre'];
    $option = $_POST['option'];
    $nbHeureCI = $_POST['nbHeureCI'];
    $nbHeureTP = $_POST['nbHeureTP'];
    $typeLabo = $_POST['typeLabo'];
    $bonus = $_POST['bonus'];
    $categories = $_POST['categories'];
    $sousCategories = $_POST['sousCategories'];
    $dateDeb = $_POST['dateDeb'];
    $dateFin = $_POST['dateFin'];

    try {
        $query = $idcon->prepare("SELECT * FROM Matieres WHERE `CodeMatière` = :codeMatiere");
        $query->bindParam(':codeMatiere', $codeMatiere);
        $query->execute();

        if ($query->rowCount() > 0) {
            $message = "Cette matière existe déjà.";
        } else {
            $sql = $idcon->prepare("INSERT INTO Matieres 
                (`CodeMatière`, `NomMatière`, `CoefMatière`, `Département`, `Semestre`, `Option`, 
                `NbHeureCI`, `NbHeureTP`, `TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`) 
                VALUES (:codeMatiere, :nomMatiere, :coefMatiere, :departement, :semestre, 
                :option, :nbHeureCI, :nbHeureTP, :typeLabo, :bonus, :categories, :sousCategories, :dateDeb, :dateFin)");

            $sql->bindParam(':codeMatiere', $codeMatiere);
            $sql->bindParam(':nomMatiere', $nomMatiere);
            $sql->bindParam(':coefMatiere', $coefMatiere);
            $sql->bindParam(':departement', $departement);
            $sql->bindParam(':semestre', $semestre);
            $sql->bindParam(':option', $option);
            $sql->bindParam(':nbHeureCI', $nbHeureCI);
            $sql->bindParam(':nbHeureTP', $nbHeureTP);
            $sql->bindParam(':typeLabo', $typeLabo);
            $sql->bindParam(':bonus', $bonus);
            $sql->bindParam(':categories', $categories);
            $sql->bindParam(':sousCategories', $sousCategories);
            $sql->bindParam(':dateDeb', $dateDeb);
            $sql->bindParam(':dateFin', $dateFin);

            if ($sql->execute()) {
                $message = "Matière ajoutée avec succès.";
            } else {
                die(print_r($sql->errorInfo(), true));
            }
        }
    } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}

// Fermer la connexion PDO après utilisation
$idcon = null;
?>

<div class="form">
    <a href="Matiers.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
    <h2>Ajouter Matière</h2>
    <p class="erreur_message">
        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>
    </p>
    <div class="form-container">
    <div class="form-column">
    <form method="post" action="">
        <label>Code Matière :</label>
        <input type="text" name="codeMatiere" required>

        <label>Nom Matière :</label>
        <input type="text" name="nomMatiere" required>

        <label>Coef Matière :</label>
        <input type="text" name="coefMatiere" required>

        <label>Département :</label>
        <input type="text" name="departement" required>

        <label>Semestre :</label>
        <input type="text" name="semestre" required>

        <label>Option :</label>
        <input type="text" name="option" required>
    
        <label>Nb Heure CI :</label>
        <input type="text" name="nbHeureCI" required>
        </div>
        <div class="form-column">
        <label>Nb Heure TP :</label>
        <input type="text" name="nbHeureTP" required>

        <label>TypeLabo :</label>
        <input type="text" name="typeLabo" required>

        <label >Bonus :</label>
        <input type="text" name="bonus" required>

        <label>Catégories :</label>
        <input type="text" name="categories" required>

        <label>SousCatégories :</label>
        <input type="text" name="sousCategories" required>

        <label>Date de début :</label>
        <input type="date" name="dateDeb" required>

        <label>Date de fin :</label>
        <input type="date" name="dateFin" required>
  </div>
</div>

        <input type="submit" value="Ajouter Matière" name="button">
    </form>  
</body>
</html>
