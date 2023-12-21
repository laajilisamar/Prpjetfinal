<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Option</title>
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
        </head>
<body>

<?php
include_once "ConnexionPDO.php";
if (isset($_POST['button'])) {
    $Typepiece = $_POST['Typepiece'];
    $LibPiece = $_POST['LibPiece'];
  
    try {
        // Utilisation de requête préparée pour éviter les injections SQL
        $query = $idcon->prepare("SELECT * FROM piece WHERE Typepiece = :Typepiece");
        $query->bindParam(':Typepiece', $Typepiece);
        $query->execute();

        if ($query->rowCount() > 0) {
            $message = "Ce Piece existe déjà.";
        } else {
            // Utilisation de requête préparée pour éviter les injections SQL
            $sql = $idcon->prepare("INSERT INTO piece (Typepiece, LibPiece) VALUES ( :Typepiece, :LibPiece)");
            $sql->bindParam(':Typepiece', $Typepiece);
            $sql->bindParam(':LibPiece', $LibPiece);
           
            

            if ($sql->execute()) {
                $message = "Ajout a été réussi.";
            } else {
                die(print_r($sql->errorInfo(), true));
            }
        }
    } catch (PDOException $e) {
        die("Erreur: " . $e->getMessage());
    }
}

$idcon = null;
?>

<div class="form">
        <a href="piece.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
        <h2>Ajouter Piece</h2>
        <p class="erreur_message">
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Type piece</label>
            <input type="number" name="Typepiece" min="0" required>
            <label>Lib Piece</label>
            <input type="text" name="LibPiece" required>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>




   
</body>

</html>