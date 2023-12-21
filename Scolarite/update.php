<?php
require "ConnexionPDO.php";
if(isset($_POST['update'])){
$id=$_POST['id'];
$NumRatV=$_POST['NumRatV'];
$MatProf=$_POST['MatProf'];
$DateRat=$_POST['DateRat'];
$Seance=$_POST['Seance'];
$Session=$_POST['Session'];
$Salle=$_POST['Salle']; 
$Jour=$_POST ['Jour'] ;
$CodeClasse=$_POST  ['CodeClasse'] ;
$CodeMatiere=$_POST ['CodeMatiere'] ;
$Etat=$_POST  ['Etat'] .
$req="UPDATE ratvol SET NumRatV='$NumRatV', MatProf='$MatProf', DateRat='$DateRat',Seance='$Seance',
Session='$Session',Salle='$Salle',Jour='$Jour',CodeClasse='$CodeClasse',CodeMatiere='$CodeMatiere',Etat='$Etat'
  WHERE id = '$id'";
$idcon->exec($req);
if($idcon->query($req)){
  $_SESSION['success'] = 'Volentaire updated successfully';
}

else{
  $_SESSION['error'] = 'Something went wrong in updating Volentaire';
}
}
header('location:Affiche.php');
?>