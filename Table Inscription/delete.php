<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);

// Check if a record ID is provided via a GET request
if (isset($_GET['NumIns'])) {
    $NumIns = $_GET['NumIns'];
    
    // SQL query to delete a record with the given ID from the "Inscriptions" table
    $sql = "DELETE FROM Inscriptions WHERE NumIns = $NumIns";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        // Redirect to view.php after a short delay
        echo '<script>window.setTimeout(function(){ window.location.href = "view.php"; }, 2000);</script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No record ID provided for deletion.";
}

// Close the database connection
$conn->close();
