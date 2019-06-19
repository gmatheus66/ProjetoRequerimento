<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>recuperar</title>
	<link rel="stylesheet" type="text/css" href="css/recuperar.css"/>
</head>
<body>
<div class="view" style="background-image: url('imagens/recuperar.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

<h1>Recuperar Senha</h1>

<a class= "r1">Informe o email do usuário</a>

	<form action="recuperar.php">
	<div class="inpu">
	<input type="text" placeholder="E-mail...">
	<button type="submit" class="buuton" onclick="alert('Enviado!') ">Enviar</button>
	

	<script>
		 $email = isset($_POST["email"]) ? $_POST["email"] : "";


	$consulta = mysql_query("SELECT * FROM cadastro WHERE email = '$email'");

	if (mysql_num_rows($consulta == 0 )) {
	echo "<script language='Javascript'>"
			alert('Não encontramos o seu email na base de dados!');
			location.href='recuperar.php';
		}
		/*

 no corpo do email coloco o link para o usuario redefinir a senha 

http://redefineasenha.com.br?key=$key
função que gera o token = random bytes e bin2hex .
$key = rand(); funcao parar gerar o numero token
*/
	</script>
  

  </form>
	</div> 
</html>