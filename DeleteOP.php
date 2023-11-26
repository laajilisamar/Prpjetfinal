<?php 
include_once("ConnexionPDO.php");

if (isset($_GET["Code_Option"])) {
    $Code_Option = $_GET["Code_Option"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM options WHERE `Code_Option` = :Code_Option";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':Code_Option', $Code_Option, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("location: Option.php");
        } else {
            echo "Le option n'a pas été trouvée.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $pdo = null;
} else {
    echo "Paramètre Code_Option non défini.";
}
?>
