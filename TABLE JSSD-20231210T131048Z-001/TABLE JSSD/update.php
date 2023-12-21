<?php
include 'connexion.php';

if(isset($_GET['delete'])){
    $jourToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM JSSD WHERE Jour='$jourToDelete'";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if(isset($_POST['update'])){
    $jour = $_POST['jour'];
    $seance = $_POST['seance'];
    $salle = $_POST['salle'];
    $ndist = $_POST['ndist'];
    $groupe = $_POST['groupe'];

    $updateSql = "UPDATE JSSD SET Séance='$seance', Salle='$salle', NDist=$ndist, Groupe='$groupe' WHERE Jour='$jour'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


$sql = "SELECT * FROM JSSD";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
    font-family: Arial, sans-serif;
}

table {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

a {
    margin-right: 10px;
    text-decoration: none;
    color: blue;
}

a:hover {
    text-decoration: underline;
}


</style>
</head>

<body>
<form action="update.php" method="GET">
           
<div class="container mt-4">
        <input type="text" id="search" placeholder="Search..." class="form-control mb-3">ww<<ws
         
          
          

       </form>
    <table id="myTable">
        <tr>
            <th>Jour</th>
            <th>Séance</th>
            <th>Salle</th>
            <th>NDist</th>
            <th>Groupe</th>
            <th>Actions</th>
        </tr>

        <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Jour'] . "</td>
                                <td>" . $row['Séance'] . "</td>
                                <td>" . $row['Salle'] . "</td>
                                <td>" . $row['NDist'] . "</td>
                                <td>" . $row['Groupe'] . "</td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='jour' value='" . $row['Jour'] . "'>
                                        <input type='text' name='seance' value='" . $row['Séance'] . "' class='form-control mb-2'>
                                        <input type='text' name='salle' value='" . $row['Salle'] . "' class='form-control mb-2'>
                                        <input type='text' name='ndist' value='" . $row['NDist'] . "' class='form-control mb-2'>
                                        <input type='text' name='groupe' value='" . $row['Groupe'] . "' class='form-control mb-2'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary mr-2'>
                                    </form>
                                    <a href='?delete=" . $row['Jour'] . "' class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
        
    </table>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
            $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            });
            });
        </script>
    
</body>
</html>