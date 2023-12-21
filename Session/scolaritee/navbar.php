<style>
    .print {
        margin-left: 10px;
    }

    .fa-print {
        margin-left: 5px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light hide_column" id="nav" style="background-color: #c0d7f8;">
    <a class="navbar-brand" href="#">SessionsApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php">Create</a>
            </li>
        </ul>
        <!-- Dynamic title placeholder -->
        <span class="navbar-text" id="dynamicTitle" style="font-size: 24px; text-align: center; width:50%; margin-right:150px">Dynamic Title</span>
        <?php
        $page = basename($_SERVER['PHP_SELF']);
        if ($page === "index.php") {
            echo '
            <form class="form-inline my-2 my-lg-0" style="width:410px">
                <input class="form-control mr-sm-2" id="searchAnnee" type="text" placeholder="Filter by Année" onkeydown="return event.key != \'Enter\';">
                <button class="btn btn-outline-danger my-2 my-sm-0 cancel" id="cancelSearch" type="button">Cancel</button>
                <button class="btn btn-warning my-2 my-sm-0 print" id="printPdfButton" onclick="myPrint()">Print PDF<i class="fa-solid fa-print"></i></button>
            </form>
            ';
        }
        ?>


    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script>
    function updateNavbarTitle() {

        const currentURL = window.location.href;


        const titleElement = document.getElementById("dynamicTitle");


        if (currentURL.includes("create.php")) {
            titleElement.textContent = "Create Session";
            titleElement.style.marginRight = "30%";
        } else if (currentURL.includes("update.php")) {
            titleElement.textContent = "Update Session";
            titleElement.style.marginRight = "30%";
        } else {
            titleElement.textContent = "Session List";
            titleElement.style.marginRight = "1%";
        }
    }
    updateNavbarTitle();

    function myPrint() {
        window.print();
    }
</script>
