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
        fieldset {
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 10px;
            margin-top: 20px;
        }
        p {
            font-weight: bold;
            margin-bottom: 10px;
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
    <div class="text">
        <h1 class="">Modifier Un Cellule</h1>
</div><br><br><br>

<form method="POST" action="">
        <fieldset>
            <legend>Nouveau </legend>
            <p>Veuillez remplir les champs suivants</p>
            <label>NumCell</label><input type="text" name="NumCell"><br><br>
            <label>NumProf</label><input type="number" name="NumProf"><br><br>
            <label>NumMat</label><input type="text" name="NumMat"><br><br>
            <button type="reset" onclick="resetForm()">Anuuler</button>
            <button type="submit" name='Enregistrer'>Enregistrer</button>
            <a href="afficherCell.php">Home</a>
        </fieldset>
    </form>
    <script>
    function resetForm() {
        document.querySelector('form').reset();
    }
</script>
</body>
</html>

<?php
    require "connexion.php";

    if(isset($_POST['Enregistrer']))
    {
        $nc=$_POST["NumCell"];
        $np=$_POST["NumProf"];
        $nm=$_POST["NumMat"];
        $req="update cellules set  NumProf= '$np', NumMat= '$nm'  where NumCell= '$nc' ";
        $idcon->exec($req);
        echo '<script>alert("Une cellule est modifier.");</script>';
    }
?>