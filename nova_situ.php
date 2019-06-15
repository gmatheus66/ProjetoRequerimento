<?php
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";
include "init.php";

$status = $_POST['status.php'];
$obs = $_POST['obs'];
$protocolo = $_GET['protocolo'];

$status_nome;
$sit_ant;

try{
	if($status == 0){
		$status_nome = "ABERTO";
	}else if($status == 1){
		$status_nome = "FECHADO";
	}else{
		$status_nome = "ANÁLISE";
	}

	$hist_sit = $con -> prepare("SELECT HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, HTS_ID FROM heroku_70137967cfc9460.HISTORICO_SITUACAO");
	$hist_sit -> execute();
	$oson = $hist_sit -> fecth(); 

	foreach ($oson as $data ) {
		$sit_ant = $data[' HTS_ID_SIT_ANTERIOR']; 
	}

	$smtt = $con->prepare("SELECT REQ_STATUS, REQ_TIPO,REQ_MOTIVO,REQ_OBSERVACAO,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO WHERE REQ_PROTOCOLO = ?;");
	$smtt -> bindParam(1, $protocolo); 
	$smtt->execute();
	$func = $smtt->fecth();

	$add_st = $con->prepare("UPDATE REQUERIMENTO SET REQ_STATUS = ? WHERE REQ_REQUERIMENTO = ?;");
	$add_st -> bindParam(1, $status_nome);
	$add_st -> bindParam(2, $protocolo);
	$add_st->execute();

	$add_si = $con-> prepare("INSERT INTO HISTORICO_SITUACAO(HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, REQ_PROTOCOLO, FNC_CPF) VALUES(?, ?, ?, ?) WHERE REQ_REQUERIMENTO = ?;");
	$add_si -> bindParam(1, $sit_ant);
	$add_si -> bindParam(2, $status);
	$add_si -> bindParam(3, $protocolo);
	$add_si -> bindParam(4, $status);
	$add_si -> bindParam(5, $protocolo);
	$add_si->execute();

}catch(Exception $e){

}

redirect("statusfc.php");
?>