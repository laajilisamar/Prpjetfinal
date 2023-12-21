<?php

    $matProf = $_GET["MatProf"];
    $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM modifgrade WHERE MatProf = :matProf";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":matProf", $matProf, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<h3>Modifier le grade :</h3>";
        echo "<form method='post' action='update.php'>"; 
        echo "<input type='hidden' name='MatProf' value='" . $matProf . "'>";
        echo "Grade: <input type='text' name='Grade' value='" . $row["Grade"] . "'><br>";
        echo "Date de Nomin: <input type='date' name='DateNomin' value='" . date('Y-m-d', strtotime($row["DateNomin"])) . "'><br>";
        echo "<input type='submit' value='Modifier'>";
        echo "</form>";
    } else {
        echo "erreur ";
    }

    $pdo = null;

?>
