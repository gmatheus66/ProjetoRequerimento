<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--<link rel="stylesheet" type="text/css" href="css/login.css" />-->
    <link rel="stylesheet" href="css/logintest.css">
    <link  href="js/validar.js">
</head>
<body>
<div>
    <form action="auth.php" method="POST">
        <?php if ($_GET['ml'] ?? false !== false ): ?>
                <span class="message"><?= $_GET['ml'] ?></span>
            <?php endif ?>
    </form>
</div>
<div>
  <a class="tilt" href="index.php"><img class="logoIF" src="imagens/logoIF.png"></a>
  <span class="titleBanner"><a class="tilt" href="index.php"> Instituto Federal de Pernambuco</a></span>
</div>

<span class="titleBanner2">Requerimentos</span>
<div class="banner"> 
    <img class="imgBanner" src="imagens/banner.png"> 
    <div class="links"> 
        <span><a href="index.php" class="aMenu one" > HOME</a></span>
        <span><a href="cadastro.php" class="aMenu"> CADASTRO</a></span>
        <span><a href="login.php" class="aMenu"> ENTRAR</a></span>
        <span><a href="requerimento.php" class="aMenu"> REQUERIMENTO</a></span>
    </div>
</div>

    
    <form action="login.php">
        <div class= "inpu">
        
        <input type="text" class="inp" style="margin-top: 50px" placeholder="CPF"
        name="cpf" onBlur="ValidarCPF(form1.cpf);" 
        onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">
        <br>
        <input type="password"name="pw" class="inp" placeholder="Senha">
        <br>
       <button type="submit" class="button">Entrar</button>
        <br>
        <br>
         <a href="cadastro.php" class="uo">Ainda não é cadastrado? Cadastre-se!</a>
        <br> 
        <a href="recuperar.php" class="uo uo1">Esqueceu a senha?</a>
        </div> 
   </form>


</body>
</html>