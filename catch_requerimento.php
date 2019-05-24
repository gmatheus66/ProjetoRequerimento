<?php  
include "init.php";

$id;
$topico = $_POST['topico'];
$subtopico = $_POST['subtopico'];
$observacao = $_POST['observacao'];
$motivo = $_POST['motivo'];


class verificar{
	// private $id;
	private $topico;
	private $subtopico;
	private $observacao;
	private $motivo;
	
	public function setTopico(){

	}	
	public function getTopico(){

	}
	
	public function setSubtopico(){

	}
	public function getSubtopico(){

	}

	public function setObservacao(){

	}
	public function getObersevacao(){
		
	}

	public function setMotivo(){

	}
	public function getMotivo(){

	}
	
	public function teste($mot){
		if($mot == " "){
			throw new Exception("Não foi possivel passar essa observação.");  
		} else{
			
		}
	}
}

$id = new verificar;

try{
	echo $id->teste($motivo);
}catch(Exception $ex){
	echo 'Exceção capturada: '. $ex->getMessage();
	// redirect("requerimento.php");
}finally{

}
?>