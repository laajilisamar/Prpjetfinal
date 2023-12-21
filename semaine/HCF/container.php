
<?php
if (isset($_POST['search'])) {
    $generalSearch=$_POST['searchAria'];
    header('location:search.php?GeneralSearch='.$generalSearch);
}
?>
<body style="background-color:#cccc">
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="col-3"></div>
            <div class="col-5 px-5 ">
                <form class="collapse navbar-collapse" id="navbarSupportedContent" method="post">
                    <i class="bi bi-funnel-fill"></i>
                    <input class="form-control mr-4 h-25" type="search" placeholder="Search" aria-label="Search" name='searchAria'>
                    <button class="badge btn btn-outline-secondary" name="search" type="submit">Search</button>
                </form>
            </div>
            
            <div class="col-2 ">
            </div>
        </nav>
        <nav class="navbar navbar-expand navbar-dark bg-dark " >
            <div class="col-1"></div>
            <div class="col-7">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <h5 class="nav-item"><a href='index.php' class="nav-link">Home</a></h5>
                    </ul>
                </div>
            </div>
            </div>
        </nav>
    </div>
    <div class="col py-5"></div>
    <div class="col py-5"></div>
</body>