<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="listagem.css">
</head>
<body>
    <?php
       $file= file ('dados.csv');
       for ($i= 0; $i < sizeof($file); $i++) {
       	   $file[$i] = explode(';', $file[$i]);
       }
   ?>
   <button><a href="index.html"> Voltar </a></button>
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


</body>
</html>