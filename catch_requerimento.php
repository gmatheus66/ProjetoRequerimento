<?php

include "init.php";
include  "phpBD/class_Requerimento.php";
include "phpBD/conect.php";


if(!logado()){
    redirect("login.php");
}

$motivo = $_POST['motivo']?? " ";
$observacao =$_POST['observacao']?? " ";
$subtopico = $_POST['subtopico']?? " ";
$topico = $_POST['topico']?? " ";
$alunoemail = $_SESSION['email'];
//$alunoemail = "toinho157@gmail.com";
$pasta = 'upload/';
//echo $topico;
//echo $subtopico;
//echo $motivo;
//var_dump($_FILES['anexo']);

if ($motivo == null || $observacao == null || $subtopico == null || $topico == null){
    redirect("requerimento.php");
}
if ($motivo == " " || $observacao == " " || $subtopico == " " || $topico == " "){
    redirect("requerimento.php");
}

if(isset($_FILES['anexo'])){
    $perm_ext = ["png" , "jpeg", "jpg", "pdf"];
    $extensao = pathinfo($_FILES['anexo']['name'],PATHINFO_EXTENSION);

    if (in_array($extensao,$perm_ext)){
        $arq_temp = $_FILES['anexo']['tpm_name'];
        //echo $_FILES['anexo']['tmp_name'];
        $novo_nome = uniqid().".$extensao";
        //echo $pasta.$novo_nome;
        if (move_uploaded_file($_FILES['anexo']['tmp_name'], $pasta.$novo_nome)){
            $href = $pasta.$novo_nome;

            $sm = $con ->prepare("INSERT INTO ANEXO (ANX_ID,ANX_HREF) VALUES(?,?);");
            $sm -> bindParam(1,$novo_nome);
            $sm -> bindParam(2,$href);
            $sm -> execute();

        }
        else{
            echo "nao subiu nada";
        }
    }

}


$id = new Requerimento();

$id->setTopico($topico);
$id->setSubtopico($subtopico);
$id->setMotivo($motivo);
$id->setObservacao($observacao);
$id->setAnexo("Oh shit, Oh no");
//$id->setEmail($alunoemail);
//print_r($id ->getTopico());
//var_dump(trim($id->getSubtopico()));


try {

    $smt = $con -> prepare("SELECT * FROM SUBTIPO WHERE SUBTP_DESCRICAO = ?;");
    $smt -> bindParam(1, $id->getSubtopico());
    $smt -> execute();
    $sub = $smt ->fetch();
    $id->setSubTopico_id($sub["SUBTP_ID"]);
    //var_dump($sub);
    /*
    foreach ( $sub as $id => $suba){

        if($suba[1] === $subtopico ){
            echo "weeeee";
            $id->setSubTopico_id($suba["SUBTP_ID"]);
            var_dump($suba["SUBTP_DESCRICAO"]);

        }
    }*/
    //var_dump($sub);
    //print_r($id->getSubtopico());

    $sm = $con -> prepare("SELECT ALN_CPF FROM ALUNO WHERE ALN_EMAIL = ?;");
    $sm ->bindParam(1,$alunoemail);
    $sm -> execute();
    $res = $sm ->fetch();
    //var_dump($res["ALN_CPF"]);


    //print_r($res[0][0]);
    $stmt = $con -> prepare("INSERT INTO REQUERIMENTO (REQ_TIPO,REQ_MOTIVO,REQ_OBSERVACAO,REQ_STATUS,ALN_CPF,SUBTP_ID,ANX_ID) VALUES(?,?,?,?,?,?,?);");
    $stmt -> bindParam(1,$id->getSubtopico());//tipo
    $stmt -> bindParam(2, $id ->getMotivo());
    $stmt -> bindParam(3,$id->getObersevacao());
    $id->setStatus("ABERTO");
    $stmt -> bindParam(4,$id->getStatus());//status
    $stmt -> bindParam(5,$res["ALN_CPF"]);//aln_cpf
    $stmt -> bindParam(6,$id->getSubtopico_id());//subtipo id
    if($novo_nome) {
        $stmt->bindParam(7, $novo_nome);//anexo
    }else{
        $stmt ->bindParam(7, $id->getAnexo());
    }

    $stmt -> execute();


}catch(PDOException $e){
    echo "ERROR";
    print_r($e);
}


//print_r($id->getTopico());
//print_r($id->getObersevacao());
//print_r($id->getMotivo());
//print_r( $id->getSubtopico());
$id = null;
redirect("index.php");
?>