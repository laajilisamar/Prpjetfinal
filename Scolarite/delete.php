<?php

require "ConnexionPDO.php";
if(isset($_GET['id'])){
$req="DELETE FROM ratvol WHERE id = '".$_GET['id']."'";
$idcon->exec($req);

if($idcon->query($req)){
	$_SESSION['success'] = 'Volentaire deleted successfully';
}else{
	$_SESSION['error'] = 'Something went wrong in deleting ratvol ';
}


header('location: Affiche.php');
}
?>
