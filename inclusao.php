<?php

// Recebe variáveis globais do formulário
global $nome;
global $unidade;
global $telefone;
global $email;
global $cargo;

//Tirar espaço em branco das variáveis recebidas através do formulário
$nome = trim($nome);
$unidade = trim($unidade);
$telefone = trim($telefone);
$email = trim($email);
$cargo = trim($cargo);


//Consiste as variáveis recebidas
if (empty($nome) || empty($unidade) || empty($telefone) || empty($cargo)) {
	
	/*
	Comentar blocos de código
	*/
	
	// se campos obrigatórios nao preenchidos, recria o formulário e exibe mensagem de erro
	
	echo ('
	<html>
	<head>
	<title>Inclusao.php</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	</head>
	<body bgcolor="#ffffff" text="#000000" link="#333399" vlink="#CC0000" alink="#663399">
	');
	
	echo ("<p><center><img src=\"topo.jpg\" width=\"640\" height=\"400\"></center></p>");
	
	echo ("font color=\"#FF0000\"><b>Campo(s) obrigatório(s) não preenchido(s)</b></font>");

	echo ("
	<table width=\"640\" border=\"0\" cellspacing=\"0\" align=\"center\">
		<tr>
			<td>
				<p><b>Formulário de inclusão: <br></b></p>
				<form method=\"post\" action\"inclusao.php\">
				<p>Nome completo:
					<input type=\"text\" name=\"nome\" value=\"$nome\" size=\"25\" maxlength=\"50\">
				</p>
				<p>Unidade:
					<input type=\"text\" name\"unidade\" value=\"$unidade\" size=\"40\" maxlength=\"40\"> 
				 </p>
				 <p>Telefone:
					<input type=\"text\" name=\"telefone\" value=\"$telefone\" maxlength=\"10\" size=\"10\">
				 </p>
				 <p>E-mail:
					<input type=\"text\" name=\"email\" value=\"$email\" size=\"25\" maxlength=\"40\">
				 </p>
				 <p>Cargo:
					<input type=\"text\" name=\"cargo\" value=\"$cargo\" size=\"40\" maxlength=\"40\">
				 </p>
					<p>
						<input type=\"submit\" name=\"Submit\" value=\"Enviar\">
						<center> <b> <a href=\"index.html\">Home</a> </b> </center>
					</p>
					</form>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>
	");
}

else {
	//Inclui os dados na tabela funcionarios
	
	//Cria uma conexão com o servidor Mysql passando host, username e senha
	$conec = mysql_connect ("localhost", "usuario", "senha") or die ("falha na conexão com o banco de dados");
	
	//Declaração SQL
	$declar = "INSERT into funcionarios values ('$nome', '$unidade', '$telefone', '$email', '$cargo')";
	
	//Roda a query e trata o resultado
	$tipo_msg = 'I';
	if (mysql_db_query ("unicamp", $declar, $conec)) {
		$ok = 1;
		header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
	}
	else{
		$ok = 2;
		header("Location: exibe_mensagem.php?ok=$ok&tipo_msg=$tipo_msg");
		// header("Location: exibe_mensagem.php?variavel1=$variavel1&variavel2=$variavel2");
	}
	
	
	//Fecha a conexão com o servidor MySQL (Opcional)
	mysql_close ($conec);
}

?>

</body>
</html>
