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
					$idos_id=$_GET['idos_id'];
					$even_id=$_GET['even_id'];
					$idos_even_id=$_GET['idos_even_id'];		
					$delete_idos_even=mysql_query("DELETE FROM idosos_eventos WHERE idos_even_id = '$idos_even_id'") or die (mysql_error());		
					if($delete_idos_even){
						if($idos_id!=''){
							echo "<script>alert('Participação do idoso no evento foi apagada com Sucesso!');
								window.location.href='listar_eventos_por_idoso.php?idos_id=$idos_id';
							</script>";
						}
						else{
							echo "<script>alert('Participação do idoso no evento foi apagada com Sucesso!');
								window.location.href='listar_idosos_por_evento.php?even_id=$even_id';
							</script>";
						}
					}
					else{
						echo "<script>alert('Erro ao apagar participação do idoso no evento!');
							window.history.go(-1);
						</script>";
					}	
					mysql_close($conexao);
				?>	
	</body>
</html>           		 
           		