<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP POST</title>
    <style>
        /* Style pour diviser le formulaire en deux colonnes */
        .form-container {
            display: flex;
            justify-content: center; /* Centrer horizontalement les deux colonnes */
            background-color: rgba(0, 123, 255, 0.1); /* Arrière-plan bleu transparent */
            padding: 20px; /* Marge intérieure pour l'arrière-plan */
        }

        .form-column {
            flex: 1;
            padding: 5px;
        }

        /* Style pour la première colonne du formulaire (avec une marge à gauche) */
        .form-column:first-child {
            margin-left: 100px; /* Ajoute une marge à droite du bloc de formulaire de gauche */
        }

        /* Style pour les labels et les champs de formulaire */
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 50%; /* Largeur de 50% pour les champs de saisie */
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

<h2>Ajouter Classe</h2>

<div class="form-container">
    <div class="form-column">
        <form method="post" action="ajout1.php">
            <label>Code Classe :</label>
            <input type="text" name="code_classe" required>

            <label>Classe :</label>
            <input type="text" name="classe" required>

            <label>Department :</label>
            <input type="text" name="department" required>

            <label>Option :</label>
            <input type="text" name="option" required>

            <label>Niveau :</label>
            <input type="text" name="niveau" required>
        
    </div>

    <div class="form-column">
            <label>ClasseArab :</label>
            <input type="text" name="classe_arab" required>

            <label>Option Arab Arab :</label>
            <input type="text" name="option_arab" required>

            <label>Department Arab :</label>
            <input type="text" name="departement_arab" required>

            <label>Niveau Arab :</label>
            <input type="text" name="niveau_arab" required>

            <label>Code Etape :</label>
            <input type="text" name="code_etape" required>

            <label>Code Sale:</label>
            <input type="text" name="code_Salima" required>
       
    </div>
</div>


<button type="subimt"  >Ajouter</button>
<button type="reset">Annuler</button>
<button><a href="liste.php">retour</button>
</form>
</body>
</html>
