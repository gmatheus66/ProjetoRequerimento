<?php

session_start();


function redirect($url){
    header('location: ' . $url);
    exit();
}

function logado(){
    return $_SESSION['logado'] ?? false;
}

function logout(){
    return session_destroy();
}


function login($email,$usuario){

    $_SESSION['logado'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['usuario'] = $usuario;
    //var_dump( $_SESSION['logado']);
    //var_dump( $_SESSION['email']);
    //var_dump($_SESSION['usuario']);
    return true;
}
?>