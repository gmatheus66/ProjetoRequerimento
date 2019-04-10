<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CadastroADM</title>
    <link rel="stylesheet" href="css/cadastroADM.css">
    
</head>
<body>
<div class="geral">
    <div class="banner"> 
    <img class="imgBanner" src="imagens/banner.png">  
    <a href="index.php" class="aMenu"> HOME</a>
    <a href="cadastro.php" class="aMenu"> CADASTRO</a>
    <a href="login.php" class="aMenu"> LOGIN</a>
    <a href="cadastroADM.php" class="aMenu"> CADASTRO ADM </a>
    </div>

<div class= "input">        
    <form class="form" action="login.php" method="POST">

        <label>Nome:</label>
        <input type="text" id="input" class="inp" name="nome" placeholder="Nome...">
        

        <label>Sobrenome:</label>
        <input type="text" class="inp" name="sobrenome" placeholder="Sobrenome..." >
      

        <label>Idade:</label>
        <input type="text" class="inp" name="idade"  placeholder="Idade..." maxlength="2" >
        

        <label>Cargo:</label>
        <input type="text" class="inp" name="Cargo" placeholder="Cargo...">


        <label>Cadastro do Funcionario</label>
        <input type="text" class="inp" name="Cadastro" placeholder="Cadastro..." maxlength="10" >


        <label>E-mail:</label>
        <input type="e-mail" class="inp" name="e-mail" placeholder="E-mail...">
      
      <label>CPF:</label>
      <input type="text" id="input" class="inp" name="CPF" plceholder="CPF..." maxlength="11" >

      <label>RG:</label>
        <input type="text" id="input" class="inp" name="RG" placeholder="RG..." maxlength="9">


        <label>Senha:</label>
        <input type="password" class="inp" name="senha" placeholder="Senha...">
  

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="senhaConfir" placeholder="Confirmar Senha...">

   
        <button type="submit" class="buuton" onclick="valida_nome()"  >Enviar</button>
   </form>
   <div id="debrbot" class="baixo"></div>



</div>
</body>
</html>