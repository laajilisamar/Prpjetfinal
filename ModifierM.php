<?php
include 'ConnexionPDO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $newcodeMatiere = $_POST['CodeMatiere'];
        $newNomMatiere = $_POST['NomMatiere'];
        $newCoefMatiere = $_POST['CoefMatiere'];
        $newDepartement = $_POST['Departement'];
        $newSemestre = $_POST['Semestre'];
        $newOption = $_POST['Option'];
        $newNbHeureCI = $_POST['NbHeureCI'];
        $newNbHeureTP = $_POST['NbHeureTP'];
        $newTypeLabo = $_POST['TypeLabo'];
        $newBonus = $_POST['Bonus'];
        $newCategories = $_POST['Categories'];
        $newSousCategories = $_POST['SousCategories'];
        $newDateDeb = $_POST['DateDeb'];
        $newDateFin = $_POST['DateFin'];

        $query = "UPDATE matieres SET `NomMatière` = ?, `CoefMatière` = ?, `Département` = ?, `Semestre` = ?, `Option` = ?, `NbHeureCI` = ?, `NbHeureTP` = ?, `TypeLabo` = ?, `Bonus` = ?, `Catègories` = ?, `SousCatégories` = ?, `DateDeb` = ?, `DateFin` = ? WHERE `CodeMatiere` = ?";
        $stmt = $idcon->prepare($query);
        
        $stmt->bindParam(1, $newNomMatiere);
        $stmt->bindParam(2, $newCoefMatiere);
        $stmt->bindParam(3, $newDepartement);
        $stmt->bindParam(4, $newSemestre);
        $stmt->bindParam(5, $newOption);
        $stmt->bindParam(6, $newNbHeureCI);
        $stmt->bindParam(7, $newNbHeureTP);
        $stmt->bindParam(8, $newTypeLabo);
        $stmt->bindParam(9, $newBonus);
        $stmt->bindParam(10, $newCategories);
        $stmt->bindParam(11, $newSousCategories);
        $stmt->bindParam(12, $newDateDeb);
        $stmt->bindParam(13, $newDateFin);
        $stmt->bindParam(14, $newcodeMatiere);
        $stmt->execute();
        header("Location: Matiers.php");
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
    <title>Modifier Matière</title>
    <link rel="stylesheet" href="assets/css/styleForm.css">
</head>
<style>
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
<a href="Matiers.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
<h2>Modifier Matière</h2>
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

$req = "SELECT * FROM Matieres WHERE CodeMatière = '" . $_GET['CodeMatiere'] . "'";

$stmt = $idcon->query($req);
$stmt->setFetchMode(PDO::FETCH_BOTH);
$ligne = $stmt->fetch();

if ($ligne) {


?>
        <form method="POST" action="">
           
                <label >Code Matière :</label>
                <input type="text"  name="CodeMatiere" value="<?php echo $ligne['CodeMatière']; ?>" >
            
                <label >Nom Matière</label>
                <input type="text"  name="NomMatiere" value="<?php echo $ligne['NomMatière']; ?>" >
           
                <label>Coef Matière</label>
                <input type="text"  name="CoefMatiere" value="<?php echo $ligne['CoefMatière']; ?>">
            
                <label >Département</label>
                <input type="text"  name="Departement" value="<?php echo $ligne['Département']; ?>">
            
                <label >Semestre</label>
                <input type="text"  name="Semestre" value="<?php echo $ligne['Semestre']; ?>">

                <label >Option</label>
                <input type="text"  name="Option" value="<?php echo $ligne['Option']; ?>">
          
                <label >Nb Heure CI</label>
                <input type="number" min="0"   name="NbHeureCI"   value="<?php echo $ligne['NbHeureCI']; ?>">
                </div>
             <div class="form-column"> 
                <label>Nb Heure TP</label>
                <input type="number" min="0"  name="NbHeureTP" value="<?php echo $ligne['NbHeureTP']; ?>">
       
                <label >TypeLabo</label>
                <input type="text"  name="TypeLabo" value="<?php echo $ligne['TypeLabo']; ?>">
            

          
                <label >Bonus</label>
                <input type="number" min="0"   name="Bonus" value="<?php echo $ligne['Bonus']; ?>">
           


                <label >Catègories</label>
                <input type="text"  name="Categories" value="<?php echo $ligne['Catègories']; ?>">
            

          
                <label >SousCatégories</label>
                <input type="text"  name="SousCategories" value="<?php echo $ligne['SousCatégories']; ?>">
           

            
                <label >DateDeb</label>
                <input type="datetime-local"  name="DateDeb" value="<?php echo date('Y-m-d', strtotime($ligne['DateDeb'])); ?>">
           

            
                <label >DateFin</label>
                <input type="datetime-local""  name="DateFin" value="<?php echo date('Y-m-d', strtotime($ligne['DateFin'])); ?>">
    </div>
</div>
            <input type="submit" name="button" value="Modifier Matière" >
    </form>
    <?php
} else {
    echo "Aucune matière trouvée avec le code spécifié.";
}
?>
</body>

</html>