<?php

include "init.php";
$usuario = $_POST['usuario'];


if($usuario == "aluno"){

    $matricula = $_POST['matricula'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dt_nsc = $_POST['dt_nasc'];
    $cpf = $_POST['cpf'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
}
else if ($usuario == "funcionario"){

    $matricula = $_POST['matricula'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
    $rg = $_POST['rg'];
    $rg_orgao = $_POST['rg_orgao'];
    $rg_estado = $_POST['rg_estado'];
}
else{
    redirect('index.php');
}

if ($pw != $pw2) {
    redirect('cadastro.php?mr=Senhas não conferem');
}
if ($pw == '') {
    redirect('cadastro.php?mr=Senha não pode estar em branco');
}

if (email_exists($email)) {
    redirect('cadastro.php?mr=E-mail já registrado');
}

redirect('index.php?mr=Usuário cadastrado com sucesso');

?>