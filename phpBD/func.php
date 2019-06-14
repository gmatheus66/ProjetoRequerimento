<?php

include "phpBD/conect.php";

function select_anx($anx_id){
    global $con;
    $smt = $con -> prepare("SELECT ANX_HREF FROM ANEXO  WHERE ANX_ID = ?");
    $smt -> bindParam(1,$anx_id);
    $smt -> execute();
    $anx = $smt -> fetch();
    return $anx["ANX_HREF"];
}

?>