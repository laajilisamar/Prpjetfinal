<?php
define('DB_SERVER', 'localhost');
define('DB_USERMatriculeProf', 'root');
define('DB_PASSWORD', '');
define('DB_MatriculeProf', 'PDI3');
 
$link = mysqli_connect(DB_SERVER, DB_USERMatriculeProf, DB_PASSWORD, DB_MatriculeProf);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>