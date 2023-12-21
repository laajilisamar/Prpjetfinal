<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `session` WHERE Numero='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Error deleting session: " . $conn->error;
    }
} else {
    echo "Session ID not provided.";
}
$conn->close();
