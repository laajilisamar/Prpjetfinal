<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NumIns = $_POST['NumIns'];
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

    $sqlupdate = "UPDATE Inscriptions SET CodeClasse = '$CodeClasse', MatEtud = '$MatEtud', Session = $Session, DateInscription = '$DateInscription', DecisionConseil = '$DecisionConseil', Rachat = $Rachat, MoyGen = $MoyGen, Dispense = $Dispense, TauxAbsences = $TauxAbsences, Redouble = $Redouble, StOuv = '$StOuv', StTech = '$StTech', TypeInscrip = '$TypeInscrip', MontantIns = '$MontantIns', Remarque = '$Remarque', Sitfin = '$Sitfin', Montant = $Montant, NoteSO = $NoteSO, NoteST = $NoteST WHERE NumIns = $NumIns";

    if ($conn->query($sqlupdate) === TRUE) {
        echo "Record updated successfully";
        echo '<script>window.setTimeout(function(){ window.location.href = "view.php"; }, 2000);</script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
    header("Location: view.php");
}



?>

<!DOCTYPE html>
<html>

    <head>
        <title>Update Record in Inscriptions Table</title>
    </head>

    <body>
        <h1>Update Record in Inscriptions Table</h1>
        <form action="update.php" method="post">
            <?php
        if (isset($_GET['NumIns'])) {
            $id = mysqli_real_escape_string($conn, $_GET['NumIns']);
            $NumIns = $id;
        }
        $sql = "SELECT * FROM Inscriptions WHERE NumIns = $NumIns";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            $CodeClasse = $row['CodeClasse'];
            $MatEtud = $row['MatEtud'];
            $Session = $row['Session'];
            $DateInscription = $row['DateInscription'];
            $DecisionConseil = $row['DecisionConseil'];
            $Rachat = $row['Rachat'];
            $MoyGen = $row['MoyGen'];
            $Dispense = $row['Dispense'];
            $TauxAbsences = $row['TauxAbsences'];
            $Redouble = $row['Redouble'];
            $StOuv = $row['StOuv'];
            $StTech = $row['StTech'];
            $TypeInscrip = $row['TypeInscrip'];
            $MontantIns = $row['MontantIns'];
            $Remarque = $row['Remarque'];
            $Sitfin = $row['Sitfin'];
            $Montant = $row['Montant'];
            $NoteSO = $row['NoteSO'];
            $NoteST = $row['NoteST'];
        }
        ?>
            <input type="hidden" name="NumIns" value="<?php echo $NumIns; ?>">

            <label for="CodeClasse">Code de Classe:</label>
            <input type="text" name="CodeClasse" value="<?php echo $CodeClasse; ?>" required><br><br>

            <label for="MatEtud">Matricule Etudiant:</label>
            <input type="text" name="MatEtud" value="<?php echo $MatEtud; ?>" required><br><br>

            <label for="Session">Session:</label>
            <input type="text" name="Session" value="<?php echo $Session; ?>" required><br><br>

            <label for="DateInscription">Date d'Inscription:</label>
            <input type="text" name="DateInscription" value="<?php echo $DateInscription; ?>"><br><br>

            <label for="DecisionConseil">Décision du Conseil:</label>
            <input type="text" name="DecisionConseil" value="<?php echo $DecisionConseil; ?>"><br><br>

            <label for="Rachat">Rachat:</label>
            <input type="checkbox" name="Rachat" value="1" <?php if ($Rachat) echo 'checked'; ?>><br><br>

            <label for="MoyGen">Moyenne Générale:</label>
            <input type="number" name="MoyGen" value="<?php echo $MoyGen; ?>" required
                title="Please enter a flaot"><br><br>

            <label for="Dispense">Dispense:</label>
            <input type="checkbox" name="Dispense" value="1" <?php if ($Dispense) echo 'checked'; ?>><br><br>

            <label for="TauxAbsences">Taux d'Absences:</label>
            <input type="number" name="TauxAbsences" value="<?php echo $TauxAbsences; ?>" required
                title="Please enter a flaot"><br><br>

            <label for="Redouble">Redoublement:</label>
            <input type="checkbox" name="Redouble" value="1" <?php if ($Redouble) echo 'checked'; ?>><br><br>

            <label for="StOuv">Statut Ouverture:</label>
            <input type="text" name="StOuv" value="<?php echo $StOuv; ?>"><br><br>

            <label for="StTech">Statut Technique:</label>
            <input type="text" name="StTech" value="<?php echo $StTech; ?>" required pattern=".{3,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="TypeInscrip">Type d'Inscription:</label>
            <input type="text" name="TypeInscrip" value="<?php echo $TypeInscrip; ?>"><br><br>

            <label for="MontantIns">Montant d'Inscription:</label>
            <input type="text" name="MontantIns" value="<?php echo $MontantIns; ?>" required pattern=".{0,13}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Remarque">Remarque:</label>
            <input type="text" name="Remarque" value="<?php echo $Remarque; ?>" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Sitfin">Situation Financière:</label>
            <input type="text" name="Sitfin" value="<?php echo $Sitfin; ?>" required pattern=".{0,20}"
                title="Please enter at most 20 characters"><br><br>

            <label for="Montant">Montant:</label>
            <input type="number" name="Montant" value="<?php echo $Montant; ?>" required pattern="\d{18,0}"
                title="Please enter valid number"><br><br>

            <label for="NoteSO">Note Service Orientation:</label>
            <input type="number" name="NoteSO" value="<?php echo $NoteSO; ?>"><br><br>

            <label for="NoteST">Note Service Technique:</label>
            <input type="number" name="NoteST" value="<?php echo $NoteST; ?>"><br><br>

            <input type="submit" value="Update Record">
            <a class="btn btn-info" href="view.php">cancel</a>


        </form>
    </body>

</html>