<?php
include "phpBD/conect.php";
include "phpBD/func.php";
include  "init.php";

$email = $_SESSION['email'];
$usuario = $_SESSION['usuario'];

if ($usuario == "aluno") {
    try{
        $stmt = $con -> prepare("SELECT ALN_NOME, ALN_EMAIL, ALN_MATRICULA, ALN_CPF FROM ALUNO WHERE ALN_EMAIL = ?;");
        $stmt -> bindParm(1, $email);
        $stmt -> execute();
        $data = $stmt -> fetch();
    }catch(Exception $ex){
        print($ex);
    }

    try{
      $oson = $con -> prepare("SELECT COUNT(REQ_PROTOCOLO) FROM REQUERIMENTO WHERE ALN_CPF = ?;");
      $oson -> bindParm(1, $data["ALN_CPF"]);
      $oson -> execute();
      $data_req = $oson -> fetch();
    }catch(Exception $ex){
      print($ex);
    }

}elseif ($usuario == "funcionario") {
    try{
        $stm = $con -> prepare("SELECT FNC_NOME, FNC_EMAIL, FNC_MATRICULA, FNC_TELEFONE FROM FUNCIONARIO WHERE FNC_EMAIL = ?;");
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
        <div class="card-body" id="card">
            <h5 class="card-title"><?= $data["REQ_MOTIVO"]?></h5>
            <div id="mostrar">
                <h6 class="card-subtitle mb-2 text-muted">Nome do <?=$usuario?>: <?= $data["ALN_NOME"]?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Matrícula : <?= $data["ALN_MATRICULA"]?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Email : <?= $data["ALN_EMAIL"]?></h6>
            </div>
        </div>
      <?php elseif (condition): ?>
        <h5 class="card-header">Dados do <?=$usuario?> <?= $data["FNC_NOME"]?></h5>
        <div class="card-body" id="card">
            <h5 class="card-title"><?= $data["REQ_MOTIVO"]?></h5>
            <div id="mostrar">
                <h6 class="card-subtitle mb-2 text-muted">Nome do <?=$usuario?>: <?= $data["FNC_NOME"]?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Matrícula : <?= $data["FNC_MATRICULA"]?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Email : <?= $data["FNC_EMAIL"]?></h6>
            </div>
        </div>
      <?php endif ?>    
      <?php if ($usuario == "aluno"): ?>
        <div class="card-footer">
          <small class="text-muted">Você tem <?= $data_req[0]?> requerimentos.</small>
        </div>
      <?php endif ?>
  </div>
</body>
</html>