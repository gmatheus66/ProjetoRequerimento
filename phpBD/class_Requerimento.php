<?php

class Requerimento{
    private $topico;
    private $subtopico;
    private $observacao;
    private $motivo;
    private $anexo;

    public function setTopico($top){
        $this->topico = $top;
    }
    public function getTopico(){
        return $this->topico;
    }

    public function setSubtopico($subt){
        $this->subtopico = $subt;
    }
    public function getSubtopico(){
        return $this->subtopico;
    }

    public function setObservacao($obs){
        $this->observacao =  $obs;
    }
    public function getObersevacao(){
        return $this->observacao;
    }

    public function setMotivo($mot){
        $this->motivo =  $mot;
    }
    public function getMotivo(){
        return $this->motivo;
    }

    public function getAnexo()
    {
        return $this->anexo;
    }

    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;
    }

    public function teste($mot){
        if($mot == " "){
            throw new Exception("Não foi possivel passar essa observação.");
        } else{

        }
    }
}

?>