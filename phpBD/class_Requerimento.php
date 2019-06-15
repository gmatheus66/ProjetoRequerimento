<?php

class Requerimento{
    private $topico;
    private $subtopico;
    private $subtopico_id;
    private $observacao;
    private $motivo;
    private $anexo;
    private $status;


    public function setStatus($status){
        $this ->status = $status;
    }

    public function  getStatus(){
        return $this ->status;
    }

    public function  getSubtopico_id(){
        return $this ->subtopico_id;
    }

    public function setSubTopico_id($sub_id){
        $this->subtopico_id = $sub_id;
    }

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


}

?>