<?php
require "ConnexionPDO.php"; 

if (isset($_POST['NumRatV'])) {
    $NumRatV = $_POST['NumRatV'];
    $MatProf = $_POST['MatProf'];
    $DateRat = $_POST['DateRat'];
    $Seance = $_POST['Seance'];
    $Session = $_POST['Session'];
    $Salle = $_POST['Salle'];
    $Jour = $_POST['Jour'];
    $CodeClasse = $_POST['CodeClasse'];
    $CodeMatiere = $_POST['CodeMatiere'];
    $Etat = $_POST['Etat'];

    // Check if the record already exists
    $checkQuery = "SELECT * FROM ratvol WHERE NumRatV = :NumRatV";
    $checkStatement = $idcon->prepare($checkQuery);
    $checkStatement->bindParam(':NumRatV', $NumRatV);
    $checkStatement->execute();

    if ($checkStatement->rowCount() == 0) {
        // Record does not exist, insert it
        $req = "INSERT INTO ratvol (NumRatV, MatProf, DateRat, Seance, Session, Salle, Jour, CodeClasse, CodeMatiere, Etat) VALUES ('$NumRatV','$MatProf','$DateRat','$Seance','$Session','$Salle','$Jour','$CodeClasse','$CodeMatiere','$Etat')";
        $idcon->exec($req);
        
        echo '<script>alert("New record created successfully.")</script>';

    } else {
        // Record already exists
        echo '<script>alert("L\'objet existe déjà.")</script>';

    }

    header('location: Affiche.php');
} else {
    echo '<script>alert("NumRatV is not set")</script>';

}
?>
<html>
    <style>.alert {
  color: white;
  background-color: red;
  border-color: black;
  border-width: 2px;
  border-radius: 5px;
  padding: 10px;
  font-size: 16px;
  font-family: sans-serif;
}</style>
</html>