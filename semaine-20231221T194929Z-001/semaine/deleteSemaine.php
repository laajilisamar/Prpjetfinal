<?php
    include('sqlFunctions.php');
    $functions = new functions();
    $id=$_GET['id'];
    $functions->deleteSemaine($id);
    header('location:index.php');
?>