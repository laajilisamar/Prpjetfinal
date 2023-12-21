<!DOCTYPE html>
<html>
<head>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #008080;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        .search-form {
            margin-top: 20px;
        }
        .search-label {
            font-weight: bold;
        }
        .search-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .search-button {
            background-color: #007BFF;
            color: #fff;
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
        button[type="submit"] {
            background-color: #008080;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body><br><br>
<form method="POST">
        <label>Rechercher par NumProf: </label>
        <input type="text" name="searchNumProf">
        <button type="submit">Rechercher</button>
        <a href="afficherCell.php">Home</a>
    </form>
    
    <br><br>
<div class="container">
    <div class="text">
        <h1>Liste Des Cellules</h1>
    </div>
    
    <br><br><br>
    <?php
    require_once("connexion.php");
    if (isset($_POST['searchNumProf'])) {
        $searchNumProf = $_POST['searchNumProf'];
        $req = "SELECT * FROM cellules WHERE NumProf = :searchNumProf";
        $ps = $idcon->prepare($req);
        $ps->execute(array(':searchNumProf' => $searchNumProf));
        if ($ps->rowCount() > 0) {
            echo '<table>';
            echo '<tr>
                    <th>NumProf</th>
                    <th>NumMat</th>
                    <th>NumSession</th>
                    <th>NumCell</th>
                </tr>';
            while ($var = $ps->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                        <td>' . $var['NumProf'] . '</td>
                        <td>' . $var['NumMat'] . '</td>
                        <td>' . $var['NumSession'] . '</td>
                        <td>' . $var['NumCell'] . '</td>
                    </tr>';
            }
            echo '</table>';
        } else {
            echo 'No records found with the provided NumProf.';
        }
    }
    ?>
    <br>
    
</div>
</body>
</html>
