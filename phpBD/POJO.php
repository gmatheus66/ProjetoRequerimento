<?php

include 'conect.php';

$aln = new ALUNO();

$aln->setNome($_POST['nome']);
$aln->setEmail($_POST['e-mail']);
$aln->setMatricula($_POST['matricula']);
$aln->setCPF($_POST['cpf']);
$aln->setPW($_POST['pw']);
$aln->setDt_Nascimento($_POST['data_de_nascimento']);



$stmt = $con -> prepare("INSERT INTO ALUNO (ALN_MATRICULA,ALN_NOME,ALN_EMAIL, ALN_DT_NASC, ALN_SENHA, ALN_CPF)");
$stmt -> bindParam(1,$aln->getMatricula());
$stmt -> bindParam(2,$aln->getNome());
$stmt -> bindParam(3,$aln->getEmail());
$stmt -> bindParam(4,$aln->getDt_Nascimento());
$stmt -> bindParam(5,$aln->getPW());
$stmt -> bindParam(6,$aln->getCPF());
$stmt -> execute();

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