<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    nav {
        font-family: Arial, sans-serif;
        background-color: #333;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        display: inline;
    }

    a {
        display: inline-block;
        padding: 14px 16px;
        text-decoration: none;
        color: white;
    }

    a:hover {
        background-color: #555;
    }

    #navbar-title {

        font-size: 30px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: white;
    }

    #search-container {
        margin-right: 20px;
        display: flex;
        align-items: center;
    }

    #search-input {
        border: 1px solid #ccc;
        padding: 6px;
        border-radius: 4px;
        margin-right: 10px;
    }
</style>

<nav id="nav" class="hide-column">
    <ul>
        <li><span style="font-size:30px; cursor:pointer; color:white;" id="filter" onclick="openNav()">&#9776;</span>
        </li>
        <li><a href="http://localhost/scolarite/">Home</a></li>
        <li><a href="http://localhost/scolarite/about.php">About</a></li>
        <li><a href="http://localhost/scolarite/views/prof_situation/create_prof_situation.php">Create</a></li>
    </ul>
    <div id="navbar-title">Title in the Middle</div>
    <?php
    if (basename($_SERVER['PHP_SELF']) == "index.php") {
        echo '
    <div>
        <button id="generatePdfButton" onclick="printTable()" style="background-color: transparent; border: none;">
            <i class="fa fa-file-pdf-o" style="font-size:48px; color:red; cursor: pointer;" 
                onmouseover="this.style.color=\'#ffffff\'"
                onmouseout="this.style.color=\'red\'">
            </i>
        </button>
        <button id="generateExcelButton" onclick="ExportToExcel()" style="background-color: transparent; border: none;">
            <i class="fa fa-file-excel-o" style="font-size:48px; color:green; cursor: pointer;"
                onmouseover="this.style.color=\'#ffffff\'"
                onmouseout="this.style.color=\'green\'">
            </i>
        </button>
    </div>
    ';
    }
    ?>


</nav>

<script>


    // Function to update the title based on the URL
    function updateNavbarTitle() {
        // Get the current URL
        const currentURL = window.location.href;

        // Get the element with the ID "navbar-title"
        const titleElement = document.getElementById("navbar-title");
        const filterElement = document.getElementById("filter");


        // Check the URL and set the title accordingly
        if (currentURL.includes("about.php")) {
            titleElement.textContent = "About Page";
            filterElement.style.display = "none";
            titleElement.style.marginRight = "45%";
        } else if (currentURL.includes("create_prof_situation.php")) {
            titleElement.textContent = "Create Professor Situation";
            filterElement.style.display = "none";
            titleElement.style.marginRight = "37%";
        } else if (currentURL.includes("update_prof_situation.php")) {
            titleElement.textContent = "Update Professor Situation";
            filterElement.style.display = "none";
            titleElement.style.marginRight = "36%";
        } else {
            titleElement.textContent = "Prof Situation List";
            titleElement.style.marginRight = "18%";
        }
    }

    // Call the function to set the initial title
    updateNavbarTitle();
</script>