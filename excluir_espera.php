<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
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
			include 'conexao.php';
				$pess_id=$_GET['pess_id'];
				$espe_id=$_GET['espe_id'];
				$delete_espe=mysql_query("DELETE FROM esperas WHERE espe_id = '$espe_id'") or die (mysql_error());
				$delete_pess=mysql_query("DELETE FROM pessoas WHERE pess_id = '$pess_id'") or die (mysql_error());
				if($delete_espe && $delete_pess){
				echo "<script>alert('Espera excluida com sucesso!');
							  window.location.href='listar_esperas.php';
				</script>";
				}
				else{
					echo "<script>alert('Erro ao excluir espera!');
							  window.history.go(-1);
					</script>";
				}
			mysql_close($conexao);
		?>
         <center>
			<a href="index.html"><input type='button' name='cadastrar' value='Início'></a>
			<a href="listar_esperas.php"><input type='button' value='Listar Esperas'></a>
		</center>  
	</body>
</html>