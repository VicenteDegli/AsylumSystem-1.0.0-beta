<?php
	
	//Conectando com o banco de dados
	$host = "localhost"; //Local do banco de dados
	$usuario = "abrigo"; //Usuário do banco de dados
	$senha = "abrigo"; //Senha do banco de dados
	$db_mysql = "abrigo_db"; //Nome do banco de dados
	
	//Variavel para conectar no banco de dados
	$conexao = mysql_connect($host, $usuario, $senha);
	
	//selecionando a db e conectando no banco
	mysql_select_db($db_mysql, $conexao);
?>

