<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
   
    <form action="#" method="GET">
        <label for="grade">Grade:</label>
        <input type="text" name="grade" id="grade">

        <label for="dateNomin">Date de Nomin:</label>
        <input type="date" name="dateNomin" id="dateNomin">

        <label for="matProf">Matricule du Professeur:</label>
        <input type="text" name="matProf" id="matProf">

        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $grade = $_GET['grade'] ?? '';
        $dateNomin = $_GET['dateNomin'] ?? '';
        $matProf = $_GET['matProf'] ?? '';

        $requete = "SELECT m.Grade, m.DateNomin, m.MatProf, p.nom
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
            echo "<a href='add.php'>ajouter</a> <br>";
            echo"  <a href='select.php'>Retour</a>";
            echo "<table border='1'><tr><th>Grade</th><th>Date de Nomin</th><th>Matricule du Professeur</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>" . $row["Grade"] . "</td><td>" . $row["DateNomin"] . "</td><td>" . $row["MatProf"] . "</td>";
                echo "<td>" . "<a href='delete.php?MatProf=" . $row["MatProf"] . "'>delete</a>" . "</td>";
                echo "<td><a href='modifier.php?MatProf=" . $row["MatProf"] . "'>modifier</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo"  <a href='select.php'>Retour</a>";
            echo "Aucun résultat trouvé pour les critères donnés.";
        }

        $pdo = null;
    }
    ?>
</body>
</html>
