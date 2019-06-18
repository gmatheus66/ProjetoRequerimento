<?php
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";



$email = $_SESSION['email'];
$status = $_POST['status'];
$obs = $_POST['obs'];
$protocolo = $_POST['protocolo'];

//var_dump($status);
//var_dump($obs);
var_dump($protocolo);


try{

	if($status == 0){
		$status_nome = "ABERTO";
	}else if($status == 1){
		$status_nome = "FECHADO";
	}else{
		$status_nome = "ANÁLISE";
	}

	$fnc = $con -> prepare("SELECT FNC_CPF FROM FUNCIONARIO WHERE FNC_EMAIL = ?;");
	$fnc -> bindParam(1, $email);
	$fnc -> execute();
	$fnc_email = $fnc -> fetch();
	//var_dump($fnc_email['FNC_CPF']);
	$cpf_func = $fnc_email['FNC_CFP'];

	if(req_historico($protocolo)) {
        $hist_sit = $con->prepare("SELECT HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, HTS_ID FROM HISTORICO_SITUACAO;");
        $hist_sit->execute();
        $oson = $hist_sit->fecth();
        //var_dump($oson);
        $sit_ant = $oson['HTS_ID_SIT_ANTERIOR'];
    }else{
	    $sit_ant = 0;
    }

    //var_dump($sit_ant);

	$add_st = $con->prepare("UPDATE REQUERIMENTO SET REQ_STATUS = ? WHERE REQ_PROTOCOLO = ?;");
	$add_st -> bindParam(1, $status_nome, PDO::PARAM_STR);
	$add_st -> bindParam(2, $protocolo, PDO::PARAM_INT);
	$add_st->execute();

	$add_si = $con-> prepare("INSERT INTO HISTORICO_SITUACAO(HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, REQ_PROTOCOLO, FNC_CPF) VALUES(?, ?, ?, ?);");
	$add_si -> bindParam(1, $sit_ant, PDO::PARAM_INT);
	$add_si -> bindParam(2, $status, PDO::PARAM_INT);
	$add_si -> bindParam(3, $protocolo, PDO::PARAM_INT);
	$add_si -> bindParam(4, $fnc_email['FNC_CPF']);
	$add_si->execute();

}catch(Exception $e){
    print_r($e);
}
redirect("statusfc.php");?>

