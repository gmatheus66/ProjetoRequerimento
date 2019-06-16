<?php  
include "phpBD/conect.php";
include "init.php";
include  "phpBD/func.php";
$user = $_SESSION['usuario'];
if ($user == "aluno") {
  redirect("index.html");
}

// $tipo_de_user = $_SESSION['user'];
// $Fnc_eamil = $_SESSION['Fnc_email'];
$protocolo = $_GET['protocolo'];

try{
	// if ($tipo_de_user == "aluno") {
		
	// }
  function hist(){
    global $con;
  	$smtt = $con -> prepare("SELECT HTS_ID_SIT_ANTERIOR, HTS_ID_SIT_NOVA, HTS_ID FROM heroku_70137967cfc9460.HISTORICO_SITUACAO");
  	$smtt -> execute();
  	$func = $smtt -> fecth();

    return $func;
  }
	$oson = $con -> prepare("SELECT FNC_CPF,FNC_NOME FROM heroku_70137967cfc9460.FUNCIONARIO WHERE FNC_EMAIL = ?"); 
	$oson -> bindParam(1, $Fnc_email);
	$oson -> execute();
	$fnc = $oson -> fetch();

    $smt = $con -> prepare("SELECT REQ_STATUS, REQ_TIPO,REQ_MOTIVO,REQ_OBSERVACAO,ANX_ID,DATE_FORMAT(REQ_DT_ABERTURA,\"%d/%m/%Y\") AS DATA FROM REQUERIMENTO WHERE REQ_PROTOCOLO = ?;");
    $smt -> bindParam(1, $protocolo);
    $smt -> execute();
    $req = $smt ->fetch();

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
  <div class="card">
      <h5 class="card-header"><?= $req["REQ_TIPO"]?></h5>
      <div class="card-body" id="card">
          <h5 class="card-title"><?= $req["REQ_MOTIVO"]?></h5>
          <p class="card-text"><?= $req["REQ_OBSERVACAO"]?></p>
          <div id="mostrar">
              <div class="card card-aln" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title">Aluno : <?= $aln["ALN_NOME"] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Matricula : <?= $mat["MTR_ID"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Data de Abertura : <?= $req["DATA"] ?></h6>
                      <h6 class="card-subtitle mb-2 text-muted">Status : <?= $req["REQ_STATUS"]?></h6>
                  	  <h5 class="card-title">Alterar o Status do requerimento:</h5>
                      <?php if ($req["ANX_ID"]!= "Oh shit, Oh no"): ?>
                        <a href="file://///<?= select_anx($req["ANX_ID"]); ?>" target="_blank" class="card-link">ANEXO</a>
                      <?php endif; ?>
                      <form action="nova_situ.php/?protocolo=<?=$protocolo?>">
                      	<!-- <input type="text" name="sit_antiga">
                      	<input type="text" name="sit_nova"> -->
                      	 <input type="text" name="obs">
                          <select name="status">
                              <option value="0">ABERTO</option>
                              <option value="1">FECHADO</option>
                              <option value="2">ANÁLISE</option>
                          </select>
                          <input type="submit">
                      </form>
                  </div>
              </div>
          </div>
          <a href="#" class="btn btn-primary" id="show">VER MAIS</a>
      </div>
      <div class="card-footer">
          <small class="text-muted"><?= $req["REQ_STATUS"]?></small>
      </div>
  </div>
</body>
</html>