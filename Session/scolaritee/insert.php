<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $annee = $_POST['Annee'];
    $sem = $_POST['Sem'];
    $debut = $_POST['Debut'];
    $fin = $_POST['Fin'];
    $debsem = $_POST['Debsem'];
    $finsem = $_POST['Finsem'];
    $annea = $_POST['Annea'];
    $anneab = $_POST['Anneab'];
    $semAb = $_POST['SemAb'];

    $sql = "INSERT INTO `session` (Annee, Sem, Debut, Fin, Debsem, Finsem, Annea, Anneab, SemAb) 
            VALUES ('$annee', '$sem', '$debut', '$fin', '$debsem', '$finsem', '$annea', '$anneab', '$semAb')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect to index after successful insert
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
