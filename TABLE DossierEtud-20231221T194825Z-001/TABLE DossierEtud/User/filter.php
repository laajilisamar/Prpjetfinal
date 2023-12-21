<?php
// Include the database configuration file
include '../config/db_conn.php';

// Retrieve filter parameters from the URL query parameters
$startDate = $_GET['startDate'] ?? '';
$endDate = $_GET['endDate'] ?? '';
$studentID = $_GET['studentID'] ?? '';
$specificDate = $_GET['specificDate'] ?? '';

// Prepare the base SQL query
$query = "SELECT * FROM dossier_etud WHERE 1=1";

// Prepare an array to store conditions
$conditions = [];

// Check and add conditions for filtering
if ($startDate && $endDate) {
    $conditions[] = "DatePiece BETWEEN '$startDate' AND '$endDate'";
}

if ($studentID) {
    $conditions[] = "MatEtud = '$studentID'";
}

if ($specificDate) {
    $conditions[] = "DatePiece = '$specificDate'";
}

// Append conditions to the base query
if (!empty($conditions)) {
    $query .= " AND " . implode(" AND ", $conditions);
}

// Execute the constructed query
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output HTML for table rows based on the filtered data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Motif']}</td>
                <td>{$row['MatEtud']}</td>
                <td>{$row['TypePiece']}</td>
                <td>{$row['DatePiece']}</td>
                <td>{$row['Session']}</td>
                <td>{$row['NomFichierPiece']}</td>
                <td class='image'><a href='modifyDoc.php?id={$row['Ndossier']}'><img src='../images/write.png' alt=''></a></td>
                <td class='image'><a href='deleteDoc.php?id={$row['Ndossier']}'><img src='../images/remove.png' alt=''></a></td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='8' class='message'>Aucun dossier trouvé !</td></tr>";
}

// Close the database connection
$conn->close();
?>
000