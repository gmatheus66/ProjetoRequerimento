<?php  
function redirect($url){
	header("location: $url");
}

function logado(){
    return $_SESSION['logado'] ?? false;
}
?>