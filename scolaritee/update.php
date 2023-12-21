<?php
include 'db.php';

$numero = $annee = $sem = $debut = $fin = $debsem = $finsem = $annea = $anneab = $semAb = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['Numero'];
    $annee = $_POST['Annee'];
    $sem = $_POST['Sem'];
    $debut = $_POST['Debut'];
    $fin = $_POST['Fin'];
    $debsem = $_POST['Debsem'];
    $finsem = $_POST['Finsem'];
    $annea = $_POST['Annea'];
    $anneab = $_POST['Anneab'];
    $semAb = $_POST['SemAb'];


    $sql = "UPDATE `session` SET Annee='$annee', Sem='$sem', Debut='$debut', Fin='$fin', Debsem='$debsem', Finsem='$finsem', Annea='$annea', Anneab='$anneab', SemAb='$semAb' WHERE Numero='$numero'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect vers index aprés success.
    } else {
        echo "Error updating session: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `session` WHERE Numero='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Retrieve session data from the database
        $numero = $row['Numero'];
        $annee = $row['Annee'];
        $sem = $row['Sem'];
        $debut = $row['Debut'];
        $fin = $row['Fin'];
        $debsem = $row['Debsem'];
        $finsem = $row['Finsem'];
        $annea = $row['Annea'];
        $anneab = $row['Anneab'];
        $semAb = $row['SemAb'];
    } else {
        echo "Session not found.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Session</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Update Session</h1>
        <form action="update.php" method="POST">
            <input type="hidden" id="Numero" name="Numero" value="<?php echo $numero; ?>" readonly>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Annee">Annee:</label>
                        <input type="text" class="form-control" id="Annee" name="Annee" value="<?php echo $annee; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Sem">Sem:</label>
                        <input type="number" class="form-control" id="Sem" name="Sem" min="1" max="2" required>
                    </div>

                    <div class="form-group">
                        <label for="Debut">Debut:</label>
                        <input type="datetime-local" class="form-control" id="Debut" name="Debut" value="<?php echo $debut; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Fin">Fin:</label>
                        <input type="datetime-local" class="form-control" id="Fin" name="Fin" value="<?php echo $fin; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Debsem">Debsem:</label>
                        <input type="datetime-local" class="form-control" id="Debsem" name="Debsem" value="<?php echo $debsem; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Finsem">Finsem:</label>
                        <input type="datetime-local" class="form-control" id="Finsem" name="Finsem" value="<?php echo $finsem; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Annea">Annea:</label>
                        <input type="text" class="form-control" id="Annea" name="Annea" value="<?php echo $annea; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Anneab">Anneab:</label>
                        <input type="text" class="form-control" id="Anneab" name="Anneab" value="<?php echo $anneab; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SemAb">SemAb:</label>
                        <input type="text" class="form-control" id="SemAb" name="SemAb" value="<?php echo $semAb; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" style="margin-top: 30px;" class="btn btn-primary form-control">Update</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const semInput = document.getElementById('Sem');

        semInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^\b[1-2]]/g, '').slice(0, 1);
        });

        function restrictInput(id) {
            const input = document.getElementById(id);

            input.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 4);
            });
        }
        restrictInput('Annee');
        restrictInput('Annea');
        restrictInput('Anneab');
        document.getElementById('Annee').addEventListener('change', function() {
            const year = this.value;

            document.getElementById('Debut').min = `${year}-01-01T00:00`;
            document.getElementById('Debut').max = `${year}-12-31T23:59`;

            document.getElementById('Fin').min = `${year}-01-01T00:00`;
            document.getElementById('Fin').max = `${year}-12-31T23:59`;

            const debutInput = document.getElementById('Debut');
            const debsemInput = document.getElementById('Debsem');
            const finInput = document.getElementById('Fin');
            const finsemInput = document.getElementById('Finsem');

            debutInput.addEventListener('change', function() {
                const debutDate = new Date(debutInput.value);

                debsemInput.min = `${debutDate.getFullYear()}-${(debutDate.getMonth() + 1).toString().padStart(2, '0')}-${debutDate.getDate().toString().padStart(2, '0')}T00:00`;

                const elevenMonthsLater = new Date(debutDate.getTime());
                elevenMonthsLater.setMonth(elevenMonthsLater.getMonth() + 8);
                finInput.min = elevenMonthsLater.toISOString().split('.')[0];

                debsemInput.max = `${debutDate.getFullYear()}-${(debutDate.getMonth() + 1).toString().padStart(2, '0')}-${new Date(debutDate.getFullYear(), debutDate.getMonth() + 1, 0).getDate()}T23:59`;

                const finMax = new Date(debutDate.getTime());
                finMax.setMonth(finMax.getMonth() + 11);
                finInput.max = finMax.toISOString().split('.')[0];
            });

            finInput.addEventListener('change', function() {
                const finDate = new Date(finInput.value);

                finsemInput.min = `${finDate.getFullYear()}-${(finDate.getMonth() + 1).toString().padStart(2, '0')}-${finDate.getDate().toString().padStart(2, '0')}T00:00`;
                finsemInput.max = `${finDate.getFullYear()}-${(finDate.getMonth() + 1).toString().padStart(2, '0')}-${new Date(finDate.getFullYear(), finDate.getMonth() + 1, 0).getDate()}T23:59`;
            });
        });
    </script>
</body>

</html>