<?php

include "init.php";
include "phpBD/class_funcionario.php";
include "phpBD/class_aluno.php";
include "phpBD/func.php";

$usuario = $_POST['usuario'];



if($usuario == "aluno"){

    $matricula = $_POST['matricula']?? " ";
    $name = $_POST['name']?? " ";
    $email = $_POST['email']?? " ";
    $dt_nsc = $_POST['dt_nasc']?? " ";
    $cpf = $_POST['cpf']?? " ";
    $pw = $_POST['pw']?? " ";
    $pw2 = $_POST['pw2']?? " ";

    if ($pw != $pw2) {
        //redirect('cadastro.php?mr=Senhas não conferem');
        echo "senha diferente";
    }
    if ($pw == '' || $pw2 == " " || $pw2 =='' || $pw2 == null || $pw == null ) {
        //redirect('cadastro.php?mr=Senha não pode estar em branco ou nulo');
        echo "senhas nulas ou vazias";
    }
    if ($matricula == null || $nome == null || $email == null  || $dt_nsc == null|| $cpf == null) {
        //redirect('cadastro.php?mr=Senha não pode estar em branco ou nulo');
        echo "campos vazios";
    }
    if (email_exists($email,$usuario)) {
        //redirect('cadastro.php?mr=E-mail já registrado');
        echo "email ja existe";
    }

    $aln  = new ALUNO();

    $aln ->setMatricula($matricula);
    $aln ->setNome($name);
    $aln ->setEmail($email);
    $aln ->setDt_Nascimento($dt_nsc);
    $aln ->setCPF($cpf);
    $aln ->setPW($pw);

    try {
        $smt = $con->prepare("INSERT INTO ALUNO(ALN_MATRICULA,ALN_NOME,ALN_EMAIL,ALN_DT_NASC,ALN_SENHA,ALN_CPF) VALUES (?,?,?,?,?,?)");
        $smt->bindParam(1, $aln->getMatricula());
        $smt->bindParam(2, $aln->getNome());
        $smt->bindParam(3, $aln->getEmail());
        $smt->bindParam(4, date("Y-m-d H:i:s",$aln->getDt_Nascimento()));
        $smt->bindParam(5, $aln->getPW());
        $smt->bindParam(6, $aln->getCPF());
        $smt->execute();
    }catch (Exception $ex){
        print_r($ex);
    }

}
else if ($usuario == "funcionario"){

    $matricula = $_POST['matricula']?? " ";
    $name = $_POST['name']?? " ";
    $email = $_POST['email']?? " ";
    $tel = $_POST['telefone']?? " ";
    $cpf = $_POST['cpf']?? " ";
    $cargo = $_POST['cargo']?? " ";
    $pw = $_POST['pw']?? " ";
    $pw2 = $_POST['pw2']?? " ";
    $rg = $_POST['rg']?? " ";
    $rg_orgao = $_POST['rg_orgao']?? " ";
    $rg_estado = $_POST['rg_estado']?? " ";
    var_dump($matricula);
    var_dump($name);
    var_dump($email);
    var_dump($tel,$cpf,$cargo,$pw);
    var_dump($pw2, $rg,$rg_orgao,$rg_estado);


    if ($pw != $pw2) {
        //redirect('cadastro.php?mr=Senhas não conferem');
        echo "senha diferente";
    }
    if ($pw == '' || $pw2 == " " || $pw2 =='' || $pw == " " || $pw2 == null || $pw == null ) {
        //redirect('cadastro.php?mr=Senha não pode estar em branco ou nulo');
        echo "senhas vazias ou nulas";
    }
    if ($matricula == null || $nome == null || $email == null  || $rg == null || $rg_estado == null  || $rg_orgao == null || $cargo == null || $cpf == null) {
        //redirect('cadastro.php?mr=Senha não pode estar em branco ou nulo');
        echo "campos nulos";
    }

    if (email_exists($email,$usuario)) {
        //redirect('cadastro.php?mr=E-mail já registrado');
        echo "email ja existe";
    }


    $fnc = new FUNCIONARIO();

    $fnc->setCPF($cpf);
    $fnc->setNome($name);
    $fnc->setCargo($cargo);
    $fnc->setEmail($email);
    $fnc->setRG_Numero ($rg);
    $fnc->setRG_Estado ($rg_estado);
    $fnc->setRG_Orgao_exp ($rg_estado);
    $fnc->setTelefone($tel);
    $fnc->setPW($matricula);
    $fnc->setMatricula($matricula);

    try {
        $stmt = $con->prepare("INSERT INTO FUNCIONARIO (FNC_CPF,FNC_NOME,FNC_CARGO,FNC_EMAIL,FNC_RG_NUMERO,FNC_ESTADO,FNC_ORGAO_EXP,FNC_TELEFONE,FNC_PW,FNC_MATRICULA) VALUES(?,?,?,?,?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $fnc->getCPF());
        $stmt->bindParam(2, $fnc->getNome());
        $stmt->bindParam(3, $fnc->getCargo());
        $stmt->bindParam(4, $fnc->getEmail());
        $stmt->bindParam(5, $fnc->getRG_numero());
        $stmt->bindParam(6, $fnc->getRG_estado());
        $stmt->bindParam(7, $fnc->getRG_orgao_exp());
        $stmt->bindParam(8, $fnc->getTelefone());
        $stmt->bindParam(9, $fnc->getPW());
        $stmt->bindParam(10, $fnc->getMatricula());

        $stmt->execute();

    }catch (Exception $ex){
        print_r($ex);
    }


}
else{
    //redirect('index.php');
}

//redirect('index.php?mr=Usuário cadastrado com sucesso');
?>