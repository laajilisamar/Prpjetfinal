<!DOCTYPE html>
<html>
<head>
    <title>Modifier la matière</title>
</head>
<body>
<?php
if (isset($_GET["CodeMatiere"])) {
    $codeMatiere = $_GET["CodeMatiere"];
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM Matieres WHERE `Code Matière` = :codeMatiere";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":codeMatiere", $codeMatiere, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<h3>Modifier la matière :</h3>";
        echo "<form method='post' action='UpdateM.php'>";
        echo "<input type='hidden' name='CodeMatiere' value='" . $codeMatiere . "'>";
        echo "Nom Matière: <input type='text' name='NomMatiere' value='" . $row["Nom Matière"] . "'><br>";
        echo "Coef Matière: <input type='text' name='CoefMatiere' value='" . $row["Coef Matière"] . "'><br>";
        echo "Département: <input type='text' name='Departement' value='" . $row["Département"] . "'><br>";
        echo "Semestre: <input type='text' name='Semestre' value='" . $row["Semestre"] . "'><br>";
        echo "Option: <input type='text' name='Option' value='" . $row["Option"] . "'><br>";
        echo "Nb Heure CI: <input type='text' name='NbHeureCI' value='" . $row["Nb Heure CI"] . "'><br>";
        echo "Nb Heure TP: <input type='text' name='NbHeureTP' value='" . $row["Nb Heure TP"] . "'><br>";
        echo "TypeLabo: <input type='text' name='TypeLabo' value='" . $row["TypeLabo"] . "'><br>";
        echo "Bonus: <input type='text' name='Bonus' value='" . $row["Bonus"] . "'><br>";
        echo "Catègories: <input type='text' name='Categories' value='" . $row["Catègories"] . "'><br>";
        echo "SousCatégories: <input type='text' name='SousCategories' value='" . $row["SousCatégories"] . "'><br>";
        echo "DateDeb: <input type='text' name='DateDeb' value='" . $row["DateDeb"] . "'><br>";
        echo "DateFin: <input type='text' name='DateFin' value='" . $row["DateFin"] . "'><br>";
    
        echo "<input type='submit' value='Modifier'>";
        echo "</form>";
    } else {
        echo "Matiere non trouvée";
    }

    $pdo = null;
} else {
    echo "Code Matiere non spécifié.";
}
?>

</body>
</html>
