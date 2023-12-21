<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "connexion.php";


    if (isset($_POST["submit"])) {
        $NumProf = $_POST['NumProf'];
        $DatePart = $_POST['DatePart'];
        $Qualité = $_POST['Qualité'];
        $Dpt = $_POST['Dpt'];
        $Opt = $_POST['Opt'];
        $Niveau = $_POST['Niveau'];
        $CodeMat = $_POST['CodeMat'];
        $Remarque = $_POST['Remarque'];
        $sql = "UPDATE actionmember SET `NumProf`='$NumProf',`DatePart`='$DatePart',`Qualité`='$Qualité',`Dpt`='$Dpt',`Opt`='$Opt',`Niveau`='$Niveau' ,`CodeMat`='$CodeMat',`Remarque`='Remarque' WHERE  NumAction = $NumAction";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=Data updated successfully");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }

    ?>
     <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier l'actionMembre :
            <?= isset($row['NumAction']) ? $row['NumAction'] : "" ?>
        </h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>NumAction</label>
            <input type="number" name="NumAction" value="<?= isset($row['NumAction']) ? $row['NumAction'] : "" ?>"
                disabled>
            <label>NumProf</label>
            <input type="number" name="NumProf" value="<?= isset($row['NumProf']) ? $row['NumProf'] : "" ?>">
            <label>DatePart</label>
            <input type="date" name="DatePart" value="<?= isset($row['DatePart']) ? $row['DatePart'] : "" ?>">
            <label>Qualité</label>
            <input type="text" name="Qualité" value="<?= isset($row['Qualité']) ? $row['Qualité'] : "" ?>">
            <label>Dpt</label>
            <input type="text" name="Dpt" value="<?= isset($row['Dpt']) ? $row['Dpt'] : "" ?>">
            <label>Opt</label>
            <input type="text" name="Opt" value="<?= isset($row['Opt']) ? $row['Opt'] : "" ?>">
            <label>Niveau</label>
            <input type="text" name="Niveau" value="<?= isset($row['Niveau']) ? $row['Niveau'] : "" ?>">
            <label>CodeMat</label>
            <input type="text" name="CodeMat" value="<?= isset($row['CodeMat']) ? $row['CodeMat'] : "" ?>">
            <label>Remarque</label>
            <input type="text" name="Remarque" value="<?= isset($row['Remarque']) ? $row['Remarque'] : "" ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div> 
</body>

</html>