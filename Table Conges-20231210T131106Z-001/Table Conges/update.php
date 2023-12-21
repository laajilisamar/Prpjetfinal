<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Conge</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Conge</h2>
        <?php
        require_once "db.php";
        
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            $sql = "SELECT * FROM conges WHERE NumConge = ?";
            
            if ($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                
                $param_id = trim($_GET["id"]);
                
                if (mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if (mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result);
                        $MatriculeProf = $row["MatriculeProf"];
                        $DateDeb = $row["DateDeb"];
                        $DateFin = $row["DateFin"];
                    } else {
                        echo "No records found.";
                        exit();
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close the statement
            mysqli_stmt_close($stmt);
            
            // Close connection
            mysqli_close($link);
        } else {
            echo "Invalid request.";
            exit();
        }
        ?>
        <form action="update-process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $param_id; ?>">
            <div class="form-group">
                <label for="MatriculeProf">MatriculeProf:</label>
                <input type="text" class="form-control" id="MatriculeProf" name="MatriculeProf" value="<?php echo $MatriculeProf; ?>">
            </div>
            <div class="form-group">
                <label for="DateDeb">DateDeb:</label>
                <input type="date" class="form-control" id="DateDeb" name="DateDeb" value="<?php echo $DateDeb; ?>">
            </div>
            <div class="form-group">
                <label for="DateFin">DateFin:</label>
                <input type="date" class="form-control" id="DateFin" name="DateFin" value="<?php echo $DateFin; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
