<?php 
include "phpBD/conect.php";
include "phpBD/func.php";
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
    $stmt = $con -> prepare("SELECT ALN_CPF FROM ALUNO WHERE ALN_EMAIL = ?;");
    $stmt -> bindParam(1, $email);
    $stmt -> execute();
    $aln = $stmt ->fetch();


    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_MOTIVO,REQ_OBSERVACAO,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO  WHERE  ALN_CPF = ?;");
    $smt -> bindParam(1 , $aln["ALN_CPF"]);
    $smt -> execute();
    $req = $smt ->fetchAll();
    $req = array_reverse($req);
    //var_dump($req);



/*
    $aln_situ = $con -> prepare("SELECT * FROM heroku_70137967cfc9460.HISTORICO_SITUACAO;");

    $aln_situ = execute();
    $historico = $aln_situ -> fetch();
    var_dump($historico);
*/
}catch(Exception $ex){

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/status.css">
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Meus Requerimentos</title>
</head>
<body>
  <header>
    <?php include 'nav.php' ?>
    
  </header>
  <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
  <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

    

<!-- <a href="#" class="btn btn-outline-primary" id="hide">Hide</a>
<a href="#" class="btn btn-outline-success" id="show">Leia Mais</a>
<div id="box">
    Events
</div>
<div id="mostrar">
    
</div> -->

<div class="containerr">
<div class="view" style="background-image: url('imagens/bg-status2.jpg');background-repeat: no-repeat; background-size: cover;  height: 60%; padding-top: 10%;">

  <div class="text-center" >
     <h3 class="title-Req">Meus Requerimentos</h3>
 </div>

<?php foreach($req as $row): ?>

    <div class="card" style="margin-left: 15%; margin-right: 15%;margin-bottom: 1%;border-color: #59e59d; border-width: 2px;">
        <h5 class="card-header"><?= $row["REQ_TIPO"]?></h5>
        <div class="card-body" id="card">
            <h5 class="card-text">Motivo : <?= $row["REQ_MOTIVO"]?></h5>
            <h5 class="card-text">Observação : <?= $row["REQ_OBSERVACAO"]?></h5>
            <div id="mostrar">
                <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $row["DATA"] ?></h6>
                <?php if ($row["ANX_ID"]!= "Oh shit, Oh no"): ?>
                    <h6 class="card-subtitle mb-2 text-muted">Anexo : <a href="file://///<?= select_anx($row["ANX_ID"]); ?>" target="_blank" class="card-link">Link</a></h6>
                <?php endif; ?>

                    <!-- <h6 class="card-subtitle mb-2 text-muted">Situação Anterior : A espera da análise de um Funcionário</h6> -->

            </div>
           <!-- <a href="#" class="btn btn-success" id="show" style="background-color: #27a582;">VER MAIS</a> -->
        </div>

        <div class="card-footer">
            <small class="text-muted">Status : <?= $row["REQ_STATUS"]?></small>


        </div>
    </div>
<?php endforeach;?>
</div>

<script>
      // let box = window.document.getElementById('box');
      // box.onclick = function(){
      //     box.innerText = 'Click';
           //box.style.width = "30%";
           //box.style.transition = "0.9s"
/*
    $(document).ready(function () {
        $('#show').click(function () {
            $('#mostrar').fadeToggle("slow","linear");
        });
    });
*/

    $('.card-body a').on('click',function () {
       $('.card-body #mostrar').fadeToggle("slow", "linear");
    });
</script>

</body>
</html>