<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="assets/css/styleForm.css">
</head>

<body>
<?php
include_once "ConnexionPDO.php";

if (isset($_POST['button'])) {
    $Gouv = $_POST['gouv'];
    $CodePostal = $_POST['codpostal'];

    try {
        // Utilisation de requête préparée pour éviter les injections SQL
        $query = $idcon->prepare("SELECT * FROM gouvernorats WHERE gouv = :gouv");
        $query->bindParam(':gouv', $Gouv);
        $query->execute();

        if ($query->rowCount() > 0) {
            $message = "Ce gouvernorat existe déjà.";
        } else {
            // Utilisation de requête préparée pour éviter les injections SQL
            $sql = $idcon->prepare("INSERT INTO gouvernorats (gouv, codpostal) VALUES (:gouv, :codpostal)");
            $sql->bindParam(':gouv', $Gouv);
            $sql->bindParam(':codpostal', $CodePostal);

            if ($sql->execute()) {
                $message = "Ajout a été réussi.";
                header("location:gouvernorats.php");
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
    <div class="form">
        <a href="gouvernorats.php" class="back_btn"><img src="assets/images/GouvImg/back.png"> Retour</a>
        <h2>Ajouter Gouvernorat</h2>
        <p class="erreur_message">
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Gouvernorat</label>
            <input type="text" name="gouv" required>
            <script>
function addNumbers() {
  const numbersString = document.getElementById('numbersInput').value;
  const numbersArray = numbersString.split(',');

  if (numbersArray.length !== 4) {
    alert('Please enter four numbers separated by commas');
    return;
  }

  let sum = 0;
  for (const number of numbersArray) {
    const parsedNumber = parseFloat(number);
    if (isNaN(parsedNumber)) {
      alert('Invalid number format');
      return;
    }

    sum += parsedNumber;
  }

  alert('The sum of the numbers is: ' + sum);
}
</script>
            <label>CodePostal</label>
            <input type="number" name="codpostal" id="numbersInput" required>

            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>
