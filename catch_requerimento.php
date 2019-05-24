<?php  
include "init.php";



class verificar{
	// private $id;
	private $topico;
	private $subtopico;
	private $observacao;
	private $motivo;
	
	protected function setTopico($top){
		$this->$topico = $top;
	}
	protected function getTopico(){
		return $this->$topico;
	}
	
	protected function setSubtopico($subt){
		$this->$subtopico = $subt;
	}
	protected function getSubtopico(){
		return $this->$subtopico;
	}
	
	protected function setObservacao($obs){
		$this->$observacao =  $obs;	
	}
	protected function getObersevacao(){
		return $this->$observacao;
	}
	
	protected function setMotivo($mot){
		$this->$motivo =  $mot;
	}
	protected function getMotivo(){
		return $this->$motivo;
	}
	
	public function teste($mot){
		if($mot == " "){
			throw new Exception("Não foi possivel passar essa observação.");  
		} else{
			
		}
	}
}
$id;
$topico = $_POST['topico'];
$subtopico = $_POST['subtopico'];
$observacao = $_POST['observacao'];
$motivo = $_POST['motivo'];

$id = new verificar;

$id->setTopico($topico);
$id->setSubtopico($subtopico);
$id->setMotivo($motivo);
$id->setObservacao($observacao);

try{
	echo $id->teste($motivo);
}catch(Exception $ex){
	echo 'Exceção capturada: '. $ex->getMessage();
	// redirect("requerimento.php");
}finally{

}
?>