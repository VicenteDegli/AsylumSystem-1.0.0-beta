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
    	//Pegando dado do idoso que serão inseridos na tabela obitos e insere-os  se idoso já é falecido. 
  				$even_tipo=$_POST['even_tipo'];
  				$even_data=$_POST['even_data'];
  				$even_local=$_POST['even_local'];
  				
				$even_data = implode("-",array_reverse(explode("/",$even_data)));
				
				$update_even=mysql_query("UPDATE eventos SET even_tipo='$even_tipo',even_data='$even_data',even_local='$even_local' WHERE even_id = '$even_id'") or die (mysql_error());

				if($update_even){
					echo "<script>
						alert('Evento atualizado com sucesso!');
						window.location.href='listar_eventos.php';
					</script>";
				}
				else{
					echo "<script>alert('Erro ao atulizar Evento!');
									window.history.go(-1);
					</script>";
				}	
			mysql_close($conexao);
		?>
	</body>
</html>