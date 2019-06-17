<?php


class ALUNO {


    private $nome;
    private $email;
    private $data_de_nascimento;
    private $matricula;
    private $cpf;
    private $pw;
  
    public function getEmail() {
        return $this->email;
    }
  
    public function setEmail($email) {
        $this->email = $email;
    }
  
    public function getNome() {
        return $this->nome;
    }
  
    public function setNome($nome) {
        $this->nome = strtolower($nome);
    }  
     
    public function getMatricula() {
        return $this->matricula;
    }
  
    public function setMatricula($matricula) {
        $this->matricula = strtolower($matricula);
    }
     
    public function getCPF() {
        return $this->cpf;
    }
  
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }
  
    public function getPW() {
        return $this->pw;
    }
  
    public function setPW($pw) {
        $this->pw = $pw;
    }
    public function getDt_Nascimento(){
        return $this->data_de_nascimento;
    }
    public function setDt_Nascimento($data_de_nascimento){
        $this ->data_de_nascimento = $data_de_nascimento;
    }


}
  
?>