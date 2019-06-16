<?php
include "init.php";
include "phpBD/conect.php";
include "phpBD/func.php";


$cpf = $_POST["cpf"]?? "";
$pw = $_POST["pw"]?? "";

if($cpf == null || $cpf == " "){
    redirect('login.php/?ml=Senha ou Cpf estão incorretos');
}
if ($pw == null || $pw == " "){
    redirect('login.php/?ml=Senha ou Cpf estão incorretos');
}




if(aluno_nome_cpf($cpf) != null){
    $smt = $con ->prepare("SELECT ALN_CPF,ALN_SENHA,ALN_EMAIL FROM heroku_70137967cfc9460.ALUNO WHERE ALN_CPF = ?");
    $smt -> bindParam(1, $cpf);
    $smt ->execute();
    $aln = $smt -> fetch();
    if($pw == $aln["ALN_SENHA"] && $cpf == $aln["ALN_CPF"]){

        login($aln["ALN_EMAIL"], "aluno");
        redirect('status.php');
        //echo "logado aluno";
    }
    else{
        //echo"login errado aluno";
        redirect('login.php/?ml=Senha ou Cpf estão incorretos');
    }
}
else if (func_nome_cpf($cpf) != null){
    $smt = $con -> prepare("SELECT FNC_CPF,FNC_SENHA,FNC_EMAIL FROM FUNCIONARIO WHERE FNC_CPF = ?");
    $smt -> bindParam(1,$cpf);
    $smt -> execute();
    $fc = $smt -> fetch();
    //var_dump($fc);
    if($pw == $fc["FNC_SENHA"] && $cpf == $fc["FNC_CPF"]){

        login($fc["FNC_EMAIL"], "funcionario");
        redirect('statusfc.php');
        //echo "logado funcionario";
    }else{
        //echo "login errado func";
        redirect('login.php/?ml=Senha ou Cpf estão incorretos');
    }
}
else{
    redirect('login.php/?ml=Senha ou Cpf estão incorretos');
}

?>