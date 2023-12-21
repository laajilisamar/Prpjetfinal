<!-- view.php -->

<?php
include "config.php";

ini_set("display_errors", "1");
error_reporting(E_ALL);

// $sqlSession = "SELECT Numero FROM Session";
// $resultS = $conn->query($sqlSession);

// $sqlClasse = "SELECT CodeClasse FROM Classe";
// $resultC = $conn->query($sqlClasse);

// $sqlEtudiant = "SELECT NCE FROM Etudiant";
// $resultE = $conn->query($sqlEtudiant);

$sql = "SELECT * FROM Inscriptions";

// Check if there are search criteria
if (isset($_GET['searchCodeClasse']) || isset($_GET['searchMatEtud'])) {
    $sql .= " WHERE";

    // Add conditions based on the provided search criteria
    if (isset($_GET['searchCodeClasse'])) {
        $searchCodeClasse = $_GET['searchCodeClasse'];
        $sql .= " CodeClasse LIKE '%$searchCodeClasse%' AND";
    }

    if (isset($_GET['searchMatEtud'])) {
        $searchMatEtud = $_GET['searchMatEtud'];
        $sql .= " MatEtud LIKE '%$searchMatEtud%' AND";
    }

    if (isset($_GET['searchSession'])) {
        $searchMatEtud = $_GET['searchSession'];
        $sql .= " Session LIKE '%$searchSession%' AND";
    }

    $sql = rtrim($sql, ' AND');
}

// Execute the SQL query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Records in Inscriptions Table</title>
</head>

<body>
    <h1>View Records in Inscriptions Table</h1>

    <form method="get" action="search.php">


        <label for="searchCodeClasse">Code de Classe:</label>
        <input type="text" name="searchCodeClasse" value="<?php echo isset($_GET['searchCodeClasse']) ? $_GET['searchCodeClasse'] : ''; ?>">
        <br>
        <label for="searchMatEtud">Matricule Etudiant:</label>
        <input type="text" name="searchMatEtud" value="<?php echo isset($_GET['searchMatEtud']) ? $_GET['searchMatEtud'] : ''; ?>">
        <br>
        <label for="searchSession">Session Etudiant:</label>
        <input type="text" name="searchSession" value="<?php echo isset($_GET['searchSession']) ? $_GET['searchSession'] : ''; ?>">
        <br>
        <input type="submit" value="Rechercher">
    </form>

    <table border="1">
        <tr>
            <th>NumIns</th>
            <th>CodeClasse</th>
            <th>MatEtud</th>

        </tr>

        <?php
        // Display the results of the query
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['NumIns'] . "</td>";
                echo "<td>" . $row['CodeClasse'] . "</td>";
                echo "<td>" . $row['MatEtud'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
        }
        ?>

    </table>
</body>

</html>