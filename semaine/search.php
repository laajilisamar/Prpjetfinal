<?php
include('HCF/header.php');
include('sqlFunctions.php');
$functions = new functions();
include('HCF/container.php');
$Id=$_GET['GeneralSearch'];
/*$StartDate=$_GET['StartDate'];
$EndDate=$_GET['EndDate'];
$Id=$_GET['Id'];
$Session=$_GET['Session'];*/
?>
<body>
    <div>
        <div class='form-group'></div>
        <table class='table'>
            <thead class='thead-dark'>
                <tr class="table-success">
                    <th>Week Number</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody >
                <?php 
                    if (!empty($Id) ) {
                        $DataList = $functions->selectById($Id);
                    }
                    /*if (!empty($Session) ) {
                        $DataList = $functions->selectBySession($Session);
                    }
                    if (!empty($StartDate) && !empty($EndDate)) {
                        $DataList = $functions->selectByDate($StartDate,$EndDate);
                    }
                    if (!empty($StartDate)) {
                        $DataList = $functions->selectByStartDate($StartDate);
                    }
                    if (!empty($EndDate)) {
                        $DataList = $functions->selectByEndDate($EndDate);
                    }
                    if (!empty($GeneralSearch)) {
                        $DataList = $functions->generalSelect($GeneralSearch);
                    }*/
                    foreach ($DataList as $key) {
                ?>
                <tr class="table-success">
                    <td><?php echo $key['NumSem'] ?></td>
                    <td><a href="deleteSemaine.php?id=<?php echo $key["NumSem"]; ?>"><input type="submit" name="delete" value="delete"/></a></td>
                    <td><a type="button" class="bi bi-eye-fill" data-toggle="modal" data-target="#detail<?php echo $key['NumSem']?>"><i class="fa fa-search"></i></a></td>
                    <td><a href="editSemaine.php?id=<?php echo $key["NumSem"]; ?>"><input type="submit" name="edit" value="edit"/></a></td>
                    <div class="modal fade product_view" id="detail<?php echo $key['NumSem'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center><h3>Week Number : <?php echo $key['NumSem'] ?></h3></center>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col">
                                        <h6>Start Date</h6>
                                        <?php echo $key['DateDebut']?>
                                    </div>
                                    <div class="col">
                                        <h6>End Date</h6>
                                        <?php echo $key['DateFin']?>
                                    </div>
                                    <div class="col">
                                        <h6>Session</h6>
                                        <?php echo $key['Session']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include('HCF/footer.php');
?>