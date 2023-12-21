
<?php
require 'db_connection.php';
require 'inputs.php';
$id = $_POST["NumAbs"];

    $request2 = "update `absensg`
    SET `MatriculeProf` = :MatriculeProf,
    `Session` = :Session,
    `DateAbs` = :DateAbs,
    `Seance` = :Seance,
    `Motif` = :Motif,
    `TypeSeance` = :TypeSeance,
    `CodeClasse` = :CodeClasse,
    `CodeMatiere` = :CodeMatiere,
    `Justifier` = :Justifier
    WHERE `NumAbs` = $id";


$stmt = $conn->prepare($request2);

$stmt->bindParam(':MatriculeProf', $MatriculeProf);
$stmt->bindParam(':Session', $Session);
$stmt->bindParam(':DateAbs', $DateAbs);
$stmt->bindParam(':Seance', $Seance);
$stmt->bindParam(':Motif', $Motif);
$stmt->bindParam(':TypeSeance', $TypeSeance);
$stmt->bindParam(':CodeClasse', $CodeClasse);
$stmt->bindParam(':CodeMatiere', $CodeMatiere);
$stmt->bindParam(':Justifier', $Justifier, PDO::PARAM_INT);


if ($stmt->execute()) {
 header("location: index.php");
} else {
    echo "Error updating the record.". implode(' ', $stmt->errorInfo());
}



?>
