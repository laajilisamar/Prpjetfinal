<?php
include('header.php');
include('Connection.php');
include('HeureSup.php');
$con = new Connection();
$con = $con->getConnection();
$newHeureSup = new HeureSup($con);

if(isset($_POST['rechercher'])){


    if(isset($_POST['checkbox_session'])){$session_value = $_POST['checkbox_session'];}
    else {$session_value = null;}
    
    if(isset($_POST['checkbox_matprof'])){$matprof_value = $_POST['checkbox_matprof'];}
    else{$matprof_value = null;}
    
    $result = $newHeureSup->afficherrHeureSupFiltre($con,$session_value,$matprof_value);
  
}
else{
    $result = $newHeureSup->afficherrHeureSup($con);

}

?>

<a href='ajouter.php'>Ajouter</a><br>
<form method = "post" id="recherche">
    <label>Rechercher avec : </label><br>

    <input type="checkbox"  name="check_list[]" value="session" id="checkbox_session" onclick="sessionClicheked()">
    <label for="checkbox_session">Session</label>
    <br>

    <input type="checkbox"  name="check_list[]" value="matfprof" id="checkbox_matprof" onclick="matprofClicheked()">
    <label for="checkbox_matprof">Matricule Prof</label>
    <br>

    

    
    <input class="btn btn-primary" type="submit" value="Rechercher" name="rechercher">

</form>


<?php

if(mysqli_num_rows($result)>0){
    
                
    echo
    " <table id='table' class='table'>
      <tr><th scope='col'>SESSION</th> <th scope='col'>MAT PROF</th><th scope='col'>CI</th><th scope='col'>TP</th><th scope='col'>TOT</th><th scope='col'>Supprimer</th><th scope='col'>Modifier</th></tr> ";




        while ($row = mysqli_fetch_assoc($result)) {

            $session = $row['Session'];
            $matprof = $row['MatProf'];
            $ci = $row['CI'];
            $tp = $row['TP'];
            $tot = $row['Tot'];
           


            echo "<tr>";
            echo "<td>  {$session}   </td>";
            echo "<td>  {$matprof}   </td>";
            echo "<td>  {$ci}        </td>";
            echo "<td>  {$tp}        </td>";
            echo "<td>  {$tot}       </td>";
          

            echo "<td> <a href='supp.php?session={$session}&matprof={$matprof}'>Supprimer</a> </td>";
            echo "<td> <a href='modifier.php?session={$session}&matprof={$matprof}'>Modifier</a> </td>";
        
                
            echo "</tr>";  
            
        
        }

        echo "</table>";

    }
        

    else{
        echo "<h4>No Data FOUND ! </h4>";
        }
    
    







?>



<script> 
  
  
  
  function sessionClicheked(){
    var checkboxsession = document.getElementById("checkbox_session");
    if(checkboxsession.checked == true && document.getElementsByName("checkbox_session").length == 0){
        
      var newinput = document.createElement('input');
      newinput.type = "number";
      newinput.name = "checkbox_session";
      var form = document.getElementById("recherche");
      const labelSession = document.querySelector('label[for="checkbox_session"]');
      labelSession.parentNode.insertBefore(newinput, labelSession.nextSibling);
      
  
    }
    else {if(document.getElementsByName("checkbox_session").length >0){
      var m = document.getElementsByName("checkbox_session")[0];
      var form = document.getElementById("recherche");
      form.removeChild(m);
    }}
  }

  function matprofClicheked(){
    var checkboxsession = document.getElementById("checkbox_matprof");
    if(checkboxsession.checked == true && document.getElementsByName("checkbox_matprof").length == 0){
        
      var newinput = document.createElement('input');
      newinput.type = "number";
      newinput.name = "checkbox_matprof";
      var form = document.getElementById("recherche");
      const labelmatprof = document.querySelector('label[for="checkbox_matprof"]');
      labelmatprof.parentNode.insertBefore(newinput, labelmatprof.nextSibling);
      
  
    }
    else {if(document.getElementsByName("checkbox_matprof").length >0){
      var m = document.getElementsByName("checkbox_matprof")[0];
      var form = document.getElementById("recherche");
      form.removeChild(m);
    }}
  }

  

 
  </script>

</script>