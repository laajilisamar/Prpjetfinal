<?php
$pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = "SELECT * FROM Matieres"; 
$r = $pdo->query($requete);

if ($r->rowCount() > 0) {
    echo "<h3>Liste des Matières:</h3>";
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

        while ($row = $r->fetch(PDO::FETCH_ASSOC)) {
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
    echo "Aucune Matière trouvée";
}

$pdo = null;
?>
