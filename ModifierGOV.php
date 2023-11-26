<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once "ConnexionPDO.php";

    $message = "";

    if (isset($_GET['updateGouv'])) {
        $Gouv = $_GET['updateGouv'];

        $sql = "SELECT * FROM gouvernorats WHERE gouv = '$Gouv'";
        $result = mysqli_query($idcon, $sql);
        
        if (mysqli_num_rows($result) == 1) {
            mysqli_free_result($result);

            if (isset($_POST['button'])) {
                $newGouv = $_POST['gouv'];
                $newCodePostal = $_POST['codpostal'];
                $checkQuery = "SELECT * FROM gouvernorats WHERE gouv = '$newGouv' AND gouv != '$Gouv'";
            $checkResult = mysqli_query($idcon, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                $message = "Ce gouvernorat existe déjà.";
            } else {
                $sql = "UPDATE gouvernorats SET gouv = '$newGouv', codpostal = '$newCodePostal' WHERE gouv = '$Gouv'";
                $resultat = mysqli_query($idcon, $sql);
                

                if ($resultat) {
                    $message = "Mise à jour réussie";
                } else {
                    $message = "Erreur lors de la mise à jour : " . mysqli_error($idcon);
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

 
    <body>
        <div class="form">
            <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
            <h2>Modifier Gouvernorat</h2>
            <p class="erreur_message">
                <?php
                if (!empty($message)) {
                    echo $message;
                }
                ?>
            </p>
            <form action="" method="POST">
                <label>Gouvernorat</label>
                <input type="text" name="gouv" value="<?php echo $ligne['gouv']; ?>">
                <label>CodePostal</label>
                <input type="text" name="codpostal" value="<?php echo $ligne['codpostal']; ?>">
                <input type="submit" value="update" name="button">
            </form>
        </div>
    </body>

    </html>