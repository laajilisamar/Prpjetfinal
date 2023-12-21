<!DOCTYPE html>
<html>

<head>
    <title>Create New Session</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Create New Session</h1>
        <form action="insert.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Annee">Année:</label>
                        <input type="text" class="form-control" id="Annee" placeholder="Please enter a 4-digit number" name="Annee" required>
                    </div>

                    <div class="form-group">
                        <label for="Sem">Sem:</label>
                        <input type="number" class="form-control" id="Sem" placeholder="Please choose 1 or 2." name="Sem" min="1" max="2" required>
                    </div>

                    <div class="form-group">
                        <label for="Debut">Début:</label>
                        <input type="datetime-local" class="form-control" id="Debut" name="Debut" required>
                    </div>

                    <div class="form-group">
                        <label for="Fin">Fin:</label>
                        <input type="datetime-local" class="form-control" id="Fin" name="Fin" required>
                    </div>

                    <div class="form-group">
                        <label for="Debsem">Debsem:</label>
                        <input type="datetime-local" class="form-control" id="Debsem" name="Debsem" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Finsem">Finsem:</label>
                        <input type="datetime-local" class="form-control" id="Finsem" name="Finsem" required>
                    </div>

                    <div class="form-group">
                        <label for="Annea">Annea:</label>
                        <input type="text" class="form-control" id="Annea" name="Annea" placeholder="Please enter a 4-digit number" required>
                    </div>

                    <div class="form-group">
                        <label for="Anneab">Anneab:</label>
                        <input type="text" class="form-control" id="Anneab" name="Anneab" placeholder="Please enter a 4-digit number" required>
                    </div>

                    <div class="form-group">
                        <label for="SemAb">SemAb:</label>
                        <input type="number" class="form-control" id="SemAb" name="SemAb" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" style="margin-top: 30px;" class="btn btn-primary form-control">Create</button>
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