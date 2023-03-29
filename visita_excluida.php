<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Usuário incluido com sucesso!');
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
				$idos_visi_id=$_GET['idos_visi_id'];
				$visi_id=$_GET['visi_id'];	
				
				$delete=mysql_query("DELETE FROM idosos_visitantes WHERE idos_visi_id = '$idos_visi_id'") or die (mysql_error());
				
				$aux=0;
				$select=mysql_query("SELECT idos_visi_id FROM idosos_visitantes WHERE idos_visi_visi_id = '$visi_id'");
				while($registro=mysql_fetch_array($select)){
					$aux++;
				}	
				if($aux==0){
					$delete=mysql_query("DELETE FROM visitantes WHERE visi_id = '$visi_id'") or die (mysql_error());		
				}
				
				
				if($delete){
				echo "<script>alert('Visita excluida com Sucesso!');
							window.location.href='listar_visitas.php';
					</script>";
				}
				else{
					echo "<script>alert('Erro ao excluir visita!');
							window.history.go(-1);
					</script>";
				}
			mysql_close($conexao);
		?>
	</body>
</html>