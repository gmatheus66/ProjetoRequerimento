<?php  
include "init.php";


$id;
$topico = $_POST['topico'];
$subtopico = $_POST['subtopico'];
$obsservacao = $_POST['observacao'];
$motivo = $_POST['motivo'];

function verificar($var){

}


try{
	echo $topico;
}catch(InputVazioException $ex){
	$ex;
	redirect("requerimento.php");
}
?>