<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');
$con = new Connection();
$con = $con->getConnection();
$newHeureSup = new HeureSup($con);


if(isset($_POST['modifierhs'])){

   
        $session = $_POST['session'];
        $matprof = $_POST['matprof'];
        $ci = $_POST['ci'];
        $tp = $_POST['tp'];
        $tot = $_POST['ci'] + $_POST['tp'];
    
        $newHeureSup->modifierHeureSup(
            $session,
            $matprof,
            $ci,
            $tp,
            $tot
        );



    exit();
}
else {
    $session = isset($_GET['session']) ? $_GET['session'] : 0; // 0 is a default value
    $matprof = isset($_GET['matprof']) ? $_GET['matprof'] : 0;
 
    $sql = "SELECT * FROM HeureSup WHERE Session = ? AND MatProf = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $session, $matprof);
    $stmt->execute();
    $stmt->bind_result($session, $matprof, $ci, $tp,$tot);
       
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
        $heures = $result->fetch_assoc();
    } else {
        echo "data not found. <a href='afiiche.php'>Back to List</a>";
    }
    $stmt->close();
}

?>



<div >
<form method="post">

<h3>Modifier Heure Sup</h3>


    <label for="ci">Session : <?php echo $heures["Session"]; ?></label><br>
    <input class="form-control"  type="hiden" name="session" id="ci" value="<?php echo $heures["Session"]; ?>"  ><br>


    <label for="tp">Matricule Prof : <?php echo $heures["MatProf"]; ?></label><br>
    <input class="form-control"  type="hiden" name="matprof" id="tp" value="<?php echo $heures["MatProf"]; ?>"   ><br>

    
    <label for="ci">CI</label><br>
    <input class="form-control"  type="number" step="0.05" name="ci" id="ci" value="<?php echo $heures["CI"]; ?>"  ><br>


    <label for="tp">TP</label><br>
    <input class="form-control"  type="number" step="0.05" name="tp" id="tp" value="<?php echo $heures["TP"]; ?>"   ><br>


    <br>
    <input class="btn btn-primary" type="submit" value="Modifier" name="modifierhs"><br>

    <br>
    <a href='affiche.php'>Retourner a la liste </a>
    
</form>
</div>
