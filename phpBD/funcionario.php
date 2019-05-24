<?php

//   $username = $_POST['username'];
// $email = $_POST['email'];
// $name = $_POST['name'];
// $nome_do_responsavel = $_POST['nome do nome_do_responsavel'];
// $cargo = $_POST['cargo'];
// $siape = $_POST['siepe'];
// $matricula = $_POST['matricula'];
// $CPF = $_POST['CPF'];
// $RG = $_POST['RG'];
// $pw = $_POST['pw'];
// $pw2 = $_POST['pw2'];
// $data_de_nascimento = $_POST['data_de_nascimento'];

class Funcionario {
  
    private $username;
    private $email;
    private $name;
    private $nome_do_responsavel;
    private $cargo;
    private $siape;
    private $matricula;
    private $CPF;
    private $RG;
    private $pw;
    private $data_de_nascimento;
  
    public function getCod_username() {
        return $this->cod_username;
    }
  
    public function setCod_username($cod_username) {
        $this->cod_username = $cod_username;
    }
  
    public function getemail() {
        return $this->email;
    }
  
    public function setemail($email) {
        $this->email = $email;
    }
  
    public function getname() {
        return $this->name;
    }
  
    public function setname($name) {
        $this->name = strtolower($name);
    }
  
    public function getnome_do_responsavel() {
        return $this->nome_do_responsavel;
    }
  
    public function setnome_do_responsavel($nome_do_responsavel) {
        $this->nome_do_responsavel = $nome_do_responsavel;
    }   

    public function getcargo() {
        return $this->cargo;
    }
  
    public function setcargo($cargo) {
        $this->cargo = $cargo;
    } 

     public function getsiape() {
        return $this->siape;
    }
  
    public function setsiape($siape) {
        $this->siape = strtolower($siape);
    }
     
    public function getmatricula() {
        return $this->matricula;
    }
  
    public function setmatricula($matricula) {
        $this->matricula = strtolower($matricula);
    }
     
    public function getcpf() {
        return $this->CPF;
    }
  
    public function setcpf($CPF) {
        $this->CPF = $CPF;
    }

    public function getrg() {
        return $this->RG;
    }
  
    public function setrg($RG) {
        $this->RG = $RG;
    }
  
    public function getpw() {
        return $this->pw;
    }
  
    public function setpw($pw) {
        $this->pw = $pw;
    }
     public function getdata_de_nascimento() {
        return $this->data_de_nascimento;
    }
  
    public function setdata_de_nascimento($data_de_nascimento) {
        $this->data_de_nascimento = $data_de_nascimento;
    }
}
  
?>
