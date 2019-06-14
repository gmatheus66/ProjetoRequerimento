<?php 
include "phpBD/conect.php";

try{
    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO FROM REQUERIMENTO ORDER BY SUBTP_ID;");
    $smt -> execute();
    $req = $smt ->fetchAll();
    // $user = $con -> prepare("SELECT ALN_NOME FROM ALUNO WHERE ");

}catch(Exception $ex){

}

?>x    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/status.css">
    <script src="jquery-3.4.1.min.js"></script>
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


<?php foreach(/* $con->query($smt) */ $req as $row): ?>
    <?php if($req > 0):?>
        <h1>Olá Usuario, esses são seus requerimentos.</h1>
    <?php else:?>
        <h1>Você não tem requerimentos no momento.</h1>
    <?php endif;?>
    <div class="card border-success mb-3" style="max-width: 18rem;">
      <div class="card-header"><?=$row['REQ_TIPO']?></div>
      <div class="card-body text-success">
        <h5 class="card-title">Descrição</h5>
        <p class="card-text"><?=$row['REQ_DESCICAO']?></p>
    </div>
        <div class="card-footer bg-transparent border-success"><?= $row['REQ_STATUS']?></div>  
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
    });
});

</script>

</body>
</html>