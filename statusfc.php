<?php

include "phpBD/conect.php";
include "init.php";
/*
if(!logado()){
    redirect('login.php');
}
*/
try{
   $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_DT_ABERTURA,REQ_MOTIVO,REQ_OBSERVACAO FROM REQUERIMENTO ORDER BY SUBTP_ID;");
   $smt -> execute();
   $req = $smt ->fetchAll();


}catch(Exception $ex){

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

<!--<a href="#" class="btn btn-outline-primary" id="hide">Hide</a>
<a href="#" class="btn btn-outline-success" id="show">Leia Mais</a>-->
<div id="box">
    Events
</div>




<?php foreach(/* $con->query($smt) */ $req as $row): ?>
    <div class="card border-success mb-3" style="max-width: 18rem;">
      <div class="card-header">Header</div>
      <div class="card-body text-success">php
        <h5 class="card-title">Success card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
        <div class="card-footer bg-transparent border-success"><?= $row['REQ_STATUS']?></div>  
    </div>
<?php endforeach;?>


<?php foreach($req as $data): ?>
<?php var_dump($data)?>
  <div class="card" style="margin-left: 10%; margin-right: 10%;">
      <h5 class="card-header"><?= $data["REQ_TIPO"]?></h5>
      <div class="card-body" id="card">
          <h5 class="card-title"><?= $data["REQ_MOTIVO"]?></h5>
          <p class="card-text"><?= $data["REQ_OBSERVACAO"]?></p>
          <div id="mostrar"></div>
          <a href="#" class="btn btn-primary" id="show">VER MAIS</a>
      </div>
      <div class="card-footer">
          <small class="text-muted"><?= $data["REQ_STATUS"]?></small>
          <small class="text-muted"><?= $data["REQ_DT_ABERTURA"]?></small>
      </div>
  </div>
<?php endforeach;?>

<script>
      // let box = window.document.getElementById('box');
      // box.onclick = function(){
      //     box.innerText = 'Click';
           //box.style.width = "30%";
           //box.style.transition = "0.9s"

$('#hide').on('click', function(){
    $('#mostrar').hide(1500, function(){
        alert('Deu certo');

    });

});
$('#show').on('click', function(){
    $('#mostrar').show(1000,function(){
        alert("Também deu certo");
        $('.card-body').append(`<a href="#" class="btn btn-primary"> Hide </a>`);
    });
    $('#show').remove();
});

</script>

</body>
</html>