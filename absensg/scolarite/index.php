<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="createView.php">
        <h3>create new record</h3>
    </a>
    <br>

</body>

</html>
<?php
ini_set('display_errors', "1");
error_reporting(E_ALL);
require "db_connection.php";

$numAbsFilter = isset($_GET['numAbsFilter']) ? $_GET['numAbsFilter'] : '';
$matProfFilter = isset($_GET['matProfFilter']) ? $_GET['matProfFilter'] : '';
$dateAbsFilter = isset($_GET['dateAbsFilter']) ? $_GET['dateAbsFilter'] : '';
$sessionFilter = isset($_GET['sessionFilter']) ? $_GET['sessionFilter'] : '';
$seanceFilter = isset($_GET['seanceFilter']) ? $_GET['seanceFilter'] : '';
$motifFilter = isset($_GET['motifFilter']) ? $_GET['motifFilter'] : '';
$typeSeanceFilter = isset($_GET['typeSeanceFilter']) ? $_GET['typeSeanceFilter'] : '';
$codeClasseFilter = isset($_GET['codeClasseFilter']) ? $_GET['codeClasseFilter'] : '';
$codeMatiereFilter = isset($_GET['codeMatiereFilter']) ? $_GET['codeMatiereFilter'] : '';
$justifierFilter = isset($_GET['justifierFilter']);



$requete = "select * from absensg WHERE 1=1";

if (!empty($numAbsFilter)) {
    $requete .= " and NumAbs = '$numAbsFilter'";
}

if (!empty($matProfFilter)) {
    $requete .= " and MatriculeProf = '$matProfFilter'";
}
if (!empty($sessionFilter)) {
    $requete .= " and Session = '$sessionFilter'";
}
if (!empty($dateAbsFilter)) {
    $requete .= " and DateAbs = '$dateAbsFilter'";
}

if (!empty($seanceFilter)) {
    $requete .= " and Seance = '$seanceFilter'";
}

if (!empty($motifFilter)) {
    $requete .= " and Motif = '$motifFilter'";
}
if (!empty($typeSeanceFilter)) {
    $requete .= " and TypeSeance = '$typeSeanceFilter'";
}
if (!empty($codeClasseFilter)) {
    $requete .= " and CodeClasse = '$codeClasseFilter'";
}
if (!empty($codeMatiereFilter)) {
    $requete .= " and CodeMatiere = '$codeMatiereFilter'";
}
if ($justifierFilter === '1') {
    $requete .= " and Justifier = 1";
} elseif ($justifierFilter === '0') {
    $requete .= " and Justifier = 0";
}



$r = $conn->query($requete);

echo "<form method='GET'>";
echo "<table>";
echo "<tr><td>Numero d'absence:</td> <td><input type='number' name='numAbsFilter' value='$numAbsFilter'></td></tr>";

echo "<tr><td>Matricule du Professeur:</td> <td><input type='number' name='matProfFilter' value='$matProfFilter'></td></tr>";

echo "<tr><td>Session:</td> <td><input type='number' name='sessionFilter' value='$sessionFilter'></td></tr>";


echo "<tr><td>Date d'absence:</td> <td> <input type='date' name='dateAbsFilter' value='$dateAbsFilter'></td></tr>";

echo "<tr><td>Seance:</td> <td><input type='text' name='seanceFilter' value='$seanceFilter'></td></tr>";

echo "<tr><td>Motif:</td> <td><input type='text' name='motifFilter' value='$motifFilter'></td></tr>";

echo "<tr><td>Type de Seance:</td> <td><input type='text' name='typeSeanceFilter' value='$typeSeanceFilter'></td></tr>";

echo "<tr><td>Code du classe:</td> <td><input type='text' name='codeClasseFilter' value='$codeClasseFilter'></td></tr>";


echo "<tr><td>Code du matière:</td> <td><input type='text' name='codeMatiereFilter' value='$codeMatiereFilter'></td></tr>";
echo "<tr>
    <td>Justifier:</td>
    <td>
        <label><input type='checkbox' name='justifierFilter' value='1' <?php echo ($justifierFilter === '1') ? 'checked' : ''; ?>Oui</label>
        <label><input type='checkbox' name='justifierFilter' value='0' <?php echo ($justifierFilter === '0') ? 'checked' : ''; ?> Non</label>
    </td>
</tr>";

echo "<tr><td><input type='submit' value='Appliquer'></td></tr>";
echo "</table>";
echo "</form><br>";
if ($r->rowCount() > 0) {
    echo "<table border='1' style='text-align:center>'";
    echo "<tr><th>Num Absence</th>
        <th>Matricule Prof</th>
        <th>Date d'Absence</th>
        <th>Seance</th>
        <th>Motif</th>
        <th>Session</th>
        <th>Type Seance</th>
        <th>Code Classe</th>
        <th>Code Matiere</th>
        <th>Justifier</th>
        <th>Action</th>
        </tr>";

    while ($ligne = $r->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo "<td>" . $ligne["NumAbs"] . "</td>";
        echo "<td>" . $ligne["MatriculeProf"] . "</td>";
        echo "<td>" . $ligne["DateAbs"] . "</td>";
        echo "<td>" . $ligne["Seance"] . "</td>";
        echo "<td>" . $ligne["Motif"] . "</td>";
        echo "<td>" . $ligne["Session"] . "</td>";
        echo "<td>" . $ligne["TypeSeance"] . "</td>";
        echo "<td>" . $ligne["CodeClasse"] . "</td>";
        echo "<td>" . $ligne["CodeMatiere"] . "</td>";
        echo "<td>" . $ligne["Justifier"] . "</td>";
        echo "<td>" . "<a href='delete.php?NumAbs=" . $ligne["NumAbs"] . "'>delete</a>
        <a href='detail.php?NumAbs=" . $ligne["NumAbs"] . "'>detail</a>
        <a href='updateView.php?NumAbs=" . $ligne["NumAbs"] . "'>update</a>" . "</td>";
        echo '</tr>';
    }
    echo "</table>";
} else {
    echo "Aucune donnees trouvées";
}

$conn = null;


?>