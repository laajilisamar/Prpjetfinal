<?php
require "connexion.php";

$codeclasse = $_GET['Cod'];

$req = "SELECT * FROM classe WHERE CodClasse = '$codeclasse'";
$stmt = $idcom->query($req);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$ligne = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP POST</title>
    <style>
        /* Style pour le conteneur du formulaire avec arrière-plan bleu transparent */
        .form-container {
            background-color: rgba(0, 123, 255, 0.1);
            padding: 20px;
        }

        /* Style pour diviser le formulaire en deux colonnes */
        .form-columns {
            display: flex;
            justify-content: space-between;
        }

        /* Style pour chaque colonne du formulaire */
        .form-column {
            flex: 1;
            padding: 10px;
        }

        /* Style pour la première colonne du formulaire (avec une marge à gauche) */
        .form-column:first-child {
            margin-left: 100px; /* Ajout d'une marge à gauche */
        }

        /* Style pour les labels et les champs de formulaire */
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 50%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2></h2>

<div class="form-container">
    <form method="post" action="modifier1.php">
        <div class="form-columns">
            <div class="form-column">
                <label>Code Classe :</label>
                <input type="text" name="code_classe" value="<?=$ligne['CodClasse']?>" required disabled>

                <label>Classe :</label>
                <input type="text" name="classe" value="<?=$ligne['IntClasse']?>" required>

                <label>Department :</label>
                <input type="text" name="department" value="<?=$ligne['Departement']?>" required>

                <label>Option :</label>
                <input type="text" name="option" value="<?=$ligne['Optionn']?>" required>

                <label>Niveau :</label>
                <input type="text" name="niveau" value="<?=$ligne['Niveau']?>" required>
            </div>

            <div class="form-column">
                <label>ClasseArab :</label>
                <input type="text" name="classe_arab" value="<?=$ligne['IntCalsseArabB']?>" required>

                <label>Option Arab Arab :</label>
                <input type="text" name="option_arab" value="<?=$ligne['OptionAaraB']?>" required>

                <label>Department Arab :</label>
                <input type="text" name="departement_arab" value="<?=$ligne['DepartementAaraB']?>" required>

                <label>Niveau Arab :</label>
                <input type="text" name="niveau_arab" value="<?=$ligne['NiveauAaraB']?>" required>

                <label>Code Etape :</label>
                <input type="text" name="code_etape" value="<?=$ligne['CodeEtape']?>" required>

                <label>Code Salima:</label>
                <input type="text" name="code_Salima" value="<?=$ligne['CodeSalima']?>" required>
            </div>
        </div>
        <input type="submit" value="Modifier">
    </form>
</div>

</body>
</html>
