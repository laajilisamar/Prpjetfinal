<?php include('header.php');?>
<?php include('dbcon.php');?>

<?php
if(isset($_GET['CodeDep'])){
    $CodeDep = $_GET['CodeDep'];

    $query = "SELECT * FROM `departements` WHERE `CodeDep` = '$CodeDep'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
if(isset($_POST['update_Departement'])){
    if(isset($_GET['CodeDep_new'])){
        $CodeDepnew = $_GET['CodeDep_new'];
    }

    $departement = $_POST['Departement'];
    $responsable = $_POST['Responsable'];
    $matpof = $_POST['MatProf'];
    $departementarab = $_POST['DepartementARAB'];

    $query = "UPDATE `departements` SET `Departement`='$departement', `Responsable`='$responsable', `MatProf`='$matpof', `DepartementARAB`='$departementarab' WHERE `CodeDep` = $CodeDepnew";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg=you have successfully updated the data');
    }
}
?>

<form action="update_page_1.php?CodeDep_new=<?php echo $CodeDep; ?>" method="post">
    <div class="form-group">
        <label for="Departement">Departement</label>
        <input type="text" name="Departement" class="form-control" value="<?php echo $row['Departement']?>">
    </div>

    <div class="form-group">
        <label for="Responsable">Responsable</label>
        <input type="text" name="Responsable" class="form-control" value="<?php echo $row['Responsable']?>">
    </div>

    <div class="form-group">
        <label for="MatProf">MatProf</label>
        <input type="text" name="MatProf" class="form-control" value="<?php echo $row['MatProf']?>" >
    </div>

    <div class="form-group">
        <label for="DepartementARAB">DepartementARAB</label>
        <input type="text" name="DepartementARAB" class="form-control" value="<?php echo $row['DepartementARAB']?>">
    </div>

    <input type="submit" class="btn btn-success" name="update_Departement" value="UPDATE">
</form>
<?php include ('footer.php');?>
