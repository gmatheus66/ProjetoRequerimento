<?php

include 'conect.php';

$fnc = new ALUNO();

$fnc->setMatricula($_POST['matricula']);
$fnc->setNome($_POST['nome']);
$fnc->setEmail($_POST['email']);
$fnc->setDt_nasc($_POST['data_de_nascimento']);
$fnc->setPW($_POST['pw']);
$fnc->setCPF($_POST['cpf']);



$stmt = $con -> prepare("INSERT INTO ALUNO (FNC_MATRICULA,FNC_NOME,FNC_EMAIL,FNC_data_de_nascimento,FNC_CPF,FNC_PW) VALUES(?,?,?,?,?,?);");
$stmt -> bindParam(1,$fnc->getMatricula());  
$stmt -> bindParam(2,$fnc->getNome());
$stmt -> bindParam(3,$fnc->getEmail());
$stmt -> bindParam(4,$fnc->getdata_de_nascimento());
$stmt -> bindParam(5,$fnc->getCPF());
$stmt -> bindParam(6,$fnc->getPW());

$stmt -> execute();

class ALUNO {

    private $matricula;
    private $nome;
    private $email;
    private $data_de_nascimento;
    private $pw;
    private $cpf;
  


    public function getMatricula() {
        return $this->matricula;
    }
    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

     public function getNome() {
        return $this->nome;
    }
  
    public function setNome($nome) {
        $this->name = strtolower($nome);
    }

    public function getEmail() {
        return $this->email;
    }
  
    public function setEmail($email) {
        $this->email = $email;
    }
     public function getData_de_nascimento() {
        return $this->data_de_nascimento;
    }
  
    public function setData_de_nascimento($data_de_nascimento) {
        $this->data_de_nascimento = $data_de_nascimento;
    }
     public function getPW() {
        return $this->pw;
    }
  
    public function setPW($pw) {
        $this->pw = $pw;
    }

    public function getCPF() {
        return $this->cpf;
    }
  
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }
    
}
  
?>
