<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>


<?php

    $dado = $_GET['nome'] . ';' . $_GET['sobrenome'] . ';' . $_GET['idade'] . ';' .  $_GET['e-mail']. ';' .  $_GET ['senha'] . ';' .  $_GET['matricula'] . ';' . "\n";

    $handle = fopen('csv/dados.csv', 'a+');
    fwrite($handle, $dado);
    fclose($dado);
?>
<div class="topo">
<a href="index.html" class="a1"> IFPE</a>
<br>
<a href="index.html" class="a2"> Início</a>
<a href="cadastro.php" class="a2"> Cadastro</a>
<a href="login.php" class="a2"> Login</a>
<a href="listagem.php" class="a2"> Listagem</a>
</div>
    <form action="cadastro.php">
    <div class= "inpu">        

        Nome: <input type="text" name="nome" class="inp1">
        <br>
        Sobrenome: <input type="text" name="sobrenome">
        <br>
        Idade: <input type="text" name="idade">
        <br>
        E-mail: <input type="text" name="e-mail">
        <br>
        Senha: <input type="password"  name="senha">
        <br>
        Matrícula: <input type="text" name="matricula">
        <br>
        <button type="submit" onclick="alert('Cadastro efetuado com sucesso!')">Enviar</button>
   </form>
 </div> 

<div class="baixo"></div>
   
</body>
</html>