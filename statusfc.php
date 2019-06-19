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
//$email = "vjhg@bol.com";
$email = $_SESSION['email'];
$usuario = $_SESSION['usuario'];
//$usuario = "aluno";
try{
    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_MOTIVO,REQ_OBSERVACAO,ALN_CPF,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO ORDER BY SUBTP_ID;");
    $smt -> execute();
    $req = $smt ->fetchAll();
    $req = array_reverse($req);
    //$protocolo = $req['REQ_PROTOCOLO'];
    //var_dump($protocolo);
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
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/statusfc.css">
    <script src="js/jquery-3.4.0.min.js"></script>
    <title>Status - Funcionário</title>
</head>
<body>

<!-- 
    <?php if (!logado()): //colocar funcao !logado() ?>
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
<?php endif; ?> -->
<!--<a href="#" class="btn btn-outline-primary" id="hide">Hide</a>
<a href="#" class="btn btn-outline-success" id="show">Leia Mais</a>-->


<?php include 'nav.php' ?>

<div class="view" style="background-image: url('imagens/bg-status5.jpg');background-repeat: no-repeat; background-size: cover;  height: 60%; padding-top: 10%;">

  <div class="text-center" >
     <h3 class="title-Req">Requerimentos</h3>
 </div>


<?php foreach($req as $data): ?>
<?php //var_dump($data)?>
  <div class="card" style="margin-top:2%;margin-left: 15%; margin-right: 15%;margin-bottom: 1%;border-color: #59e59d; border-width: 2px;">
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
                        <a href="file://///<?= select_anx($data["ANX_ID"]); ?>" target="_blank" class="card-link" style="color: #27a582;">ANEXO</a>
                      <?php endif; ?>

                  </div>
              </div>
          </div>
          <a href="#" class="btn btn-primary" id="show" style="background-color: #27a582; margin-top: 1%;">VER MAIS</a>
      </div>

         <a href="func_edicao.php/?protocolo=<?=$data["REQ_PROTOCOLO"]?>" class="btn btn-primary" style="background-color: #27a582;">EDITAR</a>
         <!-- <input type="submit" name="EDITAR"> -->
      <!-- </form> -->
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