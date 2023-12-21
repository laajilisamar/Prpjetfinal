<?php
ini_set('display_errors', "1");
error_reporting(E_ALL);
require "db_connection.php";
$id = $_GET["NumAbs"];
$request = "delete from absensg where numabs = $id";
$result = $conn->exec($request);
if ($result > 0) {
    header("location:index.php");
} else
    echo "problem";
?>