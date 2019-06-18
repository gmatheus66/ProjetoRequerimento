<?php include 'init.php'; ?>

<!DOCTYPE html>
<html lang="en">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet"  type="text/css" href="css/cadastro.css">
 <script src="js/jquery-3.4.0.min.js"></script>
 <link href="js/validar.js">
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
    <body>
        <header>
          <!--Navbar-->
            <?php include 'nav.php' ?>
          <!-- Navbar -->
          <!-- Full Page Intro -->
          <div class="view" style="background-image: url('imagens/bg1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
<div class="mask rgba-gradient align-items-center">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row mt-5">
                    <div>
                        <h5><?=$_GET["mr"] ?></h5>
                    </div>
                  <!--Grid column-->
                  <div class="col-md-6 mb-5 mt-md-0 mt-5 mt-0 white-text text-center text-md-left" ;>
                    <h1 class="h1-responsive font-weight-bold wow fadeInLeft txtCadastro" data-wow-delay="0.3s" style="margin-top: 25%; margin-bottom: 5%;font-size: 40px;">Cadastre-se agora.</h1>
                    <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s" style="text-shadow: ">
                    <h6 class="mb-3 wow fadeInLeft txtCadastro" data-wow-delay="0.3s" >Tenha mais praticidade na hora de pedir seu requerimento, com nossa plataforma online você poupa o tempo que levaria preenchendo a papelada, além disso vocẽ pode acompanhar o status do mesmo na nossa plataforma, mais agilidade na hora de pedir seu requerimento tudo isso no conforto da sua casa, e na tela do seu smartphone ou computador.</h6>
                    <a class="btn btn-outline-white wow fadeInLeft" data-wow-delay="0.3s"></a>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-md-6 col-xl-5 mb-4 mt-0" style="margin-top: 5%; margin-left: 7%;">
                    <!--Form-->
                      <form action="register.php" method="POST">
                    <div class="card wow fadeInRight" data-wow-delay="0.3s" style="opacity: 0.9";>
                      <div class="card-body" mt-0>
                        <!--Header-->
                        <div class="text-center" >
                          <h3 class="white-text">
                            <i class="fas fa-user white-text"></i> Cadastro</h3>
                          <hr class="hr-light">

                            <select name="usuario" id="select" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected>Escolha</option>
                                <option value="aluno">Aluno</option>
                                <option value="funcionario">Funcionario</option>
                            </select>
                        </div>
                        <!--Body-->
                        <div id="show">

                        </div>
                        <div class="text-center mt-4">
                          <button class="btn btn-indigo">Próximo</button>

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
        <!-- Main navigation -->
        <!--Main Layout-->

        <script>
            let slc = $('#select');
            let show = $('#show');
            
            slc.on('click', function (evt) {
                //console.log($(evt.target).val());
                if($(evt.target).val() == "aluno"){
                    show.find('.md-form').remove().end();
                        $('#show').show(2000, function () {
                            $('<div class="md-form mat">\n' +
                                ' <i class="fas fa-user prefix white-text active"></i>\n' +
                                ' <label for="form2" class="active">Matricula</label>\n' +
                                ' <input type="text" name="matricula" id="form3" class="white-text form-control mtr">\n' +
                                ' </div>\n' +
                                ' <div class="md-form">\n' +
                                ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                                ' <label for="form4" class="active">Nome Completo</label>\n' +
                                ' <input type="text" name="name" id="form5" class="white-text form-control">\n' +
                                ' </div>\n' +
                                '<div class="md-form">\n' +
                                '<i class="fas fa-lock prefix white-text active"></i>\n' +
                                '<label for="form6">Email</label>\n' +
                                '<input type="email" name="email" id="form7" class="white-text form-control">\n' +
                                '</div>'+
                            ' <div class="md-form">\n' +
                            ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                            ' <label for="form8" class="active">Data de Nascimento</label>\n' +
                            ' <input type="date" name="dt_nasc" id="form9" class="white-text form-control">\n' +
                            ' </div>'+
                            ' <div class="md-form">\n' +
                            ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                            ' <label for="form10" class="active">CPF</label>\n' +
                            ' <input type="text" name="cpf" id="form11" class="white-text form-control" onBlur="ValidarCPF(form1.cpf);" onkeydown="javascript: fMasc( this, mCPF );"maxlength="14">\n' +
                            ' </div>' +
                            ' <div class="md-form">\n' +
                            ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                            ' <label for="form12" class="active">Senha</label>\n' +
                            ' <input type="password" name="pw" id="form13" class="white-text form-control">\n' +
                            ' </div>' +
                            ' <div class="md-form">\n' +
                            ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                            ' <label for="form14" class="active">Confirmação Senha</label>\n' +
                            ' <input type="password" name="pw2" id="form15" class="white-text form-control">\n' +
                            ' </div>').appendTo(show);
                        })
                    }
                    else if($(evt.target).val() == "funcionario"){
                        show.find('.md-form').remove().end();
                        $('#show').show(1000, function () {
                        })
                    $('<div class="md-form">\n' +
                        ' <i class="fas fa-user prefix white-text active"></i>\n' +
                        ' <label for="form2" class="active">Matricula</label>\n' +
                        ' <input type="text"  name="matricula" id="form3" class="white-text form-control">\n' +
                        ' </div>\n' +
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form4" class="active">Nome Completo</label>\n' +
                        ' <input type="text" name="name" id="form5" class="white-text form-control">\n' +
                        ' </div>\n' +
                        '<div class="md-form">\n' +
                        '<i class="fas fa-lock prefix white-text active"></i>\n' +
                        '<label for="form6">Email</label>\n' +
                        '<input type="text" name="email" id="form7" class="white-text form-control">\n' +
                        '</div>'+
                        '<div class="md-form">\n' +
                        '<i class="fas fa-lock prefix white-text active"></i>\n' +
                        '<label for="form6">Cargo</label>\n' +
                        '<input type="text" name="cargo" id="form7" class="white-text form-control">\n' +
                        '</div>'+
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form8" class="active">Telefone</label>\n' +
                        ' <input type="text" name="telefone" id="form9" class="white-text form-control">\n' +
                        ' </div>'+
                        '<div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form10" class="active">RG</label>\n' +
                        ' <input type="text" name="rg" id="form11" class="white-text form-control">\n' +
                        ' </div>'+
                        '<div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form12" class="active">RG Orgao expeditor</label>\n' +
                        ' <input type="text" name="rg_orgao" id="form13" class="white-text form-control">\n' +
                        ' </div>'+
                        '<div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form14" class="active">RG Estado</label>\n' +
                        ' <input type="text" name="rg_estado" id="form15" class="white-text form-control">\n' +
                        ' </div>'+
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form16" class="active">CPF</label>\n' +
                        ' <input type="text" name="cpf" id="form17" class="white-text form-control" onBlur="ValidarCPF(form1.cpf);" onkeydown="javascript: fMasc( this, mCPF );"maxlength="14">\n' +
                        ' </div>' +
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form18" class="active">Senha</label>\n' +
                        ' <input type="password"  name="pw" id="form19" class="white-text form-control">\n' +
                        ' </div>'+
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form20" class="active">Confirmação Senha</label>\n' +
                        ' <input type="password"  name="pw2" id="form21" class="white-text form-control">\n' +
                        ' </div>').appendTo(show);
                    }
                    else{
                    show.find('.md-form').remove().end();
                    }
            })
 /*
            show.find('.mat').on('blur',function (evt) {
                console.log($(evt.target).length);
                if($(evt.target).val().length > 0){
                    $('<div class="md-form">\n' +
                        ' <i class="fas fa-user prefix white-text active"></i>\n' +
                        ' <label for="form2" class="active">Matricula</label>\n' +
                        ' <input type="text" name="matricula" id="form3" class="white-text form-control mtr">\n' +
                        ' </div>\n' +
                        ' <div class="md-form">\n' +
                        ' <i class="fas fa-envelope prefix white-text active"></i>\n' +
                        ' <label for="form4" class="active">Nome Completo</label>\n' +
                        ' <input type="text" id="form5" class="white-text form-control">\n' +
                        ' </div>\n' +
                        '<div class="md-form">\n' +
                        '<i class="fas fa-lock prefix white-text active"></i>\n' +
                        '<label for="form6">Email</label>\n' +
                        '<input type="email" id="form7" class="white-text form-control">\n' +
                        '</div>').appendTo('.mat');
                }
            })
*/
        </script>
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
    </body>
</html>