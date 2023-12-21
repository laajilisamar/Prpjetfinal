<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Professor Situations</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/scolarite/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<style>
    /* CSS to hide a specific column */
    @media print {
        .hide-column {
            display: none;
        }
    }

    #filter:hover {
        background-color: #555;
    }


    .fa-trash {
        color: red;
    }


    .fa-pen {
        color: green;
    }

    .fa-trash:hover {
        animation: scale 0.5s infinite alternate;
    }

    .fa-pen:hover {
        animation: scale 0.5s infinite alternate;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes scale {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.2);
        }
    }


    input[type="date"] {
        margin-left: 40px;
        background-color: #0080ff;
        padding: 10px;
        font-family: "Roboto Mono", monospace;
        color: #ffffff;
        font-size: 16px;
        border: none;
        outline: none;
        border-radius: 5px;
    }

    /* Style the calendar picker indicator */
    input[type="date"]::-webkit-calendar-picker-indicator {
        background-color: #ffffff;
        padding: 5px;
        cursor: pointer;
        border-radius: 3px;
    }

    .sidenav {
        /* Your existing styles */
        height: 90%;
        width: auto;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #333;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    /* Center the child elements */
    .sidenav>* {
        text-align: center;
        margin: 10px 0;
        /* Adjust the margin as needed for spacing */
    }



    .sidenav label,
    .sidenav select,
    .sidenav button {
        display: block;
        margin: 10px 0;
    }

    .sidenav label,
    .sidenav select {
        color: #fff;
        /* Text color */
    }

    .sidenav select {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #444;
        /* Input background color */
        color: #fff;
    }

    .sidenav select:focus {
        outline: none;
    }

    .sidenav button {
        padding: 10px 20px;
        background-color: #4CAF50;
        /* Green button background color */
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .sidenav button:hover {
        background-color: #45a049;
        /* Darker green on hover */
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        color: #fff;
        /* Close button text color */
        cursor: pointer;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav label,
        .sidenav select {
            font-size: 16px;
        }

        .sidenav button {
            font-size: 16px;
        }
    }

    #searchInput {
        margin-left: 10px;
        width: 80%;
        /* Set the width to 100% to expand the input field to the container's width */
        padding: 10px;
        /* Add some padding for better visual appearance */
        border: 1px solid #ccc;
        /* Add a border with a light gray color */
        border-radius: 5px;
        /* Add rounded corners */
        font-size: 16px;
        /* Set the font size */
        outline: none;
        /* Remove the default outline on focus */
    }

    #searchInput::placeholder {
        color: #999;
        /* Customize the placeholder text color */
    }

    #searchInput:focus {
        border-color: #007BFF;
        /* Change the border color when the input is focused */
    }

    #applyFilters,
    #clearFilters {
        margin-left: 5px;
        display: inline;
        margin-right: 5px;
    }
</style>

<body style="margin:0px">


    <?php include('./views/prof_situation/navbar.php'); ?>

    <?php
    class ProfSituationView
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function displayProfSituation($data)
        {
            if (empty($data)) {
                echo "No data to display.";
                return;
            }
            // Start the HTML table
            echo "<table class='prof-situation-table' id='profSituationTable'>";
            echo "<tr><th>Professor<i id='sortNameButton' class='hide-column fas fa-sort-alpha-up'></i></th><th>Début Semestre <i id='sortSessionButton' class='hide-column fas fa-sort-numeric-up'></i></th><th>Fin Semestre</th><th>Situation<i id='sortSituationButton' class='hide-column fas fa-sort-alpha-up'></i></th><th>Grade <i id='sortGradeButton' class='hide-column fas fa-sort-numeric-up hide-column'></i></th><th class= 'hide-column' id='ac'>Actions</th></tr>";

            // Loop through the array and create rows for each record
            foreach ($data as $record) {
                echo "<tr>";
                // Display Professor's name and formatted date
                echo "<td>" . $this->getProfessorName($record['CodeProf']) . "</td>";
                echo "<td>" . $this->formatSessionDate($record['Sess'], 'Debsem') . "</td>";
                echo "<td>" . $this->formatSessionDate($record['Sess'], 'Finsem') . "</td>";
                echo "<td>{$record['Situation']}</td>";
                echo "<td>{$record['Grade']}</td>";
                echo "<td class='hide-column' >";
                echo "<a style='background-color: rgba(0, 0, 0, 0);' class='update-button' href='./views/prof_situation/update_prof_situation.php?CodeProf={$record['CodeProf']}&Sess={$record['Sess']}&Situation={$record['Situation']}&Grade={$record['Grade']}&name={$this->getProfessorName($record['CodeProf'])}'><i class='fas fa-pen fa-2x'></i></a>";
                echo "<a style='background-color: rgba(0, 0, 0, 0);' class='delete-button' href='?action=delete&codeProf={$record['CodeProf']}&Sess={$record['Sess']}'><i class='fas fa-trash fa-2x'></i></a>";
                echo "</td>";


                echo "</tr>";
            }

            // Close the HTML table
            echo "</table>";
        }

        // Fetch and display Professor's name
        private function getProfessorName($matricule)
        {
            $query = "SELECT Nom, Prenom FROM prof WHERE Matricule = ?";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $matricule);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                // Combine the "Nom" and "Prenom" fields to create the full name
                return $row['Nom'] . ' ' . $row['Prenom'];
            } else {
                return 'Unknown Professor'; // Provide a default if no match is found
            }
        }


        // Format the session date
        private function formatSessionDate($sess, $type)
        {
            $query = "SELECT DATE_FORMAT(Annee, '%Y') AS Annee, DATE_FORMAT($type, '%Y-%m-%d') AS SemDate FROM Sess WHERE Numero = ? ORDER BY Annee DESC";

            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $sess);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                return $row['SemDate'];
            } else {
                return 'Unknown Date'; // Provide a default if no match is found
            }
        }

    }
    ?>
    <?php
    include './config.php';
    $query = isset($_GET["query"]) ? $_GET["query"] : "";

    // Use prepared statements to prevent SQL injection
    $query = "%$query%";
    $stmt = $db->prepare("SELECT Nom, Prenom FROM prof WHERE Nom LIKE ? OR Prenom LIKE ?");
    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();

    $result = $stmt->get_result();
    $professors = [];

    while ($row = $result->fetch_assoc()) {
        $professors[] = $row;
    }
    // echo json_encode($professors);
    $stmt->close();
    ?>
    <div id="mySidenav" class="sidenav hide-column">
        <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span>
        <!-- Input field for autocomplete search -->
        <input type="text" id="searchInput" placeholder="Enter Prof name" oninput="autocompleteProfessors(this.value)">

        <!-- Container for displaying autocomplete results -->
        <div id="searchResults"></div>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" class="filter">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" class="filter">

        <script>
            function validateDateRange() {
                var startDate = new Date(document.getElementById("startDate").value);
                var endDate = new Date(document.getElementById("endDate").value);

                if (startDate > endDate) {
                    alert("End date should be greater than or equal to the Start date");
                    document.getElementById("endDate").value = "";
                    document.getElementById("startDate").value = "";
                }
            }

            $(document).ready(function () {
                $("#startDate, #endDate").change(validateDateRange);
            });
        </script>


        <label for="situationFilter">Situation:</label>
        <select id="situationFilter" class="filter">
            <option value="">All</option>
            <?php

            $query = "SELECT DISTINCT Situation FROM profsituation";
            $result = $db->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['Situation']}'>{$row['Situation']}</option>";
                }
                $result->free();
            } else {
                echo "Error: " . $db->error;
            }
            ?>
        </select>

        <label for="gradeFilter">Grade:</label>
        <select id="gradeFilter" class="filter">
            <option value="">All</option>
            <?php

            $query = "SELECT DISTINCT Grade FROM profsituation";
            $result = $db->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['Grade']}'>{$row['Grade']}</option>";
                }
                $result->free();
            } else {
                echo "Error: " . $db->error;
            }
            ?>
        </select>
        <button id="applyFilters">Apply Filters</button>
        <button id="clearFilters">Clear Filters</button>
    </div>
    <script>
        const selectedProfessors = [];

        // Function to add or remove a professor from the selected list
        function toggleProfessorSelection(professor) {
            const index = selectedProfessors.indexOf(professor);
            if (index === -1) {
                selectedProfessors.push(professor);
            } else {
                selectedProfessors.splice(index, 1);
            }
        }
        function autocompleteProfessors(query) {
            // Clear previous search results
            document.getElementById("searchResults").innerHTML = "";

            if (query === "") {
                return;
            }

            // Make an AJAX request to fetch matching professors
            const xhr = new XMLHttpRequest();
            const url = `autocomplete_professors.php?query=${query}`;
            xhr.open("GET", url, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    displayResults(data);
                }
            };

            xhr.send();
        }
        function filterTableByName(names) {
            console.log("Filtering by names:", names);
            const table = document.getElementById("profSituationTable");
            const dataRows = Array.from(table.querySelectorAll("tr"));
            console.log(dataRows);
            const headerRow = dataRows.shift();

            // Filter the table rows by name
            const filteredRows = dataRows.filter((row) => {
                const professorName = row.cells[0].textContent;
                return names.includes(professorName);
            });

            // Update the table with filtered rows
            const tableBody = table.querySelector("tbody");
            tableBody.innerHTML = '';

            filteredRows.forEach((row) => {
                tableBody.appendChild(row);
            });

            // Append the header row back to the table
            table.insertBefore(headerRow, tableBody);
        }

        function displayResults(data) {
            const resultsContainer = document.getElementById("searchResults");

            if (data.length === 0) {
                resultsContainer.style.color = 'white';
                resultsContainer.innerHTML = "No results found";
                return;
            }

            const ul = document.createElement("ul");
            var two = 0;
            data.forEach(function (professor) {
                if (two == 2) {
                    ul.appendChild(document.createElement("br"));
                    ul.appendChild(document.createElement("br"));
                    two = 0;
                }
                const input = document.createElement("input");
                input.style.display = "inline";
                const label = document.createElement("label");
                two++;
                label.style.display = "inline";
                label.style.marginRight = "10px";
                input.type = "checkbox";
                label.textContent = professor.Nom + " " + professor.Prenom;

                // Check the checkbox if the professor is in the selectedProfessors array
                if (selectedProfessors.includes(professor.Nom + " " + professor.Prenom)) {
                    input.checked = true;
                }

                input.addEventListener("click", function () {
                    // Call toggleProfessorSelection with the professor's name as an argument
                    toggleProfessorSelection(professor.Nom + " " + professor.Prenom);

                });

                ul.appendChild(input);
                ul.appendChild(label);
            });


            resultsContainer.appendChild(ul);
        }





    </script>
    <script>document.addEventListener("DOMContentLoaded", function () {
            sidenav = document.getElementById("mySidenav");
            sidenav.style.display = "none";
            // Get references to filter elements
            const startDateFilter = document.getElementById("startDate");
            const endDateFilter = document.getElementById("endDate");
            const situationFilter = document.getElementById("situationFilter");
            const gradeFilter = document.getElementById("gradeFilter");

            // Get the table element by ID
            const table = document.getElementById("profSituationTable");
            const dataRows = Array.from(table.querySelectorAll("tr"));
            const headerRow = dataRows.shift();

            // Function to filter and display rows based on filter criteria
            const applyFilters = () => {
                const startDate = startDateFilter.value;
                const endDate = endDateFilter.value;
                const selectedSituation = situationFilter.value;
                const selectedGrade = gradeFilter.value;

                // Filter the data based on filter criteria
                const filteredRows = dataRows.filter((row) => {
                    const rowStartDate = row.cells[1].textContent;
                    const rowEndDate = row.cells[2].textContent;
                    const rowSituation = row.cells[3].textContent;
                    const rowGrade = row.cells[4].textContent;


                    return (
                        (startDate === "" || rowStartDate >= startDate) &&
                        (endDate === "" || rowEndDate <= endDate) &&
                        (selectedSituation === "" || rowSituation === selectedSituation) &&
                        (selectedGrade === "" || rowGrade === selectedGrade)
                    );
                });

                // Update the table with filtered rows
                const tableBody = table.querySelector("tbody");
                tableBody.innerHTML = ''; // Clear the current table body

                filteredRows.forEach((row) => {
                    tableBody.appendChild(row);
                });

                // Append the header row back to the table
                table.insertBefore(headerRow, tableBody);
                // not null if(selectedProfessors )
                if (selectedProfessors.length > 0) {
                    filterTableByName(selectedProfessors);
                }
            };

            // Add a click event listener to the "Apply Filters" button
            const applyFiltersButton = document.getElementById("applyFilters");
            applyFiltersButton.addEventListener("click", applyFilters);

            // Add a click event listener to the "Clear Filters" button to reset filters

            const clearFiltersButton = document.getElementById("clearFilters");
            clearFiltersButton.addEventListener("click", () => {
                startDateFilter.value = "";
                endDateFilter.value = "";
                situationFilter.value = "";
                gradeFilter.value = "";
                document.getElementById("searchResults").innerHTML = "";
                // make search inpuyt empty
                document.getElementById("searchInput").value = "";
                selectedProfessors.length = 0;
                applyFilters();
            });
        });
    </script>

    <script>
        function openNav() {
            mySidenav.style.display = "";
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the table element by ID
            const table = document.getElementById("profSituationTable");

            // Get all the table rows
            const dataRows = Array.from(table.querySelectorAll("tr"));
            console.log(dataRows);

            // Get the table header row
            const headerRow = dataRows.shift();

            // Sorting buttons for each column
            const sortNameButton = document.getElementById("sortNameButton");
            const sortSessionButton = document.getElementById("sortSessionButton");
            const sortSituationButton = document.getElementById("sortSituationButton");
            const sortGradeButton = document.getElementById("sortGradeButton");

            let sortColumn = 0; // Default to sort by the second column (Session)
            let ascendingOrder = true; // Track sorting order (ascending by default);

            // Function to sort rows based on the selected column
            const sortRows = () => {
                // Create a copy of the original data rows array
                const dataRowsCopy = Array.from(document.getElementById("profSituationTable").querySelectorAll("tr"))

                // Sort data based on the selected column
                dataRowsCopy.sort((a, b) => {
                    const valueA = a.cells[sortColumn].textContent;
                    const valueB = b.cells[sortColumn].textContent;
                    console.log(valueA, valueB);

                    if (ascendingOrder) {
                        return valueA.localeCompare(valueB);
                    } else {
                        return valueB.localeCompare(valueA);
                    }
                });

                // Update the table with sorted rows
                const tableBody = table.querySelector("tbody");
                tableBody.innerHTML = '';

                dataRowsCopy.forEach(row => {
                    tableBody.appendChild(row);
                });

                ascendingOrder = !ascendingOrder;


                table.insertBefore(headerRow, tableBody);
            };


            sortNameButton.addEventListener("click", function () {
                sortColumn = 0;
                sortRows();
            });

            sortSessionButton.addEventListener("click", function () {
                sortColumn = 1;
                sortRows();
            });

            sortSituationButton.addEventListener("click", function () {
                sortColumn = 3;
                sortRows();
            });

            sortGradeButton.addEventListener("click", function () {
                sortColumn = 4;
                sortRows();
            });

        });
    </script>

    <script>
        // Function to update the page title based on selected filters
        function printTable() {
            var searchFilter = selectedProfessors;
            var startDateFilter = document.getElementById("startDate").value;
            var endDateFilter = document.getElementById("endDate").value;
            var situationFilter = document.getElementById("situationFilter").value;
            var gradeFilter = document.getElementById("gradeFilter").value;

            // Create a structured page title
            var pageTitle = "Professor Situations List";

            if (searchFilter && searchFilter.length > 0) {
                pageTitle += " for Professor: " + searchFilter;
            }

            if (startDateFilter && endDateFilter) {
                pageTitle += " (" + startDateFilter + " to " + endDateFilter + ")";
            }

            if (situationFilter) {
                pageTitle += " -Situation: " + situationFilter;
            }

            if (gradeFilter) {
                pageTitle += " - Grade: " + gradeFilter;
            }

            // Set the page title
            document.title = pageTitle;
            window.print();
        }
    </script>

    <script>

        function ExportToExcel(type, fn, dl) {
            document.querySelectorAll('th')[5].innerText = "";
            var elt = document.getElementById('profSituationTable');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            document.querySelectorAll('th')[5].innerText = "Actions";

            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
        }
    </script>
</body>

</html>