<?php
	if(!isset($_SESSION)){
		session_start();
	}	
	//você também poderá ativar o buffer usando o comando ob_start que evita alguns erros.
	ob_start(); //ob_start — Ativa o buffer de saída.

   	// Verifica se não há a variável da sessão que identifica o usuário.
	echo "<div id='usuario'>
				<i>Usuário: ".$_SESSION['UsuarioNome']." Nivel: ".$_SESSION['UsuarioNivel']."<i>
		  </div>";
   	if (!isset($_SESSION['UsuarioID'])){
    	// Destrói a sessão por segurança.
     	session_destroy();
        // Redireciona o visitante de volta pro login.
		header('location: index.php');
    }
?>