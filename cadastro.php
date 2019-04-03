<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>


<?php
    $dado = $_POST['nome'] . ';' . $_POST['sobrenome'] . ';' . $_POST['idade'] . ';' .  $_POST['e-mail']. ';' .  $_POST['senha'] . ';' . $_POST['senhaConfir'] . ';' . $_POST['matricula'] .  "\n";
    $handle = fopen('csv/dados.csv', 'a');
    fwrite($handle, $dado);
?>

    <div id="degrtop" class="topo">
        <img class="foto" src="imagens/logoifpe.png">

        <a href="index.php" class="a1"> IFPE</a>
        
        <a href="index.php" class="a3">HOME</a>
    </div>

<div class= "input">        
    <form class="form" action="login.php" method="POST">

        <label>Nome:</label>
        <input type="text" id="input" class="inp" name="nome" placeholder="Nome...">
        <br>

        <label>Sobrenome:</label>
        <input type="text" class="inp" name="sobrenome" placeholder="Sobrenome...">
        <br>

        <label>Idade:</label>
        <input type="text" class="inp" name="idade" placeholder="Idade...">
        <br>

        <label>E-mail:</label>
        <input type="text" class="inp" name="e-mail" placeholder="E-mail...">
        <br>

        <label>Senha:</label>
        <input type="password" class="inp" name="senha" placeholder="Senha...">
        <br>

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="senhaConfir" placeholder="Confirmar Senha...">
        <br>

        <label>Matrícula:</label>
        <input type="text" class="inp" name="matricula" placeholder="Matrícula...">
        <br>
        <button type="submit" class="buuton" onclick="alert('Login efetuado com sucesso!')">Enviar</button>
   </form>
</div> 
<div id="debrbot" class="baixo"></div>
</div>
<footer></footer>  
</body>
</html>
