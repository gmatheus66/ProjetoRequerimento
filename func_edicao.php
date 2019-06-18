<?php  
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";
$protocolo = $_GET['protocolo'];
$user = $_SESSION['usuario'];
$email = $_SESSION['email'];

if ($user == "aluno") {
    redirect("index.html");
}


try{
  function hist(){
    global $con;
  	$smtt = $con -> prepare("SELECT HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, HTS_ID FROM HISTORICO_SITUACAO");
  	$smtt -> execute();
  	$func = $smtt -> fecth();

    return $func;
  }
  $oson = $con -> prepare("SELECT FNC_CPF,FNC_NOME FROM FUNCIONARIO WHERE FNC_EMAIL = ?"); 
  $oson -> bindParam(1, $email);
  $oson -> execute();
  $fnc = $oson -> fetch();

  $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO,REQ_MOTIVO,REQ_OBSERVACAO,ANX_ID,ALN_CPF,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO WHERE REQ_PROTOCOLO = ?;");
  $smt -> bindParam(1, $protocolo);
  $smt -> execute();
  $req = $smt ->fetch();

  $stmt = $con -> prepare("SELECT ALN_CPF,ALN_NOME,ALN_MATRICULA FROM ALUNO WHERE ALN_CPF = ?");
  $stmt -> bindParam(1, $req["ALN_CPF"]);
  $stmt -> execute();
  $aln = $stmt ->fetch();

    // $st = $con ->prepare("SELECT MTR_ID,MTR_SEMESTRE FROM heroku_70137967cfc9460.MATRICULA  WHERE ALN_CPF = ?");
    // $st ->bindParam(1,$aln["ALN_CPF"]);
    // $st -> execute();
    // $mat = $st -> fetch();

}catch(Exception $e){
	print("Você não é um Funcionario.");
	print_r($ex);
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css"  href="/css/status.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/func_edicao.css">
    <script src="/js/jquery-3.4.0.min.js"></script>
    <title>Edicao</title>
</head>
<body>

<header>
    <?php include 'nav.php' ?>
    <div class="view" style="background-image: url('/imagens/bg2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
</header>
<body>

<div class="oson">
  <div  class="card" style="margin: 0;">
      <h5 class="card-header"><?= $req["REQ_TIPO"]?></h5>
      <div class="card wow fadeInRight" data-wow-delay="0.3s" style="opacity: 0.9;">
          <div class="card-body" id="card">
              <h5 class="card-title"> Motivo: <?= $req["REQ_MOTIVO"]?></h5>
              <p class="card-text">Observação: <?= $req["REQ_OBSERVACAO"]?></p>
          <div id="mostrar">
              <div class="card card-aln" style="width: 64rem;">
                  <div class="card-body">
                      <h5 class="card-title">Aluno : <?= $aln["ALN_NOME"] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted white-text">Matricula : <?= $aln["ALN_MATRICULA"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $req["DATA"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Status : <?= $req["REQ_STATUS"]?></h6>
                      <?php if ($req["ANX_ID"]!= "Oh shit, Oh no"): ?>
                          <a href="file:///upload\<?= select_anx($req["ANX_ID"])["ANX_ID"]; ?>" target="_blank" class="card-link">ANEXO</a>
                      <?php endif; ?>
                      <h5 class="card-title t1">Alterar o Status do requerimento:</h5>
                      <form action="/nova_situ.php" method="POST">
                          <input type="hidden" name="protocolo" value="<?= $protocolo ?>" />
                          <div class="input-group mb-3">
                              <input type="text" class="form-control " name="obs" placeholder="Observação" aria-label="Recipient's username" aria-describedby="button-addon2">
                          </div>
                          <select class="custom-select" id="inputGroupSelect01" name="status">
                              <option selected>Escolha</option>
                              <option value="0">ABERTO</option>
                              <option value="2">ANÁLISE</option>
                              <option value="1">FECHADO</option>
                          </select>
                          <input type="submit" class="btn btn-outline-success btn1">
                      </form>
                  </div>
              </div>
          </div>
          <a href="#" class="btn btn-primary" id="show">VER MAIS</a>
        </div>

      </div>
  </div>
</div>

   <script>
       $(document).ready(function () {
           $('#show').click(function () {
               console.log("entrou");
               $('#mostrar').fadeToggle("slow","linear");
           })

       })
   </script>
</body>
</html>