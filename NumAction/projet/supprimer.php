<?php
include_once "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_record'])) {
    $recordToDelete = $_POST['record_to_delete'];

    // Use prepared statement to delete the record
    $stmt = mysqli_prepare($con, "DELETE FROM actionmember WHERE NumAction = ?");
    mysqli_stmt_bind_param($stmt, "i", $recordToDelete);

    if (mysqli_stmt_execute($stmt)) {
        // Record deleted successfully; now, redirect to index.php
        header("Location: index.php");
        exit(); // Make sure to exit after the header() to prevent further execution
    } else {
        echo "Error deleting the record: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Record</title>
</head>

<body>
    <h1>Delete Record</h1>
    <form method="POST" action="supprimer.php">
        <label for="record_to_delete">Record ID to delete:</label>
        <input type="text" name="record_to_delete" id="record_to_delete">
        <input type="submit" name="delete_record" value="Delete Record">
    </form>
</body>

</html>