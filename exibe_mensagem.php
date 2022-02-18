<html>
<head>
<title>Exibe Mensagem</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
</head>

<body bgcolor="#ffffff" text="#000000" link="#333399" vlink="#CC0000" alink="#663399">

<?php

global $ok;
$ok = trim($ok);

echo ("<p><center><img src=\"topo.jpg\" width=\"640\" height=\"400\"></center></p>");

if ($tipo_msg == 'I') {
	//se inclusao OK
	if ($ok == 1) {
		echo ("<BR><BR>");
		echo ("<center><b><font size = 4> Inclusão Efetuada</font></b></center">;
		echo ("<BR>");
		echo ("<center><b> <a href=\"inclusao.html\">Voltar</a></b></center>");
	}
	//se deu erro na inclusão
	if ($ok == 2) {
		echo ("<BR><BR>");
		echo ("<center><b><font size = 4> Erro - Inclusão não Efetuada</font></b></center>");
		echo ("<BR>");
		echo ("<center><br> <a href=\"inclusao.html\">Voltar</a></b></cemter>");
	}
}

?>

</body>
</html>