<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);

$sqlSession = "SELECT Numero FROM Session";
$resultS = $conn->query($sqlSession);

$sqlClasse = "SELECT CodeClasse FROM Classe";
$resultC = $conn->query($sqlClasse);

$sqlEtudiant = "SELECT NCE FROM Etudiant";
$resultE = $conn->query($sqlEtudiant);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CodeClasse = $_POST['CodeClasse'];
    $MatEtud = $_POST['MatEtud'];
    $Session = $_POST['Session'];
    $DateInscription = $_POST['DateInscription'];
    $DecisionConseil = $_POST['DecisionConseil'];
    $Rachat = isset($_POST['Rachat']) ? 1 : 0;
    $MoyGen = $_POST['MoyGen'];
    $Dispense = isset($_POST['Dispense']) ? 1 : 0;
    $TauxAbsences = $_POST['TauxAbsences'];
    $Redouble = isset($_POST['Redouble']) ? 1 : 0;
    $StOuv = $_POST['StOuv'];
    $StTech = $_POST['StTech'];
    $TypeInscrip = $_POST['TypeInscrip'];
    $MontantIns = $_POST['MontantIns'];
    $Remarque = $_POST['Remarque'];
    $Sitfin = $_POST['Sitfin'];
    $Montant = $_POST['Montant'];
    $NoteSO = $_POST['NoteSO'];
    $NoteST = $_POST['NoteST'];

    // SQL query to insert data into the "Inscriptions" table
    $sql = "INSERT INTO inscriptions (CodeClasse, MatEtud, Session, DateInscription, DecisionConseil, Rachat, MoyGen, Dispense, TauxAbsences, Redouble, StOuv, StTech, TypeInscrip, MontantIns, Remarque, Sitfin, Montant, NoteSO, NoteST) 
        VALUES ('$CodeClasse', '$MatEtud', $Session, '$DateInscription', '$DecisionConseil', $Rachat, $MoyGen, $Dispense, $TauxAbsences, $Redouble, '$StOuv', '$StTech', '$TypeInscrip', '$MontantIns', '$Remarque', '$Sitfin', $Montant, $NoteSO, $NoteST)";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Insert Data into Inscriptions Table</title>
    </head>

    <body>
        <h1>Insert Data into Inscriptions Table</h1>
        <form action="create.php" method="post">

            <label for="CodeClasse"> Code Classe:</label>
            <select name="CodeClasse">
                <?php

            if ($resultC->num_rows > 0) {
                while ($row = $resultC->fetch_assoc()) {
                    $CodeClasse = $row['CodeClasse'];
                    echo "<option value='$CodeClasse'>$CodeClasse</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="NCE">Matricule Etudiant:</label>
            <select name="MatEtud">
                <?php

            if ($resultE->num_rows > 0) {
                while ($row = $resultE->fetch_assoc()) {
                    $NCE = $row['NCE'];
                    echo "<option value='$NCE'>$NCE</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="Numero">Session:</label>
            <select name="Session">
                <?php

            if ($resultS->num_rows > 0) {
                while ($row = $resultS->fetch_assoc()) {
                    $Numero = $row['Numero'];
                    echo "<option value='$Numero'>$Numero</option>";
                }
            }
            ?>
            </select><br><br>

            <label for="DateInscription">Date d'Inscription:</label>
            <input type="date" name="DateInscription"><br><br>

            <label for="DecisionConseil">Décision du Conseil:</label>
            <input type="text" name="DecisionConseil" value="*****"><br><br>

            <label for="Rachat">Rachat:</label>
            <input type="checkbox" name="Rachat" value="1"><br><br>

            <label for="MoyGen">Moyenne Générale:</label>
            <input type="decimal" name="MoyGen" required title="Please enter a flaot">
            <br><br>

            <label for="Dispense">Dispense:</label>
            <input type="checkbox" name="Dispense" value="1"><br><br>

            <label for="TauxAbsences">Taux d'Absences:</label>
            <input type="decimal" name="TauxAbsences" required title="Please enter flaot"><br><br>

            <label for="Redouble">Redoublement:</label>
            <input type="checkbox" name="Redouble" value="1"><br><br>

            <label for="StOuv">Statut Ouverture:</label>
            <input type="text" name="StOuv"><br><br>

            <label for="StTech">Statut Technique:</label>
            <input type="text" name="StTech" required pattern=".{3,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="TypeInscrip">Type d'Inscription:</label>
            <input type="text" name="TypeInscrip" value="NR"><br><br>

            <label for="MontantIns">Montant d'Inscription:</label>
            <input type="text" name="MontantIns" required pattern=".{0,13}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Remarque">Remarque:</label>
            <input type="text" name="Remarque" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Sitfin">Situation Financière:</label>
            <input type="text" name="Sitfin" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Montant">Montant:</label>
            <input type="decimal" name="Montant" required pattern="\d{18,0}" title="Please enter valid number"><br><br>

            <label for="NoteSO">Note Service Orientation:</label>
            <input type="decimal" name="NoteSO"><br><br>

            <label for="NoteST">Note Service Technique:</label>
            <input type="decimal" name="NoteST"><br><br>

            <input type="submit" value="Insert Data">
            <a class="btn btn-info" href="view.php">see all</a>
        </form>
    </body>

</html>