
    <?php
include_once "ConnexionPDO.php";

    $message = "";

    if (isset($_GET['updateGouv'])) {
        $Gouv = $_GET['updateGouv'];

        $query = "SELECT * FROM gouvernorats WHERE gouv = :gouv";
        $stmt = $idcon->prepare($query);
        $stmt->bindParam(":gouv", $Gouv);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $ligne = $stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($_POST['button'])) {
                $newGouv = $_POST['gouv'];
                $newCodePostal = $_POST['codpostal'];
                $checkQuery = "SELECT * FROM gouvernorats WHERE gouv = :newGouv AND gouv != :oldGouv";
                $checkStmt = $idcon->prepare($checkQuery);
                $checkStmt->bindParam(":newGouv", $newGouv);
                $checkStmt->bindParam(":oldGouv", $Gouv);
                $checkStmt->execute();

                if ($checkStmt->rowCount() > 0) {
                    $message = "Ce gouvernorat existe déjà.";
                } else {
                    $updateQuery = "UPDATE gouvernorats SET gouv = :newGouv, codpostal = :newCodePostal WHERE gouv = :oldGouv";
                    $updateStmt = $idcon->prepare($updateQuery);
                    $updateStmt->bindParam(":newGouv", $newGouv);
                    $updateStmt->bindParam(":newCodePostal", $newCodePostal);
                    $updateStmt->bindParam(":oldGouv", $Gouv);
                    $result = $updateStmt->execute();

                    if ($result) {
                        $message = "Mise à jour réussie";
                        header("Location: gouvernorats.php");
                    } else {
                        $message = "Erreur lors de la mise à jour : " . $idcon->errorInfo()[2];
                    }
                }
            }
        } else {
            header("Location: gouvernorats.php");
        }
    } else {
        header("Location: gouvernorats.php");
    }
    ?>
<!DOCTYPE html>
<html>

<head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier gouvernorats</title>
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
<div class="form">
<a href="gouvernorats.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
<h2>Modifier gouvernorats</h2>
    <p class="erreur_message">
        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>
    </p>
<div class="form-container">
    <div class="form-column">
    </head>
        <form action="" method="POST">
            <label>Gouvernorat</label>
            <input type="text" name="gouv" value="<?php echo $ligne['gouv']; ?>">
            <label>CodePostal</label>
            <input type="text" name="codpostal" value="<?php echo $ligne['codpostal']; ?>">
            <input type="submit" value="Modifier" name="button"><br>
            <input type="reset" value="Annuler">
          

        </form>
    </div>
</body>

</html>
