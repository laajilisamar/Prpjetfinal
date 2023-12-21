<?php


class HeureSup {
    protected $bd;
    public function __construct($basededonne) {
        $this->bd = $basededonne;
    }

    public function ajouterHeureSup($session, $matprof, $ci, $tp, $tot,$con) {
        $query = "select * from heuresup where Session = '$session' and MatProf = '$matprof'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            echo '<h4>Cette heureSup existe déjà</h4>';
        }
        else{

        $query = "INSERT INTO HeureSup VALUES ('$session', '$matprof', '$ci', '$tp', '$tot')";
        $stmt = $this->bd->prepare($query);
        $stmt->execute();
        echo "<h4>Ajouté avec succées ! </h4> <br> <a href='affiche.php'>Retourner a la liste </a>";
        header("affiche.php");
        $stmt->close();
        }
    }

    public function supprimerHeureSup($session, $matprof) {
        $query = "DELETE FROM HeureSup WHERE Session = '$session' AND MatProf = '$matprof'";
        $stmt = $this->bd->prepare($query);
        $stmt->execute();
        $stmt->close();
    }


    public function modifierHeureSup($session, $matprof, $ci, $tp, $tot) {
        $query = "UPDATE HeureSup SET CI = '$ci', TP = '$tp', Tot = '$tot' where Session = '$session' and MatProf = '$matprof'";
        $stmt = $this->bd->prepare($query);
        $stmt->execute();
        echo "<h4>Modifié avec succées ! </h4> <br> <a href='affiche.php'>Retourner a la liste </a>";
        header("affiche.php");
        $stmt->close();
    }


    public function afficherrHeureSup($con){
        $query = "select * from heuresup ";
        $result = mysqli_query($con,$query);
        return $result ;
    }


    public function afficherrHeureSupFiltre($con,$session,$matprof){
        if($session == null && 
         $matprof == null){
            $query = "select * from heuresup ";}
        elseif ($session == null) {
            $query = "select * from heuresup where MatProf = '$matprof'";
        }
        elseif ($matprof == null) {
            $query = "select * from heuresup where Session = '$session'";
        }
        else{
            $query = "select * from heuresup WHERE Session = '$session' AND MatProf = '$matprof'";
        }
        $result = mysqli_query($con,$query);
        return $result ;
    }
        

    

}
?>