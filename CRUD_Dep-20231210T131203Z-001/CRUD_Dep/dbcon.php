<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","projet");

$connection =mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if (!$connection){
    die("Conection Failed");
}

?>