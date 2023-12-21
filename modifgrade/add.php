<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $grade = $_POST['grade'];
        $dateNomin = $_POST['dateNomin'];
        $matProf = $_POST['matProf'];

        $sql = "INSERT INTO modifgrade (Grade, DateNomin, MatProf) VALUES (:grade, :dateNomin, :matProf)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':grade', $grade);
        $stmt->bindParam(':dateNomin', $dateNomin);
        $stmt->bindParam(':matProf', $matProf);
        $stmt->execute();

        header("Location: select.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $profs = $pdo->query("SELECT MatProf FROM prof")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une modifgrade</title>
</head>
<body>
<h3>Ajouter une modifgrade:</h3>
<a href="select.php">Retour</a>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="grade">Grade:</label>
    <input type="text" name="grade" required><br>

    <label for="dateNomin">Date de Nomin:</label>
    <input type="date" name="dateNomin" required><br>

    <label for="matProf">Matricule du Professeur:</label>
    <select name="matProf" required>
        <?php
        foreach ($profs as $prof) {
            echo "<option value='" . $prof['MatProf'] . "'>" . $prof['MatProf'] . "</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Ajouter">
</form>
</body>
</html>
