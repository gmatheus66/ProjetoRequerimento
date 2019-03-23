<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Listagem</title>
  <link rel="stylesheet" href="css/listagem.css">
</head>
<body>
    <?php
       $file= file ('csv/dados.csv');
       for ($i= 0; $i < sizeof($file); $i++) {
           $file[$i] = explode(';', $file[$i]);
       }
   ?>
   <div class="topo">
    <a href="index.html" class="a1"> IFPE</a>
    <br>
    <a href="index.html" class="a2"> Início</a>
    <a href="cadastro.php" class="a2"> Cadastro</a>
    <a href="login.php" class="a2"> Login</a>
    <a href="listagem.php" class="a2"> Listagem</a>
  </div>
  
  <table>
  <tr>
    <th>Nome</th>
    <th>Sobrenome</th>
    <th>Idade</th>
    <th>Email</th>
    <th>Senha</th>
    <th>Matricula</th>
   </tr>
      <?php foreach($file as $dados):?>
    <tr>
        <?php foreach($dados as $listagem):?>
          <td><?= $listagem?></td>
  
    <?php endforeach?>
  </tr>
    <?php endforeach?>
</table> 
</div> 
<div class="baixo"></div>


</body>
</html>