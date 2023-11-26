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
        </head>
<body>

<?php
include_once "ConnexionPDO.php";

if (isset($_POST['button'])) {
    $Code_Option = $_POST['Code_Option'];
    $Option_Name = $_POST['Option_Name'];
    $Departement = $_POST['Departement'];
    $Option_AraB = $_POST['Option_AraB'];
    try {
        // Utilisation de requête préparée pour éviter les injections SQL
        $query = $idcon->prepare("SELECT * FROM options WHERE Code_Option = :Code_Option");
        $query->bindParam(':Code_Option', $Code_Option);
        $query->execute();

        if ($query->rowCount() > 0) {
            $message = "Ce Option existe déjà.";
        } else {
            // Utilisation de requête préparée pour éviter les injections SQL
            $sql = $idcon->prepare("INSERT INTO options (Code_Option, Option_Name, Departement, Option_AraB) VALUES (:codeOption, :optionName, :departement, :optionArab)");
            $sql->bindParam(':codeOption', $Code_Option);
            $sql->bindParam(':optionName', $Option_Name);
            $sql->bindParam(':departement', $Departement);
            $sql->bindParam(':optionArab', $Option_AraB);
            

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

// Fermer la connexion PDO après utilisation
$idcon = null;
?>
<!-- Form HTML to add an option -->
<div class="form">
        <a href="Option.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
        <h2>Ajouter options</h2>
        <p class="erreur_message">
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Code_Option</label>
            <input type="number" name="Code_Option" min="0" required>
            <label>Option_Name</label>
            <input type="text" name="Option_Name" required>
            <label>Departement</label>
            <input type="text" name="Departement" required>
            <label>Option_AraB</label>
            <input type="text" name="Option_AraB" required>

            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
<?php  /*include_once("footer.php"); */?>




   
</body>

</html>