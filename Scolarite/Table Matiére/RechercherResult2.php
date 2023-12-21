<?php
$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];
    $searchDate = $_POST["searchDate"];
    $searchCoef = isset($_POST["searchCoef"]) ? $_POST["searchCoef"] : '';

    // Recherche combinée par Nom et Date
    $requete = "SELECT * FROM Matieres WHERE 
    (`Nom Matière` LIKE :searchTerm OR :searchTerm = '')
    AND (`Coef Matière` LIKE :searchCoef OR :searchCoef = '')
    AND (:searchDate BETWEEN `DateDeb` AND `DateFin` OR :searchDate = '')";

$stmt = $pdo->prepare($requete);
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
$stmt->bindValue(':searchCoef', '%' . $searchCoef . '%', PDO::PARAM_STR); 
$stmt->bindParam(':searchDate', $searchDate, PDO::PARAM_STR);
$stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<h3>Résultats de la Recherche :</h3>";
        echo "<a href='AddM.php'>Ajouter</a>";
        echo "<table border='1'>
        <tr>
            <th>Code Matière</th>
            <th>Nom Matière</th>
            <th>Coef Matière</th>
            <th>Département</th>
            <th>Semestre</th>
            <th>Option</th>
            <th>Nb Heure CI</th>
            <th>Nb Heure TP</th>
            <th>TypeLabo</th>
            <th>Bonus</th>
            <th>Catégories</th>
            <th>SousCatégories</th>
            <th>DateDeb</th>
            <th>DateFin</th>
        </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>" . $row["Code Matière"] . "</td>
            <td>" . $row["Nom Matière"] . "</td>
            <td>" . $row["Coef Matière"] . "</td>
            <td>" . $row["Département"] . "</td>
            <td>" . $row["Semestre"] . "</td>
            <td>" . $row["Option"] . "</td>
            <td>" . $row["Nb Heure CI"] . "</td>
            <td>" . $row["Nb Heure TP"] . "</td>
            <td>" . $row["TypeLabo"] . "</td>
            <td>" . $row["Bonus"] . "</td>
            <td>" . $row["Catègories"] . "</td>
            <td>" . $row["SousCatégories"] . "</td>
            <td>" . $row["DateDeb"] . "</td>
            <td>" . $row["DateFin"] . "</td>
            <td><a href='DeleteM.php?CodeMatiere=" . $row["Code Matière"] . "'>Delete</a></td>
            <td><a href='ModifierM.php?CodeMatiere=" . $row["Code Matière"] . "'>Modifier</a></td>
        </tr>";
    }

    echo "</table>";
      
    } else {
        echo "Aucune Matière trouvée.";
    }
} else {
    echo "Veuillez utiliser le formulaire de recherche pour rechercher une matière.";
}

$pdo = null;
?>
