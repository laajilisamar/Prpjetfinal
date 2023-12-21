<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <main>
        <div class="link_container">
            <a href="addDoc.php" class="link">Ajouter Un Dossier</a>
        </div >
        <div class="filter">
            <!-- Search filters -->
        <label for="startDate">Recherche par intervalle de date:</label>
        <input type="date" id="startDate" name="startDate" class="filter_input">
        <input type="date" id="endDate" name="endDate" class="filter_input">
        
        <label for="studentID">Recherche par matricule d'étudiant:</label>
        <input type="text" id="studentID" name="studentID" class="filter_input">

        <label for="specificDate">Recherche par date spécifique:</label>
        <input type="date" id="specificDate" name="specificDate" class="filter_input">

        <button onclick="filterTable()">Filtrer</button>

        </div>
        

        <table>
            <thead>
                <tr>
                    <th>Motif</th>
                    <th>Matricule Etudiant</th>
                    <th>Type de Piece</th>
                    <th>Date de Piece</th>
                    <th>Session</th>
                    <th>Nom de Piece</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Table body content will be updated dynamically with JavaScript -->
            </tbody>
        </table>
    </main>

    <script>
        function filterTable() {
            // Get filter values
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            var studentID = document.getElementById('studentID').value;
            var specificDate = document.getElementById('specificDate').value;

            // Construct URL with filter values as query parameters
            var url = `filter.php?startDate=${startDate}&endDate=${endDate}&studentID=${studentID}&specificDate=${specificDate}`;

            // Fetch data from the server based on the filters
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('tableBody').innerHTML = data; // Update table body with fetched data
                })
                .catch(error => console.error('Error:', error));
        }
        
        // Call filterTable function initially to load unfiltered data
        filterTable();
    </script>

</body>

</html>
