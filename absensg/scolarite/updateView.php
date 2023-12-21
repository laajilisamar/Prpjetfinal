<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
require 'db_connection.php';

$id = $_GET["NumAbs"];

$request1 = "select * from absensg where NumAbs = $id";
$result = $conn->query($request1)->fetch(PDO::FETCH_ASSOC);
$isChecked = false;
if ($result["Justifier"] == 1) {
    $isChecked = true;
}
?>
<body>
    <form method="post" action="update.php" >
        <input type="number" name="NumAbs" hidden value="<?php echo $_GET["NumAbs"]; ?>" >
        <input type="number" name="MatriculeProf" placeholder="MatriculeProf" required value="<?php echo $result["MatriculeProf"] ?>">

        <input type="number" name="Session" placeholder="Session" required value="<?php echo $result["Session"] ?>">

        <input type="datetime-local" name="DateAbs" required value="<?php echo $result["DateAbs"] ?>">

        <input type="text" name="Seance" placeholder="Seance" value="<?php echo $result["Seance"] ?>" required>

        <input type="text" name="Motif" placeholder="Motif" maxlength="60" value="<?php echo $result["Motif"] ?>">

        <input type="text" name="TypeSeance" placeholder="TypeSeance" maxlength="10"
            value="<?php echo $result["TypeSeance"] ?>">

        <input type="text" name="CodeClasse" placeholder="CodeClasse" maxlength="9"
            value="<?php echo $result["CodeClasse"] ?>">

        <input type="text" name="CodeMatiere" placeholder="CodeMatiere" maxlength="10"
            value="<?php echo $result["CodeMatiere"] ?>">

        <label for="Justifier">Justifier:</label>

        <input type="checkbox" name="Justifier" <?php if ($isChecked)
            echo 'checked="checked"'; ?>>
        <input type="submit" value="update">
    </form>
</body>

</html>


