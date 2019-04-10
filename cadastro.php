<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

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
        <input type="text" class="inp" name="sobrenome" placeholder="Sobrenome...">
      

        <label>Idade:</label>
        <input type="number" class="inp" name="idade"  placeholder="Idade...">
           <label>Matrícula:</label>
        <input type="text" class="inp" name="matricula" placeholder="Matrícula...">

        <label>E-mail:</label>
        <input type="e-mail" class="inp" name="e-mail" placeholder="E-mail...">
      

        <label>Senha:</label>
        <input type="password" class="inp" name="senha" placeholder="Senha...">
  

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="senhaConfir" placeholder="Confirmar Senha...">
   

     
     
        <button type="submit" class="buuton" onclick="alert('Login efetuado com sucesso!')">Enviar</button>
   </form>
    
</div> 

</body>
</html>
