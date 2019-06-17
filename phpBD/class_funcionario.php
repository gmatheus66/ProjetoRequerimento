<?php


class FUNCIONARIO {

    private $cpf;
    private $nome;
    private $cargo;
    private $email;
    private $RG_numero;
    private $RG_estado;
    private $RG_Orgao_exp;
    private $telefone;
    private $pw;
    private $matricula;
  

    public function getCPF() {
        return $this->cpf;
    }
  
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

     public function getNome() {
        return $this->nome;
    }
  
    public function setNome($nome) {
        $this->name = $nome;
    }
    public function getCargo() {
        return $this->cargo;
    }
  
    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getEmail() {
        return $this->email;
    }
  
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getRG_numero() {
        return $this->RG_numero;
    }
    public function setRG_Numero($RG_numero) {
        $this->RG_numero = $RG_numero;
    }
  
    public function getRG_estado() {
        return $this->RG_estado;
    }
    public function setRG_Estado($RG_estado) {
        $this->RG_estado = $RG_estado;
    }
    public function getRG_orgao_exp() {
        return $this->RG_Orgao_exp;
    }
    public function setRG_Orgao_exp($RG_Orgao_exp) {
        $this->RG_Orgao_exp = $RG_Orgao_exp;
    }

    public function getTelefone() {
        return $this->telefone;
    }
  
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
       
    public function getPW() {
        return $this->pw;
    }
  
    public function setPW($pw) {
        $this->pw = $pw;
    }
     public function getMatricula() {
        return $this->matricula;
    }
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }
    
}
  
?>
