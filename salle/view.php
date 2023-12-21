<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Gestion des salles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<?php 
require('connect.php');

if (isset($_POST["select2"])) {
    $filter = $_POST["salles"];
    $filterValue = $_POST["filterValue"];
   
    switch ($filter) {
        case "categorie":
            $query = "SELECT * FROM Salle WHERE Catégorie = '$filterValue'";
            break;
        case "departement":
            $query = "SELECT * FROM Salle WHERE Département = '$filterValue'";
            break;
        case "type":
            $query = "SELECT * FROM Salle WHERE Type = '$filterValue'";
            break;
        default:
            $query = "SELECT * FROM Salle";
    }

    $result1 = $conn->query($query);

    if ($result1->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        foreach ($result1->fetch_fields() as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";

        while ($row = $result1->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "<td><button class='delete-btn' onclick='deleteRecord(\"{$row["Salle"]}\")'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found for the specified filter and value.</p>";
    }
} else {
    $select = "SELECT * FROM Salle";
    $result = $conn->query($select);

    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC); 
        echo "<table>";
        echo "<tr>";
        foreach ($rows[0] as $key => $value) {
            echo "<th>$key</th>";
        }
        echo "</tr>";

        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "<td><button class='delete-btn' onclick='deleteRecord(\"{$row["Salle"]}\")'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nothing found</p>";
    }
}

?>

<script>
  function deleteRecord(Salle) {
    if (confirm("Are you sure you want to delete this salle?")) {
        window.location.href = `delete.php?Salle=${Salle}&redirect=view.php`;
    }
}

</script>

</body>
</html>
