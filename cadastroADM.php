<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CadastroADM</title>
    <link rel="stylesheet" href="css/cadastroADM.css">
    
</head>
<body>
<div class="geral">
    <div id="degrtop" class="topo">
        <img class="foto" src="imagens/banner.png">  

        <a href="index.php" class="a1"> IFPE</a>
        
        <a href="index.php" class="a1">HOME</a>
    </div>

<div class= "input">        
    <form class="form" action="login.php" method="POST">

        <label>Nome:</label>
        <input type="text" id="input" class="inp" name="nome" placeholder="Nome...">
        

        <label>Sobrenome:</label>
        <input type="text" class="inp" name="sobrenome" placeholder="Sobrenome...">
      

        <label>Idade:</label>
        <input type="number" class="inp" name="idade"  placeholder="Idade...">
        

        <label>Cargo:</label>
        <input type="text" class="inp" name="Cargo" placeholder="Cargo...">


        <label>Cadastro do Funcionario</label>
        <input type="number" class="inp" name="Cadastro" placeholder="Cadastro...">


        <label>E-mail:</label>
        <input type="e-mail" class="inp" name="e-mail" placeholder="E-mail...">
      
      <label>CPF:</label>
      <input type="number" id="input" class="inp" name="CPF" plceholder="CPF...">

      <label>RG:</label>
        <input type="number" id="input" class="inp" name="RG" placeholder="RG...">


        <label>Senha:</label>
        <input type="password" class="inp" name="senha" placeholder="Senha...">
  

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="senhaConfir" placeholder="Confirmar Senha...">

   
        <button type="submit" class="buuton" onclick="alert('Login efetuado com sucesso!')">Enviar</button>
   </form>
   <div id="debrbot" class="baixo"></div>
    
</div> 

</div>
</body>
</html>
