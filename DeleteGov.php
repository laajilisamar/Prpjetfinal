
<?php
if (isset($_GET["gouv"])) {
    $gouv = $_GET["gouv"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM gouvernorats WHERE `gouv` = :gouv";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gouv', $gouv, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("location: gouvernorats.php");
        } else {
            echo "La gouvernorats n'a pas été trouvée.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $pdo = null;
} else {
    echo "Paramètre gouvernorats non défini.";
}
?>
