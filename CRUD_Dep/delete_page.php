<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['CodeDep'])) {
    $CodeDep = $_GET['CodeDep'];

    $query = "DELETE FROM `departements` WHERE CodeDep = '$CodeDep'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?delete_msg=you have deleted the record');
    }
}
?>
