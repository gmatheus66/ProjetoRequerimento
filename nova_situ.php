<?php
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";

$status = $_POST['status.php'];
$obs = $_POST['obs'];

$smtt = $con->prepare("SELECT  FROM heroku_70137967cfc9460.REQUERIMENTO");
$smtt->execute();
$func = $smtt->fecth();

?>