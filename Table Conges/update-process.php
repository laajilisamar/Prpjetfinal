<?php
require_once "db.php";

$MatriculeProf = $DateDeb = $DateFin = "";
$id = $param_id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = trim($_POST["id"]);
    $MatriculeProf = $_POST["MatriculeProf"];
    $DateDeb = $_POST["DateDeb"];
    $DateFin = $_POST["DateFin"];

    if (strtotime($DateFin) <= strtotime($DateDeb)) {
        echo "DateFin must be greater than DateDeb.";
    } else {
        $sql = "UPDATE conges SET MatriculeProf = ?, DateDeb = ?, DateFin = ? WHERE NumConge = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssi", $MatriculeProf, $DateDeb, $DateFin, $id);

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}

?>
