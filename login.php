<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>

<div class="banner"> 
    <img class="imgBanner" src="imagens/banner.png">  
    <a href="index.php" class="aMenu"> HOME</a>
    <a href="cadastro.php" class="aMenu"> CADASTRO</a>
    <a href="login.php" class="aMenu"> LOGIN</a>
    </div>

    
    <form action="login.php">
    <div class= "inpu">

        <input type="text" class="inp" style="margin-top: 50px" placeholder="Matricula">
        <br>
        <input type="text" class="inp" placeholder="Senha">
        <br>
       <button type="submit" class="button"  ">Enviar</button>
        <br>
        <br>
         <a href="cadastro.php" class="uo">Ainda não é cadastrado? Cadastre-se!</a>
        <br> 
        <a href="recuperar.php" class="uo">Esqueceu a senha?</a>
   </form>
 </div> 


</body>
</html>