<!DOCTYPE html>
<html lang="en">
<?php

include "init.php";


if (logado()){
    redirect('index.php');
}

?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="css/login.css" />-->
    <!-- <link rel="stylesheet" href="css/logintest.css"> -->
     <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link  href="js/validar.js">

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
<?php include 'nav.php' ?>
        <header>
          <!--Navbar-->
            <?php include 'nav.php' ?>
          <!-- Navbar -->
          <!-- Full Page Intro -->
          <div class="view" style="background-image: url('imagens/bg-login.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                <div class="containerr">
                  <div class="box" style="opacity: 0.9;">
                      <?php if($_GET['ml']): ?>

                      <div class="alert alert-dark" role="alert">
                          <h3><?= $_GET['ml'] ?></h3>
                      </div>
                      <?php endif; ?>
            
                        <form action="auth.php" method="POST">
                    <div class="card wow fadeInRight" data-wow-delay="0.3s" style="border-radius: 7%;height: auto;padding: 20px;">
                      <div class="card-body">
                        <!--Header-->
                        <div class="text-center" >
                          <h3 class="white-text">
                            <i class="fas fa-user white-text"></i> Entrar</h3>

    
                                <input type="text" name="cpf" class="white-text form-control" style="margin-top: 50px" placeholder="CPF"
                                name="cpf" id="cpf" onBlur="ValidarCPF(form1.cpf);" 
                                onkeydown="javascript: fMasc( this, mCPF );"maxlength="14" >
                                <br>

                                <input type="password"name="pw" class="white-text form-control" placeholder="Senha" minlength="6" maxlength="10" pattern="[a-zA-Z0-9]+$">
                                <br>

                               <button  type="submit" value="Validar" onclick="ValidaCPF();" class="btn btn-success" style="width:50%;">Entrar</button>
                                <br>
                                <br>

                                 <a href="cadastro.php" class="link-cadastro">Ainda não é cadastrado? Cadastre-se!</a>
                                <br> 

                                <a href="recuperar.php" class="link-recuperar">Esqueceu a senha?</a>

                        </div>
                        </div>
                        <!--Body-->
                        <div id="show">

                        </div>
                        
                        </div>
                      </div>
                    </div>
                    <!--/.Form-->
                </form>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
                    <!--<hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                    <h5 class="text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>Photography & design</strong></h5>
                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">portfolio</a>
                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">About me</a> -->
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
          <!-- Full Page Intro -->
        </header>

<!-- <div>



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
   </form> -->


</body>
</html>