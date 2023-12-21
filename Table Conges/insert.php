<?php
// Include config file
require_once "db.php";

// Define variables and initialize with empty values
$MatriculeProf = $DateDeb = $DateFin = "";

// Processing __
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MatriculeProf = $_POST["MatriculeProf"];
    $DateDeb = $_POST["DateDeb"];
    $DateFin = $_POST["DateFin"];

    //convert
    $timestampDeb = strtotime($DateDeb);
    $timestampFin = strtotime($DateFin);
    
    //date_condition

    if ($timestampFin <= $timestampDeb) {        
        echo '<div class="alert alert-danger">DateFin must be greater than DateDeb.</div>';
    }
    else{

    // Prepare an INSERT statement
    $sql = "INSERT INTO conges (MatriculeProf, DateDeb, DateFin) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $MatriculeProf, $DateDeb, $DateFin);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the index page
            header("location: index.php");
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
  <form action="insert.php" method="POST">
            <div class="form-group">
                <label for="MatriculeProf">MatriculeProf:</label>
                <input type="text" class="form-control" id="MatriculeProf" name="MatriculeProf">
            </div>
            <div class="form-group">
                <label for="DateDeb">DateDeb:</label>
                <input type="text" class="form-control" id="DateDeb" name="DateDeb">
            </div>
            <div class="form-group">
                <label for="DateFin">DateFin:</label>
                <input type="text" class="form-control" id="DateFin" name="DateFin">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
