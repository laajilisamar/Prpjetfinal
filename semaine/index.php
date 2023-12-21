<?php
include('sqlFunctions.php');
$functions = new functions();
include('HCF/header.php');
include('HCF/container.php');
?>
<body>
    <div>
        <a href="createSemaine.php"><input type="submit" name="create" value="create"/></a>
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
                    $DataList = $functions->select_data();
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