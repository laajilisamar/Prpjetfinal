<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $salle = $_POST["salle"];
    $departement = $_POST["departement"];
    $categorie = $_POST["categorie"];
    $responsable = $_POST["responsable"];
    $charge = $_POST["charge"];
    $nb_place_examen = $_POST["nb_place_examen"];
    $nb_lignes = $_POST["nb_lignes"];
    $nb_col = $_POST["nb_col"];
    $nb_surv = $_POST["nb_surv"];
    $type = $_POST["type"];
    $disponible = $_POST["disponible"];
    $checkInsertion = "SELECT COUNT(*) AS count FROM Salle WHERE Salle = '$salle'";
    $result = $conn->query($checkInsertion);
    $count = $result->fetch_assoc()['count'];

    if ($count > 0) {
        echo("Error, a Salle with the same name already exists");
    } else {
        $insertion = "INSERT INTO Salle (Salle, Departement, Categorie, Responsable, Charge, Nb_place_examen, Nb_lignes, Nb_col, Nb_surv, Type, Disponible) 
                      VALUES ('$salle', '$departement', '$categorie', '$responsable', $charge, $nb_place_examen, $nb_lignes, $nb_col, $nb_surv, '$type', '$disponible')";

        if ($conn->query($insertion) === true) {
            echo "Data inserted";

            header('Location: view.php');
            exit();
        } else {
            echo "Error: " . $insertion . "<br>" . $conn->error;
        }
    }
}
?>
