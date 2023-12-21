<?php
include 'connexion.php';

if(isset($_POST['submit'])){
    $jour = $_POST['jour'];
    $seance = $_POST['seance'];
    $salle = $_POST['salle'];
    $ndist = $_POST['ndist'];
    $groupe = $_POST['groupe'];

    $sql = "INSERT INTO JSSD (Jour, Séance, Salle, NDist, Groupe) VALUES ('$jour', '$seance', '$salle', $ndist, '$groupe')";

    if ($conn->query($sql) === TRUE) {
        
        $lastInsertedId = $conn->insert_id;
        
        header("Location: update.php?jour=$lastInsertedId");
        exit(); 
    } else {
        echo "Error creating record: " . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Record</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        </style>
</head>
<body>
    <form method="post" action="create.php">
        Jour: <input type="text" name="jour"><br>
        Séance: <input type="text" name="seance"><br>
        Salle: <input type="text" name="salle"><br>
        NDist: <input type="text" name="ndist"><br>
        Groupe: <input type="text" name="groupe"><br>
        <input type="submit" name="submit" value="Create">
    </form>
</body>
</html>
