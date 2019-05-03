<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="js/jquery-3.4.0.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

   <div class="banner"> 
        <img class="imgBanner" src="imagens/banner.png">  
        <a href="index.php" class="aMenu"> HOME</a>
        <a href="cadastro.php" class="aMenu"> CADASTRO</a>
        <a href="login.php" class="aMenu"> LOGIN</a>
    </div>

<div class= "input">        
    <form class="form" action="login.php" method="POST">
        <select id="Cadastro inputGroupSelect01" onchange="verif()" class="custom-select">
            <option value="aluno">aluno</option>
            <option value="adm">admistração</option>
        </select>
        
    <div class="_cadastro" id="">
        <label>Nome:</label>
        <input type="text" id="input" class="inp" name="nome" placeholder="Nome Completo...">
        

        <label>Nome do respónsavel:</label>
        <input type="text" class="inp" name="sobrenome" placeholder="Nome do Respónsavel...">
      

        <label>Data de nascimento:</label>
        <input type="date" class="inp" name="data de nascimento"  placeholder="Data de nascimento...">

        <div class="d-none" id ="adm">
        <label>Cargo:</label>
        <input type="text" name="cargo" class="inp" placeholder="Insira seu Cargo...">

        <label>SIAPE:</label>
        <input type="text" name="cadFunc" class="inp" placeholder="Insira seu SIAPE..." minlength="9" maxlength="9">
        </div>

        <label>Matrícula:</label>
        <input type="text" class="inp" name="matricula" placeholder="Matrícula..." minlength="9" maxlength="9">

        <label>E-mail:</label>
        <input type="e-mail" class="inp" name="e-mail" placeholder="E-mail...">

         <label>CPF:</label>
        <input type="number" name="cpf" class="inp" placeholder="Insira seu CPF..."   minlength="11" maxlength="11">

        <label>RG:</label>
        <input type="number" name="RG" class="inp" placeholder="Insira seu RG..."  minlength="9" maxlength="9">

        <label>Senha:</label>
        <input type="password" class="inp" name="senha" placeholder="Senha..."minlength="6" maxlength="10">

        <label>Confirmar Senha:</label>
        <input type="password" class="inp" name="senhaConfir" placeholder="Confirmar Senha..."minlength="6" maxlength="10">
     
    </div>

        <button type="submit" class="buuton" onclick="alert('Login efetuado com sucesso!')">Enviar</button>

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
