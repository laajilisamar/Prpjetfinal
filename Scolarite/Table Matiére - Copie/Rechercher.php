<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de Recherche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h3>Recherche de Matières :</h3>
    
   
    <form method="post" action="RechercherResult2.php">
        <label for="searchTerm">Recherche par Nom :</label>
        <input type="text" name="searchTerm" id="searchTerm" placeholder="Nom Matière">

        <label for="searchCoef">Recherche par Coefficient :</label>
        <input type="text" name="searchCoef" id="searchCoef" placeholder="Coefficet ">
        
        <label for="searchDate">Recherche par Date :</label>
        <input type="date" name="searchDate" id="searchDate">
        
        <input type="submit" value="Rechercher">
    
 
 

</body>
</html>
