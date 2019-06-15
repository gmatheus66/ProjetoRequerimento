<?php
include "init.php";
include "phpBD/conect.php";
include "phpBD/func.php";

if(!logado()){
    redirect('login.php');
}

$cpf = $_POST["cpf"]?? "";
$pw = $_POST["pw"]?? "";


if(aluno_nome_cpf($cpf) == null){
    $smt = $con ->prepare("SELECT ALN_CPF,ALN_SENHA FROM heroku_70137967cfc9460.ALUNO WHERE ALN_CPF = ?");
    $smt -> bindParam(1, $cpf);
    $smt ->execute();
    $smt -> fetch();
    if($pw == $smt["ALN_SENHA"] && $cpf == $smt["ALN_CPF"]){

    }
    else{
        redirect("index.php");
    }
}
else{

}


?>