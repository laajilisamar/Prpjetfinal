<?php
include 'ConnexionPDO.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $newTypepiece  = $_POST['Typepiece'];
    $newLibPiece = $_POST['LibPiece'];
    

    
    $query = "UPDATE piece SET `LibPiece` = ? WHERE `Typepiece` = ?";
    $stmt = $idcon->prepare($query);
    $stmt->bindParam(1,$newTypepiece );
    $stmt->bindParam(2, $newLibPiece);
   
    $stmt->execute();
    header("Location:piece.php");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Piece</title>
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
<a href="piece.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
<h2>Modifier piece</h2>
    <p class="erreur_message">
        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>
    </p>
<div class="form-container">
    <div class="form-column">
    
    <?php
include_once "ConnexionPDO.php";

$req = "SELECT * FROM piece WHERE Typepiece = '".$_GET['Typepiece']."'";

$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_BOTH);
$ligne = $stmt->fetch();

if ($ligne) {


?>
            <form method="POST" action="">
           
                <label >Type piece:</label>
                <input type="number"  name="Typepiece" value="<?php echo $ligne['Typepiece']; ?>" readonly>
            
                <label>Lib Piece</label>
                <input type="text"  name="LibPiece" value="<?php echo $ligne['LibPiece']; ?>" required>
           
                

                </div>
</div>
    <input type="submit"  name="button" value="Modifier piece">
</form>
<?php
} else {
    echo "Aucune piece trouvée avec le code spécifié.";
}
?>
</body>

</html>
