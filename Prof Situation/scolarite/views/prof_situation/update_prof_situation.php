<?php
require_once('./../../models/ProfSituationModel.php');
require_once('./../../controllers/ProfSituationController.php');
require_once('./../../config.php');
$model = new ProfSituationModel($db);
$controller = new ProfSituationController($model);

// Initialize variables for the form field values
$codeProf = $_GET['CodeProf'];
$currentSess = $_GET['Sess'];
$name = $_GET['name'];

$newSess = $currentSess; // Initialize newSess with the current session
$situation = '';
$grade = '';

// Handle CRUD operations based on user input
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    // Handle updating an existing record
    $codeProf = $_GET['CodeProf'];
    $currentSess = $_GET['Sess']; // Get the current session value from the URL
    $newSess = $_POST['newSess']; // Get the selected new session from the dropdown
    $situation = $_POST['situation'];
    $grade = $_POST['grade'];

    // Attempt the update
    $controller->update($codeProf, $currentSess, $newSess, $situation, $grade);

    // If an error occurred during the update, keep the form field values
    $newSess = $currentSess;
}

// Optionally, you can retrieve other variables from the URL, if needed
$situation = isset($_GET['Situation']) ? $_GET['Situation'] : $situation;
$grade = isset($_GET['Grade']) ? $_GET['Grade'] : $grade;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Update Prof Situation</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/scolarite/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <h1>Update Prof
        <?php echo $name ?>
    </h1>
    <div class="form-container">
        <form action="?action=update&CodeProf=<?php echo $codeProf; ?>&Sess=<?php echo $currentSess; ?>" method="POST">
            <!-- Input fields for updating data -->
            <select name="newSess" id="selectSess" required>
                <option value="<?php echo $currentSess; ?>">Select a Session</option>
                <?php
                // Fetch and populate the session options dynamically from your database
                $querys = "SELECT Numero, DATE_FORMAT(Annee, '%Y') AS Annee, DATE_FORMAT(Debsem, '%Y-%m-%d') AS Debsem, DATE_FORMAT(Finsem, '%Y-%m-%d') AS Finsem FROM Sess ORDER BY Annee DESC";
                $sessResult = $db->query($querys);
                while ($row = $sessResult->fetch_assoc()) {
                    $selected = $newSess == $row['Numero'] ? 'selected' : '';
                    echo "<option value=\"{$row['Numero']}\" $selected>{$row['Annee']} {$row['Debsem']} - {$row['Finsem']}</option>";
                }
                ?>
            </select>
            <input type="text" name="situation" required placeholder="Situation" value="<?php echo $situation; ?>">
            <select name="grade" required>
                <option value="<?php echo $grade; ?>">Select a Grade</option>
                <?php
                $sql = "SELECT Grade FROM Grades";
                $result = $db->query($sql);

                // Loop through the results and create option elements
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $gradeValue = $row["Grade"];
                        echo "<option value='$gradeValue'";
                        if ($grade == $gradeValue) {
                            echo " selected";
                        }
                        echo ">$gradeValue</option>";
                    }
                }

                ?>
            </select>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
<script>
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Désolé, une entrée en double a été détectée. Veuillez vérifier votre saisie et réessayer.',
        })
        errorMessage = null;
    }

</script>

</html>