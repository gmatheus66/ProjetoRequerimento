<?php

include 'conect.php';
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

$aln = new ALUNO();

$aln->setNome($_POST['name']);
$aln->setEmail($_POST['email']);
$aln->setMatricula($_POST['matricula']);
$aln->setCPF($_POST['cpf']);
$aln->setPW($_POST['pw']);
$aln->setDt_Nascimento($_POST['data_de_nascimento']);
$aln->setNome_do_Responsavel($_POST['nome_do_responsavel']);

$stmt = $con -> prepare("INSERT INTO ALUNO (ALN_MATRICULA,ALN_NOME,ALN_EMAIL, ALN_DT_NASC, ALN_SENHA, ALN_CPF) VALUES(?,?,?,?,?,?);");
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
    private $nome_do_responsavel;
    private $dt_nascimento;
    private $matricula;
    private $rg;
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
        $this->name = strtolower($nome);
    }
  
    public function getNome_do_Responsavel() {
        return $this->nome_do_responsavel;
    }
  
    public function setNome_do_Responsavel($nome_do_responsavel) {
        $this->nome_do_responsavel = $nome_do_responsavel;
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

    public function getRG() {
        return $this->rg;
    }
  
    public function setRG($rg) {
        $this->rg = $rg;
    }
  
    public function getPW() {
        return $this->pw;
    }
  
    public function setPW($pw) {
        $this->pw = $pw;
    }
    public function getDt_Nascimento(){
        return $this->$dt_nascimento;
    }
    public function setDt_Nascimento($dt_nascimento){
        $this ->$dt_nascimento = $dt_nascimento;
    }


}
  
?>