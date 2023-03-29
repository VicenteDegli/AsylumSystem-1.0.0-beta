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
			$even_id=$_GET['even_id'];
			$idosos=$_POST['idoso'];
			$tamanho=sizeof($idosos);
			$cont=0;
			for($i=0;$i<$tamanho;$i++){
				$idos_id='';
				$select=mysql_query("SELECT idos_even_idos_id FROM idosos_eventos WHERE (idos_even_idos_id = '$idosos[$i]') AND (idos_even_even_id = '$even_id')") or die (mysql_error());
				$registro=mysql_fetch_array($select);
				$idos_id=$registro['idos_even_idos_id'];
				
				$insert=true;
				if($idos_id==''){
					$insert=mysql_query("INSERT INTO idosos_eventos (idos_even_even_id,idos_even_idos_id) VALUES ('$even_id','$idosos[$i]')") or die (mysql_error());
					$cont++;
				}
			}
			if($insert){
				if($cont==0){
					echo "<script>
						alert('Idosos já foram incluidos a este evento!');
						window.location.href='listar_idosos_por_evento.php?even_id=$even_id';
					</script>";
				}
				else if($cont!=$tamanho){
					echo "<script>
					alert('Idosos foram incluidos com sucesso a evento! Obs: Idosos que já estavam registrados a evento foram iginorados.');
					window.location.href='listar_idosos_por_evento.php?even_id=$even_id';
				</script>";
				}
				else{
					echo "<script>
					alert('Idosos foram incluidos com sucesso a evento!');
					window.location.href='listar_idosos_por_evento.php?even_id=$even_id';
				</script>";
				}
			}
			else{
				echo "<script>
						alert('Erro ao incluir idoso(s)!');
    					window.history.go(-1);
					</script>";
				
			}
			mysql_close($conexao);
		?>
	</body>
</html>