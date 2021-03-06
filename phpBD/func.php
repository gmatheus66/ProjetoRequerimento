<?php

include "phpBD/conect.php";

function select_anx($anx_id){
    global $con;
    $smt = $con -> prepare("SELECT ANX_HREF,ANX_ID FROM ANEXO  WHERE ANX_ID = ?");
    $smt -> bindParam(1,$anx_id);
    $smt -> execute();
    $anx = $smt -> fetch();
    return $anx;
}

function aluno_nome($email){
    global $con;
    $stmt = $con -> prepare("SELECT ALN_NOME FROM ALUNO WHERE ALN_EMAIL = ?");
    $stmt -> bindParam(1,$email);
    $stmt -> execute();
    $aln = $stmt ->fetch();
    return $aln["ALN_NOME"];
}

function func_nome($email){
    global $con;
    $stmt = $con -> prepare("SELECT FNC_NOME FROM FUNCIONARIO WHERE FNC_EMAIL = ?");
    $stmt -> bindParam(1,$email);
    $stmt -> execute();
    $fnc = $stmt ->fetch();
    return $fnc["FNC_NOME"];
}

function aluno_nome_cpf($cpf){
    global $con;
    $stmt = $con -> prepare("SELECT ALN_CPF,ALN_NOME FROM ALUNO WHERE ALN_CPF = ?");
    $stmt -> bindParam(1,$cpf);
    $stmt -> execute();
    $aln = $stmt ->fetch();
    //var_dump($aln);
    return $aln;
}

function func_nome_cpf($cpf){
    global $con;
    $stmt = $con -> prepare("SELECT FNC_CPF,FNC_NOME FROM FUNCIONARIO WHERE FNC_CPF = ?");
    $stmt ->bindParam(1,$cpf);
    $stmt -> execute();
    $fnc = $stmt -> fetch();
    return $fnc;
}

function email_exists($email, $usuario){


    if ($usuario == "funcionario"){
        try {
            global $con;
            $stmt = $con->prepare("SELECT FNC_EMAIL FROM FUNCIONARIO WHERE FNC_EMAIL = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $fnc = $stmt->fetch();
        }catch (Exception $ex){
            return false;
        }
        if ($fnc["FNC_EMAIL"] == $email){
            return true;
        }
        return false;
    }
    if ($usuario == "aluno"){
        global $con;
        try {
            $stmt = $con->prepare("SELECT ALN_EMAIL FROM ALUNO WHERE ALN_EMAIL = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $aln = $stmt->fetch();
        }
        catch (Exception $ex){
            return false;
        }
        //var_dump($aln);
        if ($aln["ALN_EMAIL"] == $email){
            return true;
        }
        return false;
    }

}



function req_exists($cpf_aln, $protocolo){
    $verify = false;

    try{
        global $con;
        $oson = $con -> prepare("SELECT ALN_CPF FROM ALUNO WHERE ALN_CPF = ?;");
        $oson -> bindParam(1, $cpf_aln);
        $oson -> execute();
        $oqfm = $oson -> fecth();

        if ($oqfm["ALN_CPF"] != null) {
            $verify = true;
        }else{
            $verify = false; 
        }
    }catch(Exception $ex){
        return false;
    }


    if ($verify == true){
        try {
            global $con;
            $stmt = $con->prepare("SELECT REQ_PROTOCOLO FROM HISTORICO_SITUACAO WHERE REQ_PROTOCOLO = ?");
            $stmt->bindParam(1, $protocolo);
            $stmt->execute();
            $aln = $stmt->fetch();
        }catch (Exception $ex){
            return false;
        }
        if ($aln["REQ_PROTOCOLO"] != null){
            return true;
        }
        return false;
    }
}

function historico($protocolo){
    global $con;

    try {
        $smt = $con->prepare("SELECT HTS_ID_SIT_ANTERIOR,HTS_ID_SIT_NOVA,DATE_FORMAT(HTS_DATA_HORA,\"%d/%m/%Y\") AS DATA  FROM HISTORICO_SITUACAO WHERE REQ_PROTOCOLO = ?;");
        $smt->bindParam(1, $protocolo);
        $smt->execute();
        $func = $smt->fecth();
        //print_r($func);
        return $func;
    }catch (Exception $e){
        print_r($e);
        return false;
    }


}

function req_historico($protocolo){
    global $con;
    try{

        $smtt = $con->prepare("SELECT COUNT()  FROM REQUERIMENTO WHERE REQ_PROTOCOLO = ?;");
        $smtt -> bindParam(1, $protocolo);
        $smtt->execute();
        $func = $smtt -> fecthAll();
        //var_dump($func);
        if($func != 0){
            return true;
        }else{
            return false;
        }


    }catch (Exception $ex){
        return false;
    }
}




?>