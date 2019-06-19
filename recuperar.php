<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>recuperar</title>
	<link rel="stylesheet" type="text/css" href="css/recuperar.css"/>
</head>
<body>
<div class="view" style="background-image: url('imagens/recuperar.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">


<a class="r1">Recuperar a Senha</a>

<a class= "r1">Informe o login do usuário que deseja</a>


	<form action="recuperar.php">
	<div class="inpu">

	<input type="text" placeholder="Login">
	<br>
	<button type="submit" class="buuton" onclick="alert('Enviado!')"> Enviar </button>
  </form>

  <script>
  $email = isset($_POST["cpf"]) ? $_POST["cpf"] : "";


	$consulta = mysql_query("SELECT * FROM cadastro WHERE cpf = '$cpf'");

	if (mysql_num_rows($consulta == 0 )) {
	echo "<script language='Javascript'>"
			alert('Não encontramos o seu cpf na base de dados!');
			location.href='recupera.php';
		</script>";
	}
$key = rand(); funcao parar gerar o numero token

/* no corpo do email coloco o link para o usuario redefinir a senha 

http://redefineasenha.com.br?key=$key
função que gera o token = random bytes e bin2hex .
*/


 </script>
	</div> 
</html>


$email = isset($_POST["cpf"]) ? $_POST["cpf"] : "";


	$consulta = mysql_query("SELECT * FROM cadastro WHERE email = '$email'");

	if (mysql_num_rows($consulta == 0 )) {
	echo "<script language='Javascript'>
			alert('Não encontramos o seu cpf na base de dados!');
			location.href='recupera.php';
		</script>";
	}
$key = rand(); //  funcao parar gerar o numero token

/* no corpo do email coloco o link para o usuario redefinir a senha */

http://redefineasenha.com.br?key=$key