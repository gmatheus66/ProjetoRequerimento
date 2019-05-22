<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="js/validar.js">

    <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


 <script>
    function validaSenha (input){ 
    if (input.value != document.getElementById('pw').value) {
    input.setCustomValidity('As senhas não conferem');
  } else {
    input.setCustomValidity('');
  }
} 
</script> 

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

   <div class="banner"> 
        <img class="imgBanner" src="imagens/banner.png">  
        <a href="index.php" class="aMenu"> HOME</a>
        <a href="cadastro.php" class="aMenu"> CADASTRO</a>
        <a href="login.php" class="aMenu"> LOGIN</a>
    </div>
<div>
    <form action="register.php" method="POST">
       
        <?php if ($_GET['mr'] ?? false !== false ): ?>
                <span class="message"><?= $_GET['mr'] ?></span>
        <?php endif ?>
    </form>
</div>
<div class= "input">        
    <form class="form" action="login.php" method="POST" name="form1">
        <select id="Cadastro inputGroupSelect01" onchange="verif()" class="custom-select">
            <option value="aluno">aluno</option>
            <option value="adm">admistração</option>
        </select>
    <div class="_cadastro" id="">

        <label>Nome completo:</label>
        <input type="text" id="input" class="inp" name="nome" placeholder="Nome completo...">
        
        <label>Nome do respónsavel:</label>
        <input type="text" class="inp" name="nome_do_respónsavel" placeholder="Nome do respónsavel...">
      
        <label>Data de nascimento:</label>
        <input type="Date" class="inp" name="data_de_nascimento"  placeholder="Data de nascimento...">

        <div class="d-none" id ="adm">
        <label>Cargo:</label>
        <input type="text" name="cargo" class="inp" placeholder="Insira seu Cargo...">

        <label>SIAPE:</label>
        <input type="text" name="siape" class="inp" placeholder="Insira seu SIAPE..." minlength="9" maxlength="9">
        </div>

        <label>Matrícula:</label>
        <input type="text" class="inp" name="matricula" placeholder="Matrícula..." minlength="9" maxlength="9">

        <label>E-mail:</label>
        <input type="e-mail" class="inp" name="e-mail" placeholder="E-mail...">

         <label>CPF:</label>
        <input type="text" class="inp" name="cpf" id="cpf" placeholder="000.000.000-00" onBlur="ValidarCPF(form1.cpf);" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">

        <label>RG:</label>
        <input type="number" name="RG" class="inp" placeholder="Insira seu RG..."  minlength="9" maxlength="9">

        <label>Senha:</label>
        <input type="password" class="inp" name="pw" id="pw" placeholder="Senha..."minlength="6" maxlength="10" pattern="[a-zA-Z0-9]+$" title="Senha"  >

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="pw2" id="pw2" placeholder="Confirmar Senha..."minlength="6" maxlength="10" pattern="[a-zA-Z0-9]+$" title="Repetir Senha" oninput="validaSenha(this)">
            <?php 
            $pattern = '[a-zA-Z0-9]';
            if (preg_match($pattern, $pw)){return true;}
         ?>

         <button type="submit" class="buuton" value="Validar" onclick="ValidaCPF();">Enviar</button>

    </div>
    </form>

    <script type="text/javascript">
        var bool       = true;

        function verif(){
            var adm        = document.getElementById('adm');
            var opt = document.getElementById('Cadastro').value;
            console.log(opt);
            if (opt == "adm") {
                adm.className = "";
            } else if (opt == "aluno") {
                adm.className = "d-none";
            }
        }

    </script>
</div>
</div> 
</body>
</html>
