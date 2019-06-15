<?php

include "phpBD/conect.php";

function select_anx($anx_id){
    global $con;
    $smt = $con -> prepare("SELECT ANX_HREF FROM ANEXO  WHERE ANX_ID = ?");
    $smt -> bindParam(1,$anx_id);
    $smt -> execute();
    $anx = $smt -> fetch();
    return $anx["ANX_HREF"];
}

function aluno_nome($email){
    global $con;
    $stmt = $con -> prepare("SELECT ALN_NOME FROM heroku_70137967cfc9460.ALUNO WHERE ALN_EMAIL = ?");
    $stmt -> bindParam(1,$email);
    $stmt -> execute();
    $aln = $stmt ->fetch();
    return $aln["ALN_NOME"];
}

function func_nome($email){
    global $con;
    $stmt = $con -> prepare("SELECT FNC_NOME FROM heroku_70137967cfc9460.FUNCIONARIO WHERE FNC_EMAIL = ?");
    $stmt -> bindParam(1,$email);
    $stmt -> execute();
    $fnc = $stmt ->fetch();
    return $fnc["FNC_NOME"];
}

function aluno_nome_cpf($cpf){
    global $con;
    $stmt = $con -> prepare("SELECT ALN_CPF,ALN_NOME FROM heroku_70137967cfc9460.ALUNO WHERE ALN_CPF = ?");
    $stmt -> bindParam(1,$cpf);
    $stmt -> execute();
    $aln = $stmt ->fetch();
    //var_dump($aln);
    return $aln;
}
?>