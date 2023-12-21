<?php
if (isset($_GET["CodeMatiere"])) {
    $codeMatiere = $_GET["CodeMatiere"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM Matieres WHERE `Code Matière` = :codeMatiere";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':codeMatiere', $codeMatiere, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("location: SelectM.php");
        } else {
            echo "La matière n'a pas été trouvée.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $pdo = null;
} else {
    echo "Paramètre CodeMatiere non défini.";
}
?>
