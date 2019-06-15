<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--<link rel="stylesheet" type="text/css" href="css/login.css" />-->
    <link rel="stylesheet" href="css/logintest.css">
    <link  href="js/validar.js">
    <script  type="text/javascript" src="javascrito.js" ></script>
    <script>
               
    function ValidaCPF(){   
        var cpf=document.getElementById("cpf").value; 
        var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;     
        if (cpfValido.test(cpf) == true)    { 
            console.log("CPF Válido");  
        } else  {    
        console.log("CPF Inválido");    
        }
    }

    function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
    }

    function fMascEx() {
        obj.value=masc(obj.value)
    }

    function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
    }
       

    </script>
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
        <span><a href="requerimento.php" class="aMenu"> REQUERIMENTO</a></span>
    </div>
</div>

    
    <form action="auth.php" method="POST">
        <div class= "inpu">
        
        <input type="text" name="cpf" class="inp" style="margin-top: 50px" placeholder="CPF"
        name="cpf" id="cpf" onBlur="ValidarCPF(form1.cpf);" 
        onkeydown="javascript: fMasc( this, mCPF );"maxlength="14" >
        <br>
        <input type="password"name="pw" class="inp" placeholder="Senha" minlength="6" maxlength="10" pattern="[a-zA-Z0-9]+$">
        <br>
       <button  type="submit" value="Validar" onclick="ValidaCPF();" class="button">Entrar</button>
        <br>
        <br>
         <a href="cadastro.php" class="uo">Ainda não é cadastrado? Cadastre-se!</a>
        <br> 
        <a href="recuperar.php" class="uo uo1">Esqueceu a senha?</a>
        </div> 
   </form>


</body>
</html>