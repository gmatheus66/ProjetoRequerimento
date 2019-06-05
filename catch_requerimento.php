<?php

include "init.php";
include  "phpBD/class_Requerimento.php";
include "phpBD/conect.php";

$motivo = $_POST['motivo']?? " ";
$observacao =$_POST['observacao']?? " ";
$subtopico = $_POST['subtopico']?? " ";
$topico = $_POST['topico']?? " ";
$alunoemail = $_SESSION['Aln_email'];
//$alunoemail = "vjhg@bol.com";

/*
if(!logado()){
    redirect("login.php");
}
if ($motivo == null || $observacao == null || $subtopico == null || $topico == null){
    redirect("requerimento.php");
}
if ($motivo == " " || $observacao == " " || $subtopico == " " || $topico == " "){
    redirect("requerimento.php");
}
*/


$id = new Requerimento();

$id->setTopico($topico);
$id->setSubtopico($subtopico);
$id->setMotivo($motivo);
$id->setObservacao($observacao);


try {
    $smt = $con -> prepare("SELECT SUBTP_ID FROM heroku_70137967cfc9460.subtipo WHERE SUBTP_DESCRICAO = ?;");
    $smt ->bindParam(1,$subtopico);
    $smt -> execute();
    $sub = $smt ->fetch();
    //var_dump($subtopico);
    //var_dump($sub["SUBTP_ID"]);
    $id->setSubTopico_id($sub["SUBTP_ID"]);
/*
    $sm = $con -> prepare("SELECT ALN_CPF FROM heroku_70137967cfc9460.ALUNO WHERE ALN_EMAIL = '?';");
    $sm ->bindParam(1,$alunoemail);
    $sm -> execute();
    $res = $sm ->fetchAll();

    //print_r($res[0][0]);
    $stmt = $con -> prepare("INSERT INTO REQUERIMENTO (REQ_TIPO,REQ_OBSERVACAO,REQ_STATUS,ALN_CPF,FNC_CPF,SUBTP_ID,ANX_ID) VALUES(?,?,?,?,?,?);");
    //$stmt -> bindParam(1,$id->getSubtopico();//tipo
    $stmt -> bindParam(2,$id->getObersevacao());
    //$stmt -> bindParam(3,$id->);//status
    $stmt -> bindParam(4,$res[0][0]);//aln_cpf
    $stmt -> bindParam(5,$id->getSubtopico_id());//subtipo id
    $stmt -> bindParam(6,$id-> getAnexo());//anexo
    $stmt -> execute();
*/
}catch(PDOException $e){
    echo "ERROR";
    print_r($e);
}

try{
	//echo $id->teste($id ->getMotivo());
}catch(Exception $ex){
	echo 'Exceção capturada: '. $ex->getMessage();
	// redirect("requerimento.php");
}finally{

}
//print_r($id->getTopico());
//print_r($id->getObersevacao());
//print_r($id->getMotivo());
//print_r( $id->getSubtopico());

?>