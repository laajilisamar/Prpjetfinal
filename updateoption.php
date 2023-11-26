<?php
include 'ConnexionPDO.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $newCode_Option  = $_POST['Code_Option'];
    $newOption_Name = $_POST['Option_Name'];
    $newDepartement = $_POST['Departement'];
    $newOption_AraB = $_POST['Option_AraB'];

    
    $query = "UPDATE options SET `Option_Name` = ?, `Departement` = ?, `Option_AraB` = ? WHERE `Code_Option` = ?";
    $stmt = $idcon->prepare($query);
    $stmt->bindParam(1,$newOption_Name );
    $stmt->bindParam(2, $newDepartement);
    $stmt->bindParam(3, $newOption_AraB);
    $stmt->bindParam(4, $newCode_Option);
    $stmt->execute();
    header("Location:Option.php");

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
    <title>Modifier Option</title>
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
<a href="Option.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
<h2>Modifier Option</h2>
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
    <?php
include_once "ConnexionPDO.php";

$req = "SELECT * FROM options WHERE Code_Option = '" . $_GET['Code_Option'] . "'";

$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_BOTH);
$ligne = $stmt->fetch();

if ($ligne) {


?>
            <form method="POST" action="">
           
                <label >Code Option:</label>
                <input type="number"  name="Code_Option" value="<?php echo $ligne['Code_Option']; ?>" readonly>
            
                <label> Option Name </label>
                <input type="text"  name="Option_Name" value="<?php echo $ligne['Option_Name']; ?>" required>
           
                <label>Departement</label>
                <input type="text"  name="Departement" value="<?php echo $ligne['Departement']; ?>">
            
                <label >Option AraB</label>
                <input type="text"  name="Option_AraB" value="<?php echo $ligne['Option_AraB']; ?>">
            

                </div>
</div>
    <input type="submit"  name="button" value="Modifier Option">
</form>
<?php
} else {
    echo "Aucune Option trouvée avec le code spécifié.";
}
?>
</body>

</html>
