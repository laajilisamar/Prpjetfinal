<?php
require "connexion.php";

if (isset($_POST['Valider'])) {
    $np = $_POST["NumProf"];
    $nm = $_POST["NumMat"];
    $nc = $_POST["NumCell"];
    $ns = $_POST["NumSession"];

    if ($nc >= 1 && $nc <= 33) {
        $allowedSession1Numbers = [1, 2, 7, 8,13, 14, 19, 20,25, 26, 27, 31, 32];
        $allowedSession2Numbers = [3,4,9, 10,15, 16,21,22, 23,27 ,28, 33];
        $allowedSession3Numbers = [5, 6, 11, 12,17, 18,23, 24,29, 30];
        if (in_array($nc, $allowedSession1Numbers) && $ns !== '1') {
            echo '<script>alert("NumSession 1 (Matin) est requis pour ce NumCell.");</script>';
        }else

        if (in_array($nc, $allowedSession2Numbers) && $ns !== '2') {
            echo '<script>alert("NumSession 2 (Midi) est requis pour ce NumCell.");</script>';
        }else
        if (in_array($nc, $allowedSession3Numbers) && $ns !== '3') {
            echo '<script>alert("NumSession 3 (Apres-Midi) est requis pour ce NumCell.");</script>';
        }
        else {
            $checkQuery = "SELECT * FROM cellules WHERE NumCell = '$nc'";
            $result = $idcon->query($checkQuery);

            if ($result->rowCount() > 0) {
                echo '<script>alert("Une cellule avec ce NumCell existe déjà.");</script>';
            } else {
                $req = "INSERT INTO cellules (NumProf, NumMat, NumCell, NumSession) VALUES ('$np', '$nm', '$nc', '$ns')";
                $idcon->exec($req);
                echo '<script>alert("Une cellule est ajoutée.");</script>';
            }
        }
    } else {
        echo '<script>alert("NumCell doit être compris entre 1 et 33.");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: left;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #008080;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #ccc;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
        a {
            text-decoration: none; 
            padding: 10px 20px; 
            background-color: #008080; 
            color: #fff; 
            border-radius: 5px; 
            margin: 5px; 
        }
        a:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter une Cellule</h1>
        <form method="POST">
            <label for="NumCell">NumCell</label>
            <input type="text" name="NumCell" required>

            <label for="NumProf">NumProf</label>
            <input type="number" name="NumProf" required>

            <label for="NumMat">NumMat</label>
            <input type="text" name="NumMat" required>

            <label for="NumSession">NumSession</label>
            <select name="NumSession" required>
                <option value="1">1 (Matin)</option>
                <option value="2">2 (Midi)</option>
                <option value="3">3 (Midi)</option>
            </select>

            <button type="reset">Annuler</button>
            <button type="submit" name="Valider">Valider</button>
            <a href="afficherCell.php">Home</a>
        </form>
    </div>
</body>
</html>