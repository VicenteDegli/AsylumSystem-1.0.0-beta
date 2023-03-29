<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']!=1){
		echo "<script>alert('Você não tem permissão para assessar esta página!');
			  	  window.location.href='home.php';
			  </script>";
	}
	else{
		include 'conexao.php';
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="stylesheet" type="text/css" href="css_ficha.css">
		<title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
	</head>
	<body bgcolor="#DFFFDF">
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            </div>               		
      		<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
      	</div>
        <?php
		$usua_id=$_GET['usua_id'];
		$delete=mysql_query("DELETE FROM usuarios WHERE usua_id='$usua_id'") or die(mysql_error());
		
		if($delete){
			echo "<script>alert('Usuário excluido com sucesso!');
			  	  window.location.href='listar_usuarios.php';
			  </script>";
		}
		else{
			echo "<script>alert('Erro ao Excluir Usuário!');
			  	  window.history.go(-1);
			  </script>";
		}
	?>
	</body>
</html>