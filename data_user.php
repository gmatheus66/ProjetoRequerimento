<?php
include "phpBD/conect.php";
include "phpBD/func.php";
include  "init.php";

$email = $_SESSION['email'];
$usuario = $_SESSION['usuario'];

if ($usuario == "aluno") {
    try{
        $stmt = $con -> prepare("SELECT ALN_NOME, ALN_EMAIL, ALN_MATRICULA FROM ALUNO WHERE ALN_EMAIL");
        $stmt -> bindParm(1, $email);
        $stmt -> execute();
        $data = $stmt -> fetch();
    }catch(Exception $ex){
        print($ex);
    }
}
if ($usuario == "funcionario") {
    try{
        $stm = $con -> prepare("SELECT FNC_NOME, FNC_EMAIL, FNC_MATRICULA, FNC_TELEFONE FROM FUNCIONARIO WHERE FNC_EMAIL");
        $stm -> bindParm(1, $email);
        $stm -> execute();
        $data = $stm -> fetch();
    }catch(Exception $ex){
        print($ex);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/status.css">
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Dados</title>
</head>
<body>
    <div class="card" style="margin-left: 10%; margin-right: 10%;">
      <?php if ($usuario == "aluno"): ?>
        <h5 class="card-header">Dados do <?=$usuario?> <?= $data["ALN_NOME"]?></h5>
      <?php else if (condition): ?>
        <h5 class="card-header">Dados do <?=$usuario?> <?= $data["FNC_NOME"]?></h5>
      <?php endif ?>    
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
        <?php if(req_exists($aln["ALN_CPF"], $row["REQ_PROTOCOLO"])):?>
            <small class="text-muted">Situação anterior: <?= $stat_hist?></small>
            <small class="text-muted">Situação nova:<?= $stat_hist?></small>
        <?php endif;?>
      </div>
  </div>
</body>
</html>