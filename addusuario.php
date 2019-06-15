<?php

include 'init.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$senha2 = $_POST['confirmar'] ?? '';
$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? '';
?>

<?php if ($senha != $senha2): ?>
    <h1>Senhas não podem ser diferentes</h1>
    <a href="#" onclick="history.go(-1)">Voltar</a>
    <?php exit() ?>
<?php endif ?>
<?php if ($senha == ''): ?>
    <h1>Senha não pode ser vazia</h1>
    <a href="#" onclick="history.go(-1)">Voltar</a>
    <?php exit() ?>
<?php endif ?>