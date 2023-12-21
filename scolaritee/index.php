<?php
include 'db.php';

$sql = "SELECT * FROM `session`";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Session List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @media (max-width: 768px) {
            .btn {
                margin-bottom: 10px;
                width: 100%;
            }
        }

        @media print {
            .hide_column {
                display: none;
            }

            div[style="max-height: 550px; overflow-y: auto;"] {
                max-height: none !important;
                overflow-y: visible !important;
            }

            .filterDiv {
                display: none;
            }

        }

        body {
            padding-bottom: 30px;
            overflow-y: hidden;
        }

        #header-row {
            position: sticky;
            top: 0;
            background-color: #e0e0e0;
            z-index: 1;
        }

        .fa-solid {
            margin-left: 30px;
        }

        .upd {
            margin-right: 10px;
            padding: 8px;
            width: 80px;
        }

        .del {
            padding: 8px;
            width: 80px;
        }

        .labelStart {
            color: #2E8B57;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .labenEnd {
            color: #2E8B57;
            margin-bottom: 5px;
            font-weight: bold;

        }

        .filter {
            padding: 8px;
            border: 2px solid #2E8B57;
            border-radius: 8px;
            margin-bottom: 15px;
            width: 250px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .filter:focus {
            outline: none;
            border-color: #FFA500;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
        }

        .applyFilt {
            color: #fff;

        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="mt-5 ml-3 mr-3">
        <div class="filterDiv">
            <label for="startDate" class="labelStart">Start Date:</label>
            <input type="date" id="startDate" class="filter">
            <label for="endDate" class="labenEnd">End Date:</label>
            <input type="date" id="endDate" class="filter">
            <button class="btn btn-outline-danger cancelFilt my-2 my-sm-0 cancel" id="cancelFilter" type="button">Cancel</button>
            <button class="btn btn-success my-2 applyFilt my-sm-0 print" id="applyFilters" type="button">Apply Filters</button>
        </div>
        <div style="max-height: 550px; overflow-y: auto;">
            <table class="table table-bordered table-striped" id="myTable">
                <thead>
                    <tr id="header-row" style="border-bottom:3px solid #2E8B57;">
                        <th>Année<i id="sortAnne" class="fa-solid fa-sort"></i></th>
                        <th>Semaine<i id="sortSemaine" class="fa-solid fa-sort"></i></th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Début Semestre</th>
                        <th>Fin Semestre</th>
                        <th>Année A</th>
                        <th>Année AB</th>
                        <th>Semaine AB</th>
                        <th class="hide_column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Annee"] . "</td>";
                            echo "<td>" . $row["Sem"] . "</td>";
                            echo "<td>" . $row["Debut"] . "</td>";
                            echo "<td>" . $row["Fin"] . "</td>";
                            echo "<td>" . $row["Debsem"] . "</td>";
                            echo "<td>" . $row["Finsem"] . "</td>";
                            echo "<td>" . $row["Annea"] . "</td>";
                            echo "<td>" . $row["Anneab"] . "</td>";
                            echo "<td>" . $row["SemAb"] . "</td>";
                            echo "<td class='hide_column' style='width: 204px;'>";
                            echo "<a class='btn btn-primary upd' href='update.php?id=" . $row["Numero"] . "' style=''>Update</a>";
                            echo "<a class='btn btn-danger del' href='#' onclick='confirmDelete(" . $row["Numero"] . ")' style=''>Delete</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No sessions found.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete(recordId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'delete.php?id=' + recordId;
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {

            // Get references to filter elements
            const startDateFilter = document.getElementById("startDate");
            const endDateFilter = document.getElementById("endDate");


            // Get the table element by ID
            const table = document.getElementById("myTable");
            const dataRows = Array.from(table.querySelectorAll("tr"));
            const headerRow = dataRows.shift();

            // Function to filter and display rows based on filter criteria
            const applyFilters = () => {
                const startDate = startDateFilter.value;
                const endDate = endDateFilter.value;


                // Filter the data based on filter criteria
                const filteredRows = dataRows.filter((row) => {
                    const rowStartDate = row.cells[4].textContent;
                    const rowEndDate = row.cells[5].textContent;



                    return (
                        (startDate === "" || rowStartDate >= startDate) &&
                        (endDate === "" || rowEndDate <= endDate)
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

            };

            function validateDateRange() {
                var startDate = new Date(document.getElementById("startDate").value);
                var endDate = new Date(document.getElementById("endDate").value);

                if (startDate > endDate) {
                    alert("End date should be greater than or equal to the Start date");
                    document.getElementById("endDate").value = "";
                    document.getElementById("startDate").value = "";
                }
            }

            $(document).ready(function() {
                $("#startDate, #endDate").change(validateDateRange);
            });

            // Add a click event listener to the "Apply Filters" button
            const applyFiltersButton = document.getElementById("applyFilters");
            applyFiltersButton.addEventListener("click", applyFilters);

            // Add a click event listener to the "Clear Filters" button to reset filters

            const clearFiltersButton = document.getElementById("cancelFilter");
            clearFiltersButton.addEventListener("click", () => {
                startDateFilter.value = "";
                endDateFilter.value = "";
                applyFilters();
            });
        });

        // sort bel Annee
        $(document).ready(function() {
            var isSortAnnéeAscending = false;
            $("#sortAnne").click(function() {
                var rows = $("tbody > tr").get();
                rows.sort(function(a, b) {
                    var keyA = $(a).children("td:eq(0)").text();
                    var keyB = $(b).children("td:eq(0)").text();
                    var comparison = parseInt(keyA) - parseInt(keyB);
                    if (!isSortAnnéeAscending) {
                        comparison *= -1;
                    }
                    return comparison;
                });
                $.each(rows, function(index, row) {
                    $("table > tbody").append(row);
                });

                isSortAnnéeAscending = !isSortAnnéeAscending;
            });
        });
        // fin sort bel Annee

        // sort bel Semaine
        $(document).ready(function() {
            var isSortSemaineAscending = false;
            $("#sortSemaine").click(function() {

                var rows = $("tbody > tr").get();
                rows.sort(function(a, b) {
                    var keyA = $(a).children("td:eq(1)").text();
                    var keyB = $(b).children("td:eq(1)").text();

                    var comparison = parseInt(keyA) - parseInt(keyB);

                    if (!isSortSemaineAscending) {
                        comparison *= -1;
                    }
                    return comparison;
                });

                $.each(rows, function(index, row) {
                    $("table > tbody").append(row);
                });

                isSortSemaineAscending = !isSortSemaineAscending;
            });
        });
        // fin sort bel Semaine

        function filterTable() {
            var input, filter, table, tbody, tr, td, i, txtValue;
            input = document.getElementById("searchAnnee");
            filter = input.value.toLowerCase();
            table = document.getElementsByTagName("table")[0];
            tbody = table.getElementsByTagName("tbody")[0];
            tr = tbody.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("searchAnnee").addEventListener("keyup", filterTable);

        document.getElementById("cancelSearch").addEventListener("click", function() {
            var input = document.getElementById("searchAnnee");
            input.value = "";
            filterTable();
        });
    </script>
</body>

</html>