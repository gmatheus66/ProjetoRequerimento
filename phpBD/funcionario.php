<?php

include 'conect.php';

$fnc = new FUNCIONARIO();

$fnc->setCPF($_POST['cpf']);
$fnc->setNome($_POST['nome']);
$fnc->setCargo($_POST['cargo']);
$fnc->setEmail($_POST['email']);
$fnc->setRG_Numero ($_POST['RG_numero']);
$fnc->setRG_Estado ($_POST['RG_estado']);
$fnc->setRG_Orgao_exp ($_POST['RG_Orgao_exp']);
$fnc->setTelefone($_POST['telefone']);
$fnc->setPW($_POST['pw']);
$fnc->setMatricula($_POST['matricula']);


$stmt = $con -> prepare("INSERT INTO FUNCIONARIO (FNC_CPF,FNC_NOME,FNC_CARGO,FNC_EMAIL,FNC_RG_NUMERO,FNC_ESTADO,FNC_ORGAO_EXP,FNC_TELEFONE,FNC_PW,FNC_MATRICULA) VALUES(?,?,?,?,?,?,?,?,?,?,?);");
$stmt -> bindParam(1,$fnc->getCPF());  
$stmt -> bindParam(2,$fnc->getNome());
$stmt -> bindParam(3,$fnc->getCargo());
$stmt -> bindParam(4,$fnc->getEmail());
$stmt -> bindParam(5,$fnc->getRG_numero());
$stmt -> bindParam(6,$fnc->getRG_estado());
$stmt -> bindParam(7,$fnc->getRG_orgao_exp());
$stmt -> bindParam(8,$fnc->getTelefone());
$stmt -> bindParam(9,$fnc->getPW());
$stmt -> bindParam(10,$fnc->getMatricula());

$stmt -> execute();

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
        $this->name = strtolower($nome);
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
