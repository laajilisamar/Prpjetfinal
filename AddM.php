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


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codeMatiere = $_POST["codeMatiere"];
        $nomMatiere = $_POST["nomMatiere"];
        $coefMatiere = $_POST["coefMatiere"];
        $departement = $_POST["departement"];
        $semestre = $_POST["semestre"];
        $option = $_POST["option"];
        $nbHeureCI = $_POST["nbHeureCI"];
        $nbHeureTP = $_POST["nbHeureTP"];
        $typeLabo = $_POST["typeLabo"];
        $bonus = $_POST["bonus"];
        $categories = $_POST["categories"];
        $sousCategories = $_POST["sousCategories"];
        $dateDeb = $_POST["dateDeb"];
        $dateFin = $_POST["dateFin"];

        // Vérifier si la date de fin est supérieure à la date de début
        if ($dateFin <= $dateDeb) {
            echo "Erreur : La date de fin doit être supérieure à la date de début.";
            exit; // Arrêter l'exécution du script si la vérification échoue
        }

        try {
            $idcon = "INSERT INTO Matieres 
            (`CodeMatière`, `NomMatière`, `CoefMatière`, `Département`, `Semestre`, `Option`, 
            `NbHeureCI`, `NbHeureTP`, `TypeLabo`, `Bonus`, `Categories`, `SousCatégories`, `DateDeb`, `DateFin`) 
            VALUES (:codeMatiere, :nomMatiere, :coefMatiere, :departement, :semestre, 
            :option, :nbHeureCI, :nbHeureTP, :typeLabo, :bonus, :categories, :sousCategories, :dateDeb, :dateFin)";
        
            $stmt = $pdo->prepare($idcon);

            $stmt->bindParam(':codeMatiere', $codeMatiere, PDO::PARAM_STR);
            $stmt->bindParam(':nomMatiere', $nomMatiere, PDO::PARAM_STR);
            $stmt->bindParam(':coefMatiere', $coefMatiere, PDO::PARAM_STR);
            $stmt->bindParam(':departement', $departement, PDO::PARAM_STR);
            $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
            $stmt->bindParam(':option', $option, PDO::PARAM_STR);
            $stmt->bindParam(':nbHeureCI', $nbHeureCI, PDO::PARAM_STR);
            $stmt->bindParam(':nbHeureTP', $nbHeureTP, PDO::PARAM_STR);
            $stmt->bindParam(':typeLabo', $typeLabo, PDO::PARAM_STR);
            $stmt->bindParam(':bonus', $bonus, PDO::PARAM_STR);
            $stmt->bindParam(':categories', $categories, PDO::PARAM_STR);
            $stmt->bindParam(':sousCategories', $sousCategories, PDO::PARAM_STR);
            $stmt->bindParam(':dateDeb', $dateDeb, PDO::PARAM_STR);
            $stmt->bindParam(':dateFin', $dateFin, PDO::PARAM_STR);

            $stmt->execute();

            echo "Matière ajoutée avec succès.";
            header("location: Matiers.php");

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $pdo = null;
    }
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

                <label>Bonus :</label>
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
