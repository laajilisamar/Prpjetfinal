<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once('./../../models/ProfSituationModel.php');
require_once('./../../controllers/ProfSituationController.php');
require_once('./../../config.php');
$model = new ProfSituationModel($db);
$controller = new ProfSituationController($model);

// Initialize variables for the form field values
$codeProf = '';
$sess = '';
$situation = '';
$grade = '';

// Handle CRUD operations based on user input
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    // Handle creating a new record
    $codeProf = $_POST['codeProf'];
    $sess = $_POST['Sess'];
    $situation = $_POST['situation'];
    $grade = $_POST['grade'];

    // Attempt the creation
    $controller->create($codeProf, $sess, $situation, $grade);
}
// Rest of your PHP code remains unchanged
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Prof Situation</title>
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
            margin-top: 60px;
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
        .inpcreate {
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
    <div class="form-container">
        <form action="?action=create" method="POST">
            <label for="selectProf">Select Prof:</label>
            <select name="codeProf" id="selectProf" required>
                <option value="">Select a Prof</option>
                <?php
                // Fetch and populate the Prof options dynamically from your database
                $query = "SELECT Matricule, Nom, Prenom FROM prof ORDER BY Nom DESC";
                $profResult = $db->query($query);
                while ($row = $profResult->fetch_assoc()) {
                    $selected = $row['Matricule'] == $codeProf ? 'selected' : '';
                    echo "<option value=\"{$row['Matricule']}\" $selected>{$row['Nom']} {$row['Prenom']}</option>";
                }
                ?>
            </select>
            <label for="selectSess">Select Sess:</label>
            <select name="Sess" id="selectSess" required>
                <option value="">Select a Sess</option>
                <?php
                // Fetch and populate the Sess options dynamically from your database
                $querys = "SELECT Numero, DATE_FORMAT(Annee, '%Y') AS Annee, DATE_FORMAT(Debsem, '%Y-%m-%d') AS Debsem, DATE_FORMAT(Finsem, '%Y-%m-%d') AS Finsem FROM Sess ORDER BY Annee DESC";
                $sessResult = $db->query($querys);
                while ($row = $sessResult->fetch_assoc()) {
                    $selected = $row['Numero'] == $sess ? 'selected' : '';
                    echo "<option value=\"{$row['Numero']}\" $selected>{$row['Annee']} {$row['Debsem']} - {$row['Finsem']}</option>";
                }
                ?>
            </select>
            <input class="inpcreate" type="text" name="situation" placeholder="Situation" required
                value="<?php echo $situation; ?>">
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
            <input class="inpcreate" required type="submit" value="Create">
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