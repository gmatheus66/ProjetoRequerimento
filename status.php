<?php 
include "phpBD/conect.php";
include  "init.php";

$email = $_SESSION['email'];
$usuario = $_SESSION['usuario'];

if($usuario != "aluno"){
    redirect('index.php');
}
if(!logado()){
    redirect('index.php');
}
try{
    $stmt = $con -> prepare("SELECT ALN_CPF FROM heroku_70137967cfc9460.ALUNO WHERE ALN_EMAIL = ?;");
    $stmt -> bindParam(1, $email);
    $stmt -> execute();
    $aln = $stmt ->fetch();


    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_MOTIVO,REQ_OBSERVACAO,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO  WHERE  ALN_CPF = ?;");
    $smt -> bindParam(1 , $aln["ALN_CPF"]);
    $smt -> execute();
    $req = $smt ->fetchAll();
    $req = array_reverse($req);
    //var_dump($req);
    // $user = $con -> prepare("SELECT ALN_NOME FROM ALUNO WHERE ");

/*

    $aln_situ = $con -> prepare("SELECT HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, HTS_ID, REQ_PROTOCOLO FROM heroku_70137967cfc9460.HISTORICO_SITUACAO WHERE REQ_PROTOCOLO = ?;");
    $aln_situ = bindParam(1, $req["REQ_PROTOCOLO"]);
    $aln_situ = execute();
    $historico = $aln_situ -> fetch();
    $stat_hist;

*/
    if ($historico["HTS_ID_SIT_NOVA"] == 0){
        $stat_hist = "ABERTO";
    }else if($historico["HTS_ID_SIT_NOVA"] == 1){
        $stat_hist = "FECHADO";
    }else{
        $stat_hist = "ANÁLISE";
    }


}catch(Exception $ex){

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/status.css">
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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
<span class="titleBanner2">Requerimentos</span>
<div class="banner"> 
    <img class="imgBanner" src="imagens/banner.png">  
    <span><a href="index.php" class="aMenu" > HOME</a></span>
    <span><a href="cadastro.php" class="aMenu"> CADASTRO</a></span>
    <span><a href="login.php" class="aMenu"> ENTRAR</a></span>
    <span><a href="requerimento.php" class="aMenu"> REQUERIMENTO</a></span>
</div>

<!-- <a href="#" class="btn btn-outline-primary" id="hide">Hide</a>
<a href="#" class="btn btn-outline-success" id="show">Leia Mais</a>
<div id="box">
    Events
</div>
<div id="mostrar">
    
</div> -->



<?php foreach($req as $row): ?>

  <div class="card" style="margin-left: 10%; margin-right: 10%;">
      <h5 class="card-header"><?= $row["REQ_TIPO"]?></h5>
      <div class="card-body" id="card">
          <h5 class="card-title"><?= $row["REQ_MOTIVO"]?></h5>
          <p class="card-text"><?= $row["REQ_OBSERVACAO"]?></p>
          <div id="mostrar">
              <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $row["DATA"] ?></h6>
              <h6 class="card-subtitle mb-2 text-muted">Status : <?= $row["REQ_STATUS"]?></h6>
          </div>
          <a href="#" class="btn btn-primary" id="show">VER MAIS</a>
      </div>
      <div class="card-footer">
          <small class="text-muted"><?= $row["REQ_STATUS"]?></small>
          <small class="text-muted"><?= $row["REQ_DT_ABERTURA"]?></small>
          <small class="text-muted">Situação anterior: <?= $stat_hist["HTS_ID_SIT_ANTERIOR"]?></small>
          <small class="text-muted">Situação nova:<?= $stat_hist["HTS_ID_SIT_NOVO"]?></small>
      </div>
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
        });
    });

</script>

</body>
</html>