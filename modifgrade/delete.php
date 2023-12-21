<?php

    if(isset($_GET["MatProf"])){
        $matProf = $_GET["MatProf"];
        
        $pdo = new PDO("mysql:host=localhost;dbname=scolarite1", "root", "");

        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM modifgrade WHERE MatProf = '$matProf'";

        $res = $pdo->exec($sql);
        if ($res > 0) {
            header("location: select.php");
        } else {
            echo "Error";
        }

        $pdo = null;
    } else {
        echo "error";
    }

?>
