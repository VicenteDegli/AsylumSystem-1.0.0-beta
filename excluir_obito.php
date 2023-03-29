<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!Usuário incluido com sucesso!');
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
        <?php include 'script_obitos.js'; ?>
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
    			//Pegando dado do idoso que serão inseridos na tabela obitos e insere-os  se idoso já é falecido.
				$idos_id=$_GET['idos_id'];
				$obit_id=$_GET['obit_id'];
				$delete=mysql_query("DELETE FROM obitos WHERE obit_id = '$obit_id'") or die (mysql_error());

				$update_i=mysql_query("UPDATE idosos SET idos_falecido='0',idos_ativo='1' WHERE idos_id = '$idos_id'") or die (mysql_error());
				
				if($delete){
					echo "<script>alert('Óbito excluido com Sucesso!');
							  window.location.href='listar_obitos.php';
				    </script>";
				}
				else{
					echo "<script>alert('Erro ao excluir óbito!');
						  window.history.go(-1);
				    </script>";
				}
				mysql_close($conexao);
			?>
         </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>