<?php
include '../config/db_conn.php';  // Include the database configuration

    $document_id = $_GET['id'];
    
    // Delete the document from the database based on its ID
    $query = "DELETE FROM dossier_etud WHERE Ndossier = $document_id";
    if ($conn->query($query) === TRUE) {
        header("location:showDocs.php?message=DeleteSuccess");
    } else {
        header("location:showDocs.php?message=DeleteFail");
    }

?>