<?php

//   $username = $_POST['username'];
// $email = $_POST['email'];
// $name = $_POST['name'];
// $nome_do_responsavel = $_POST['nome do nome_do_responsavel'];
// $cargo = $_POST['cargo'];
// $siape = $_POST['siepe'];
// $matricula = $_POST['matricula'];
// $cpf = $_POST['cpf'];
// $rg = $_POST['rg'];
// $pw = $_POST['pw'];
// $pw2 = $_POST['pw2'];

class PojoALUNO {
  
    private $username;
    private $email;
    private $name;
    private $nome_do_responsavel;
    private $matricula;
    private $cpf;
    private $rg;
    private $pw;
  
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
     
    public function getmatricula() {
        return $this->matricula;
    }
  
    public function setmatricula($matricula) {
        $this->matricula = strtolower($matricula);
    }
     
    public function getcpf() {
        return $this->cpf;
    }
  
    public function setcpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getrg() {
        return $this->rg;
    }
  
    public function setrg($rg) {
        $this->rg = $rg;
    }
  
    public function getpw() {
        return $this->pw;
    }
  
    public function setpw($pw) {
        $this->pw = $pw;
    }
}
  
?>