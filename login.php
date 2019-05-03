    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
<?php include 'include.php' ?>    
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