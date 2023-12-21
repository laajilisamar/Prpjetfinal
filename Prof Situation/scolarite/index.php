<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (isset($_GET['update_success']) && $_GET['update_success'] == 1) {
        echo '<script type="text/javascript">
    Swal.fire({
        title: "Success",
        text: "Record updated successfully!",
        icon: "success",
    }).then(function() {
        // Clear the URL parameter
        window.history.replaceState({}, document.title, "index.php");
    });
    </script>';
    }
    if (isset($_GET['create_success']) && $_GET['create_success'] == 1) {
        echo '<script type="text/javascript">
    Swal.fire({
        title: "Success",
        text: "Record created successfully!",
        icon: "success",
    }).then(function() {
        // Clear the URL parameter
        window.history.replaceState({}, document.title, "index.php");
    });
    </script>';
    }
    ?>
    <?php
    require_once('./models/ProfSituationModel.php');
    require_once('./controllers/ProfSituationController.php');
    require_once('./views/prof_situation/ProfSituationView.php');
    require_once('./config.php');

    $model = new ProfSituationModel($db);
    $controller = new ProfSituationController($model);
    $view = new ProfSituationView($db);

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $codeProf = $_GET['codeProf'];
        $sess = $_GET['Sess'];

        if ($action === 'delete') {
            // Use SweetAlert for confirmation
            echo "<script>";
            echo "Swal.fire({
            title: 'Delete Record',
            text: 'Are you sure you want to delete this record?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?action=confirmDelete&codeProf=$codeProf&Sess=$sess';
            }
            else {
                window.location.href = 'index.php';
            }
        });";
            echo "</script>";
        }

        if ($action === 'confirmDelete') {
            // Handle the deletion here
            $controller->delete($codeProf, $sess);
            // Redirect back to the main page after deleting
            header("Location: index.php");
        }
    }
    ?>

    <?php
    $query = "SELECT CodeProf, Sess, Situation, Grade FROM profsituation ORDER BY Sess DESC";
    $profResult = $db->query($query);
    $profData = array();

    while ($row = $profResult->fetch_assoc()) {
        $profData[] = $row;
    }

    $view->displayProfSituation($profData);
    ?>
</body>

</html>