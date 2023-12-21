<?php
$pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$grade = $_GET['grade'] ?? '';
$dateNomin = $_GET['dateNomin'] ?? '';
$matProf = $_GET['matProf'] ?? '';

$requete = "SELECT m.Grade, m.DateNomin, m.MatProf
            FROM modifgrade AS m
            JOIN prof AS p ON m.MatProf = p.MatProf
            WHERE m.Grade LIKE :grade
               AND m.DateNomin LIKE :dateNomin
               AND m.MatProf LIKE :matProf";

$stmt = $pdo->prepare($requete);
$stmt->bindValue(':grade', '%' . $grade . '%', PDO::PARAM_STR);
$stmt->bindValue(':dateNomin', '%' . $dateNomin . '%', PDO::PARAM_STR);
$stmt->bindValue(':matProf', '%' . $matProf . '%', PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<h3>Search Results:</h3>";
    echo "<table border='1'><tr><th>Grade</th><th>Date de Nomin</th><th>Matricule du Professeur</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["Grade"] . "</td><td>" . $row["DateNomin"] . "</td><td>" . $row["MatProf"] . "</td>";
        echo "<td>" . "<a href='delete.php?MatProf=" . $row["MatProf"] . "'>delete</a>" . "</td>";
        echo "<td><a href='modifier.php?MatProf=" . $row["MatProf"] . "'>modifier</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found for the given criteria.";
}

$pdo = null;
?>
