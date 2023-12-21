
<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');
$con = new Connection();
$con = $con->getConnection();
$newHeureSup = new HeureSup($con);

if(isset($_POST['ajouterhs'])){

    $total = $_POST['tp'] +  $_POST['ci'];
    $newHeureSup->ajouterHeureSup(
        $_POST['session'],
        $_POST['matprof'],
        $_POST['ci'],
        $_POST['tp'],
        $total,
        $con
    );
    exit();
}

?>


<div >
<form method="post">

<h3>Ajouter Heure Sup</h3>


    <label class="form-label" for="session">Session</label><br>
    <input type="number" class="form-control"  name="session" id="session" placeholder="Entez session" required ><br>


    <label class="form-label" for="matprof">Matricule Prof</label><br>
    <input type="number" class="form-control"   name="matprof" id="matprof" placeholder="Entez maricule prof" required ><br>    


    <label class="form-label" for="ci">CI</label><br>
    <input type="number" class="form-control"  step="0.5" name="ci" id="ci" placeholder="Entez CI"  ><br>


    <label class="form-label" for="tp">TP</label><br>
    <input type="number" class="form-control"  step="0.5" name="tp" id="tp" placeholder="Entez TP"  ><br>


    <br>
    <input class="btn btn-primary" type="submit" value="Ajouter" name="ajouterhs"><br><br>
    <a href='affiche.php'>Retourner a la liste </a>

    
</form>
</div>
