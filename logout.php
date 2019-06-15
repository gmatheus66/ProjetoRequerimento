<?php

include "init.php";
if(!logado()){
    redirect('login.php');
}

logout();

redirect("index.php");



?>