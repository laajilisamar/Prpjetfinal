<?php 
include_once("ConnexionPDO.php");

if (!empty($_GET["Code_Option"])) {
    $query = "DELETE FROM options WHERE Code_Option = :id";
    $objstmt = $idcon->prepare($query);
    $objstmt->execute(["Code_Option" => $_GET["Code_Option"]]);
    $objstmt->closeCursor();
    header("Location:Option.php");
    exit; // Ensure that no further code is executed after the redirect
}
?>