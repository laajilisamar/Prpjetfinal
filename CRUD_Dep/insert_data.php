<?php

include('dbcon.php');

if (isset($_POST['add_departemet'])) {
   
$Dep = $_POST['Departement'];
$Res = $_POST['Responsable'];
$Matp = $_POST['MatProf'];
$DepARAB = $_POST['DepartementARAB'];

if($Dep == "" || empty($Dep)){
   header('location:index.php?message=you need to fill in the Departement!');
}

else{

   $query = "INSERT INTO `departements`( `Departement`, `Responsable`, `MatProf`, `DepartementARAB`) VALUES ('[$Dep]','[$Res]','[$Matp]','[$DepARAB]')";

   $result = mysqli_query($connection,$query);

   if(!$result){

      die("Query Failed".mysqli_error());
   }

   else{
      header('location:index.php?insert_msg= you data has been added succssfully');
   }

}


}
?>
