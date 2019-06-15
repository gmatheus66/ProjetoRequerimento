<?php
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";
include "init.php";

$status = $_POST['status.php'];
$obs = $_POST['obs'];
$protocolo = $_GET['protocolo'];
try{
	$smtt = $con->prepare("SELECT REQ_STATUS, REQ_TIPO,REQ_MOTIVO,REQ_OBSERVACAO,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO WHERE REQ_PROTOCOLO = ?;");
	$smtt -> bindParam(1, $protocolo); 
	$smtt->execute();
	$func = $smtt->fecth();

	$add = $con->prepare("INSERT INTO REQUERIMENTO ()");
}catch(Exception $e){

}


?>