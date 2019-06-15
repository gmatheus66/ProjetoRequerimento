<?php

$username = $_POST['username'];
$email = $_POST['email'];
$name = $_POST['name'];
$nome_do_responsavel = $_POST['nome do nome_do_responsavel'];
$cargo = $_POST['cargo'];
$siape = $_POST['siepe'];
$matricula = $_POST['matricula'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];

if ($pw != $pw2) {
    redirect('cadastro.php?mr=Senhas não conferem');
}
if ($pw == '') {
    redirect('cadastro.php?mr=Senha não pode estar em branco');
}

if (email_exists($email)) {
    redirect('cadastro.php?mr=E-mail já registrado');
}
add_user($username, $email, $pw, $name);
redirect('cadastro.php?mr=Usuário cadastrado com sucesso');

?>