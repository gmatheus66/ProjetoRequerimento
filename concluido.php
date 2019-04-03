<?php

    $dado = $_GET['nome'] . ';' . $_GET['sobrenome'] . ';' . $_GET['idade'] . ';' .  $_GET['e-mail']. ';' .  $_GET ['senha'] . ';' .  $_GET['matricula'] . ';' . "\n";

    $handle = fopen('dados.csv', 'a+');
    fwrite($handle, $dado);
    fclose($dado);
?>
