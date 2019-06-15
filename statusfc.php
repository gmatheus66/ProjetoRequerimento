<?php

include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";
/*
if(!logado()){
    redirect('login.php');
}
*/
//$alunoemail = $_SESSION['Aln_email'];
$email = "vjhg@bol.com";
//$usuario = $_SESSION['usuario'];
$usuario = "aluno";
try{
   $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_MOTIVO,REQ_OBSERVACAO,ALN_CPF,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO ORDER BY SUBTP_ID;");
   $smt -> execute();
   $req = $smt ->fetchAll();
   $req = array_reverse($req);

//var_dump($req);


function mtr($alncpf){
    global $con;
    $st = $con->prepare("SELECT MTR_ID,MTR_SEMESTRE FROM MATRICULA  WHERE ALN_CPF = ?");
    $st->bindParam(1, $alncpf);
    $st->execute();
    $mat = $st->fetch();
    //var_dump($mat);
    return $mat;
}
}catch(Exception $ex){
    print_r($ex);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/status.css">
    <link rel="stylesheet" href="css/statusfc.css">
    <script src="js/jquery-3.4.0.min.js"></script>
    <title>Document</title>
</head>
<body>
  <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
  <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

    <div>
  <a class="tilt" href="index.php"><img class="logoIF" src="imagens/logoIF.png"></a>
  <span class="titleBanner"><a class="tilt" href="index.php"> Instituto Federal de Pernambuco</a></span>
</div>

<div class="banner"> 
    <img class="imgBanner" src="imagens/banner.png">  
    <span><a href="index.php" class="aMenu" > HOME</a></span>
    <span><a href="cadastro.php" class="aMenu"> CADASTRO</a></span>
    <span><a href="login.php" class="aMenu"> ENTRAR</a></span>

    <?php if (false): //colocar funcao !logado() ?>
        <span><a href="requerimento.php" class="aMenu"> REQUERIMENTO</a></span>
    <?php else: ?>
        <div class="img1">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="imagens/user.png" class="img-circle" alt="Avatar" style="width:120px;height:120px;">
                    </div>
                    <div class="flip-card-back">
                        <?if ($usuario == "aluno"):?>
                            <h1><?= aluno_nome($email) ?></h1>
                            <?else:?>
                            <h1><?= func_nome($email) ?></h1>
                        <?endif; ?>
                        <a href="logout.php"><img src="imagens/logout.png" class="img2" alt="logout"></a>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>
<!--<a href="#" class="btn btn-outline-primary" id="hide">Hide</a>
<a href="#" class="btn btn-outline-success" id="show">Leia Mais</a>-->



<?php foreach($req as $data): ?>
<?php //var_dump($data)?>
  <div class="card">
      <h5 class="card-header"><?= $data["REQ_TIPO"]?></h5>
      <div class="card-body" id="card">
          <h5 class="card-title"><?= $data["REQ_MOTIVO"]?></h5>
          <p class="card-text"><?= $data["REQ_OBSERVACAO"]?></p>
          <div id="mostrar">
              <div class="card card-aln" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title">Aluno : <?= aluno_nome_cpf($data["ALN_CPF"])["ALN_NOME"] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Matricula : <?= mtr($data["ALN_CPF"])["MTR_ID"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $data["DATA"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Status : <?= $data["REQ_STATUS"]?></h6>

                      <?php if ($data["ANX_ID"]!= "Oh shit, Oh no"): ?>
                        <a href="file://///<?= select_anx($data["ANX_ID"]); ?>" target="_blank" class="card-link">ANEXO</a>
                      <?php endif; ?>

                  </div>
              </div>
          </div>
          <a href="#" class="btn btn-primary" id="show">VER MAIS</a>
      </div>
      <div class="card-footer">
          <small class="text-muted"><?= $data["REQ_STATUS"]?></small>
      </div>
      <a href="func_edicao.php/?$protocolo=<?=$data['REQ_PROTOCOLO']?>" class="btn btn-primary">EDITAR</a>
  </div>
<?php endforeach;?>

<script>
      // let box = window.document.getElementById('box');
      // box.onclick = function(){
      //     box.innerText = 'Click';
           //box.style.width = "30%";
       //box.style.transition = "0.9s"


      $(document).ready(function () {
          $('#show').click(function () {
              $('#mostrar').fadeToggle("slow","linear");
          })

      })
/*

$('#show').on('click', function(){
    $('#mostrar').toggle(1000,function(){
        //alert("Também deu certo");
        $('.card-body').append(`<a href="#" class="btn btn-primary" id="hide"> Hide </a>`);
    });
    $('#show').remove();
});

$('#hide').on('click', function(){
    $('#mostrar').hide(1500, function(){
           //alert('Deu certo');
        $('.card-body').append(`<a href="#" class="btn btn-primary" id="show">VER MAIS</a>`)
    });
    $('#hide').remove();

});

 */
</script>

</body>
</html>