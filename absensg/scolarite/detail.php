<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
ini_set('display_errors', "1");
error_reporting(E_ALL);
require "db_connection.php";
$id = $_GET["NumAbs"];
$request = "select * from absensg where NumAbs = $id";
$result = $conn->query($request)->fetch(PDO::FETCH_ASSOC);
$isChecked = "pas justifié";
if ($result["Justifier"] == 1) {
    $isChecked = "justifié";

}
?>

<body>
    <h2>Absence n° : <?php echo $id ?></h2>
    <ul>
        <li> MatriculeProf :
            <?php echo $result["MatriculeProf"] ?>
        </li>
        <li> Session :
            <?php echo $result["Session"] ?>
        </li>
        <li>Date d'Absence :
            <?php echo $result["DateAbs"] ?>
        </li>
        <li>Seance:
            <?php echo $result["Seance"] ?>
        </li>

        <li>Motif :
            <?php echo $result["Motif"] ?>
        </li>

        <li>TypeSeance :
            <?php echo $result["TypeSeance"] ?>
        </li>

        <li>CodeClasse :
            <?php echo $result["CodeClasse"] ?>
        </li>

        <li>CodeMatiere :
            <?php echo $result["CodeMatiere"] ?>
        </li>

        <li>Justification :
            <?php echo $isChecked ?>
        </li>
    </ul>
</body>

</html>