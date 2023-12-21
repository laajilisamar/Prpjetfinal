<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="bootstrap-icons-1.10.3/bootstrap-icons.css"/>
<script src="js/controle.js"></script>
<?php
    include('HCF/header.php');
    include('sqlFunctions.php');
    $functions = new functions();
    include('HCF/container.php');
    if (isset($_POST['add'])){
        $NumSem = $_POST['NumSem'];
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $Session = $_POST['Session'];
        $functions->AddSemaine($NumSem,$StartDate,$EndDate,$Session);
        header('location:index.php');
    }
?>
<body>
    <div class='container'>
    <h3>New Product</h3>
    <div class="row">
        <div class="col-sm-4">
            <form method='POST' enctype="multipart/form-data">
                <div class="form-group"></div>
                <div class="form-group">
                    <label for='NumSem'>Week Number</label>
                    <input type='text' name='NumSem' placeholder='put the number of the week' class='form-control' require/>
                </div>
                <div class="form-group">
                    <label for='StartDate'>Start Date</label>
                    <input type='date' name='StartDate' class='form-control' onchange="updateEndDateMin(this.value );"/>
                </div>
                <div class="form-group">
                    <label for='EndDate'>End Week</label>
                    <input type='date' name='EndDate' id="EndDate" class='form-control' disabled />
                </div>
                <div class="form-group">
                    <label for='Session'>Session</label>
                    <input type='text' name='Session' placeholder='put the number of the session' class='form-control' require/>
                </div>
                <div>
                    <button type="submit" name="add" class="btn btn-default">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="form-group"></div>
    <div class="form-group"></div>
</body>
<?php
    include('HCF/footer.php');
?>
