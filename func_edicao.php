<?php  
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";

// $tipo_de_user = $_SESSION['user'];
// $Fnc_eamil = $_SESSION['Fnc_email'];
$Aln_email = $_SESSION['Aln_email'];

try{
	// if ($tipo_de_user == "aluno") {
		
	// }

	$smtt = $con -> prepare("SELECT * FROM heroku_70137967cfc9460.HISTORICO_SITUACAO");
	$smtt -> execute();
	$func = $smtt -> fecth();

	$oson = $con -> prepare("SELECT FNC_CPF,FNC_NOME FROM heroku_70137967cfc9460.FUNCIONARIO WHERE FNC_EMAIL = ?"); 
	$oson -> bindParam(1, $Fnc_email);
	$oson -> execute();
	$fnc = $oson -> fetch();

    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO, REQ_PROTOCOLO,REQ_MOTIVO,REQ_OBSERVACAO,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO ORDER BY SUBTP_ID;");
    $smt -> execute();
    $req = $smt ->fetchAll();
    $req = array_reverse($req);

    $stmt = $con -> prepare("SELECT ALN_CPF,ALN_NOME FROM heroku_70137967cfc9460.ALUNO WHERE ALN_EMAIL = ?");
    $stmt -> bindParam(1,$alunoemail);
    $stmt -> execute();
    $aln = $stmt ->fetch();

    $st = $con ->prepare("SELECT MTR_ID,MTR_SEMESTRE FROM heroku_70137967cfc9460.MATRICULA  WHERE ALN_CPF = ?");
    $st ->bindParam(1,$aln["ALN_CPF"]);
    $st -> execute();
    $mat = $st -> fetch();

}catch(Exception $e){
	print("Você não é um Funcionario.");	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edição</title>
</head>
<body>
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
                      <h5 class="card-title">Aluno : <?= $aln["ALN_NOME"] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Matricula : <?= $mat["MTR_ID"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $data["DATA"] ?></h6>
                      <!-- <h6 class="card-subtitle mb-2 text-muted">Status : <?= $data["REQ_STATUS"]?></h6> -->
                  	  <h5 class="card-title">Alterar o Status do requerimento.</h5>
                      <select>
                      	<option>ABERTO</option>
                      	<option>FECHADO</option>
                      </select>

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
	  <form action="atua_req.php" method="POST">
	  	<input type="text" name="sit_antiga">
	  	<input type="text" name="sit_nova">
	  	<input type="text" name="obs">
	  </form>
  </div>
<?php endforeach;?>
</body>
</html>