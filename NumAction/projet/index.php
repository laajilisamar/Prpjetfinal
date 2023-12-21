<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
    <style>
        <style>ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
        <!DOCTYPE html>
        <form method="GET">
            <ul>
                <li>
                    <label for="numProfFilter">Filter NumProf:</label>
                    <input type="text" id="numProfFilter" name="numProfFilter" placeholder="Enter NumProf">
                </li>
                <li>
                    <label for="Qualité">Filter Qualité:</label>
                    <input type="text" id="Qualité" name="Qualité" placeholder="Enter Qualité">
                </li>
                <li>
                    <label for="Dpt">Filter Dpt:</label>
                    <input type="text" id="Dpt" name="Dpt" placeholder="Enter Dpt">
                </li>
                <li>
                    <label for="Opt">Filter Opt:</label>
                    <input type="text" id="Opt" name="Opt" placeholder="Enter Opt">
                </li>
                <li>
                    <label for="Niveau">Filter Niveau:</label>
                    <input type="text" id="Niveau" name="Niveau" placeholder="Enter Niveau">
                </li>
                <li>
                    <label for="CodeMat">Filter CodeMat:</label>
                    <input type="text" id="CodeMat" name="CodeMat" placeholder="Enter CodeMat">
                </li>
                <li>
                    <input type="submit" value="Filter">
                </li>
            </ul>
        </form>
        <table>
            <tr id="items">
                <th>NumAction</th>
                <th>NumProf</th>
                <th>DatePart</th>
                <th>Qualité</th>
                <th>Dpt</th>
                <th>Opt</th>
                <th>Niveau</th>
                <th>CodeMat</th>
                <th>Remarque</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            //inclure la page de connexion
            include_once "connexion.php";
            // Check if a filter value has been provided in the URL for NumProf
            if (isset($_GET['numProfFilter']) && !empty($_GET['numProfFilter'])) {
                $numProfFilter = $_GET['numProfFilter'];
                $conditions[] = "NumProf LIKE '%$numProfFilter%'";
            }

            // Check if a filter value has been provided in the URL for DatePart
            if (isset($_GET['Qualité']) && !empty($_GET['Qualité'])) {
                $Qualité = $_GET['Qualité'];
                $conditions[] = "Qualité LIKE '%$Qualité%'";
            }
            if (isset($_GET['Dpt']) && !empty($_GET['Dpt'])) {
                $Dpt = $_GET['Dpt'];
                $conditions[] = "Dpt LIKE '%$Dpt%'";
            }
            if (isset($_GET['Opt']) && !empty($_GET['Opt'])) {
                $Opt = $_GET['Opt'];
                $conditions[] = "Opt LIKE '%$Opt%'";
            }
            if (isset($_GET['Niveau']) && !empty($_GET['Niveau'])) {
                $Niveau = $_GET['Niveau'];
                $conditions[] = "Niveau LIKE '%$Niveau%'";
            }
            if (
                isset($_GET['CodeMat
            ']) && !empty($_GET['CodeMat
            '])
            ) {
                $CodeMat
                    = $_GET['CodeMat
                '];
                $conditions[] = "CodeMat
                 LIKE '%$CodeMat
                %'";
            }
            $query = "SELECT * FROM actionmember";
            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
            $req = mysqli_query($con, $query);

            // $req = mysqli_query($con, "SELECT * FROM actionmember");
            if (mysqli_num_rows($req) == 0) {

                echo "Il n'y a pas encore d'actionMembres ajouter !";

            } else {

                while ($row = mysqli_fetch_assoc($req)) {
                    ?>
                    <tr>
                        <td>
                            <?= $row['NumAction'] ?>
                        </td>
                        <td>
                            <?= $row['NumProf'] ?>
                        </td>
                        <td>
                            <?= $row['DatePart'] ?>
                        </td>
                        <td>
                            <?= $row['Qualité'] ?>
                        </td>
                        <td>
                            <?= $row['Dpt'] ?>
                        </td>
                        <td>
                            <?= $row['Opt'] ?>
                        </td>
                        <td>
                            <?= $row['Niveau'] ?>
                        </td>
                        <td>
                            <?= $row['CodeMat'] ?>
                        </td>
                        <td>
                            <?= $row['Remarque'] ?>
                        </td>

                        <td><a href="modifier.php?id=<?= $row['NumAction'] ?>"><img src="images/pen.png"></a></td>
                        <td><a href="supprimer.php?id=<?= $row['NumAction'] ?>"><img src="images/trash.png"></a></td>
                    </tr>
                    <?php
                }

            }
            ?>


        </table>




    </div>
</body>

</html>