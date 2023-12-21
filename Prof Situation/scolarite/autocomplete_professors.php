<?php
// Include your database connection here
include 'config.php';

$query = $_GET["query"];
$query = "%" . $query . "%"; // Add wildcard characters for a partial match

// Use prepared statements to prevent SQL injection
$stmt = $db->prepare("SELECT Nom, Prenom FROM prof WHERE Nom LIKE ? OR Prenom LIKE ?");
$stmt->bind_param("ss", $query, $query);
$stmt->execute();

$result = $stmt->get_result();
$professors = [];

while ($row = $result->fetch_assoc()) {
    $professors[] = $row;
}

echo json_encode($professors);

$stmt->close();
$db->close();
?>