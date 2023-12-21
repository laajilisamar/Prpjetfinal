<?php 
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Salle"])) {
    $deleteSalle = $_GET["Salle"];
    $delete = $conn->prepare("DELETE FROM Salle WHERE Salle = ?");
    $delete->bind_param("s", $deleteSalle);
    
    if ($delete->execute()) {
        echo "The salle was deleted successfully";
        
       
            header('Location: view.php');
            exit();
      
    } else {
        echo "Error deleting: " . $delete->error;
    }
    
    $delete->close();  
}
?>