<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_POST['button'])) {
        extract($_POST);
        if (isset($NumAction) && isset($NumProf) && isset($Date) && isset($Qualité) && isset($Dpt) && isset($Opt) && isset($Niveau) && isset($CodeMat) && isset($Remarque)) {
            include_once "connexion.php";
            $stmt = $con->prepare("INSERT INTO actionmember (NumAction, NumProf, DatePart, Qualité, Dpt, Opt, Niveau, CodeMat, Remarque) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissssssi", $NumAction, $NumProf, $Date, $Qualité, $Dpt, $Opt, $Niveau, $CodeMat, $Remarque);

            if ($stmt->execute()) {
                header("location: index.php");
            } else {
                $message = "Erreur lors de l'ajout de l'employé.";
            }

            $stmt->close();
        } else {
            $message = "Veuillez remplir tous les champs!";
        }
    }
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>NumAction</label>
            <input type="number" name="NumAction">
            <label>NumProf</label>
            <input type="number" name="NumProf">
            <label>DatePart</label>
            <input type="date" name="Date">
            <label>Qualité</label>
            <input type="text" name="Qualité">
            <label>Dpt</label>
            <input type="text" name="Dpt">
            <label>Opt</label>
            <input type="text" name="Opt">
            <label>Niveau</label>
            <input type="text" name="Niveau">
            <label>CodeMat</label>
            <input type="text" name="CodeMat">
            <label>Remarque</label>
            <input type="text" name="Remarque">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>