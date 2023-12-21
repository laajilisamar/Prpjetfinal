<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une matière</title>
</head>
<body>
    <h3>Formulaire d'ajout de matière :</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="codeMatiere">Code Matière :</label>
        <input type="text" name="codeMatiere" required><br>

        <label for="nomMatiere">Nom Matière :</label>
        <input type="text" name="nomMatiere" required><br>

        <label for="coefMatiere">Coef Matière :</label>
        <input type="text" name="coefMatiere" required><br>

        <label for="departement">Département :</label>
        <input type="text" name="departement" required><br>

        <label for="semestre">Semestre :</label>
        <input type="text" name="semestre" required><br>

        <label for="option">Option :</label>
        <input type="text" name="option" required><br>

        <label for="nbHeureCI">Nb Heure CI :</label>
        <input type="text" name="nbHeureCI" required><br>

        <label for="nbHeureTP">Nb Heure TP :</label>
        <input type="text" name="nbHeureTP" required><br>

        <label for="typeLabo">TypeLabo :</label>
        <input type="text" name="typeLabo" required><br>

        <label for="bonus">Bonus :</label>
        <input type="text" name="bonus" required><br>

        <label for="categories">Catégories :</label>
        <input type="text" name="categories" required><br>

        <label for="sousCategories">SousCatégories :</label>
        <input type="text" name="sousCategories" required><br>

        <label for="dateDeb">Date de début :</label>
        <input type="date" name="dateDeb" required><br>

        <label for="dateFin">Date de fin :</label>
        <input type="date" name="dateFin" required><br>

        <input type="submit" value="Ajouter Matière">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeMatiere = $_POST["codeMatiere"];
    $nomMatiere = $_POST["nomMatiere"];
    $coefMatiere = $_POST["coefMatiere"];
    $departement = $_POST["departement"];
    $semestre = $_POST["semestre"];
    $option = $_POST["option"];
    $nbHeureCI = $_POST["nbHeureCI"];
    $nbHeureTP = $_POST["nbHeureTP"];
    $typeLabo = $_POST["typeLabo"];
    $bonus = $_POST["bonus"];
    $categories = $_POST["categories"];
    $sousCategories = $_POST["sousCategories"];
    $dateDeb = $_POST["dateDeb"];
    $dateFin = $_POST["dateFin"];
 // Vérifier si la date de fin est supérieure à la date de début
 if ($dateFin <= $dateDeb) {
    echo "Erreur : La date de fin doit être supérieure à la date de début.";
   
    exit; // Arrêter l'exécution du script si la vérification échoue
}

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO Matieres 
            (`Code Matière`, `Nom Matière`, `Coef Matière`, `Département`, `Semestre`, `Option`, 
             `Nb Heure CI`, `Nb Heure TP`, `TypeLabo`, `Bonus`, `Catègories`, `SousCatégories`, `DateDeb`, `DateFin`) 
            VALUES (:codeMatiere, :nomMatiere, :coefMatiere, :departement, :semestre, 
            :option, :nbHeureCI, :nbHeureTP, :typeLabo, :bonus, :categories, :sousCategories, :dateDeb, :dateFin)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':codeMatiere', $codeMatiere, PDO::PARAM_STR);
        $stmt->bindParam(':nomMatiere', $nomMatiere, PDO::PARAM_STR);
        $stmt->bindParam(':coefMatiere', $coefMatiere, PDO::PARAM_STR);
        $stmt->bindParam(':departement', $departement, PDO::PARAM_STR);
        $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
        $stmt->bindParam(':option', $option, PDO::PARAM_STR);
        $stmt->bindParam(':nbHeureCI', $nbHeureCI, PDO::PARAM_STR);
        $stmt->bindParam(':nbHeureTP', $nbHeureTP, PDO::PARAM_STR);
        $stmt->bindParam(':typeLabo', $typeLabo, PDO::PARAM_STR);
        $stmt->bindParam(':bonus', $bonus, PDO::PARAM_STR);
        $stmt->bindParam(':categories', $categories, PDO::PARAM_STR);
        $stmt->bindParam(':sousCategories', $sousCategories, PDO::PARAM_STR);
        $stmt->bindParam(':dateDeb', $dateDeb, PDO::PARAM_STR);
        $stmt->bindParam(':dateFin', $dateFin, PDO::PARAM_STR);

        $stmt->execute();

        echo "Matière ajoutée avec succès.";
        header("location: SelectM.php");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $pdo = null;
}
?>
</body>
</html>
