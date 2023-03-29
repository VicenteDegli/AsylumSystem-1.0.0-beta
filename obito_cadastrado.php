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
				$idos_id=$_POST['idos_id'];
				$obit_causa=$_POST['causa'];
				$obit_local=$_POST['local'];
				$obit_extre_uncao=$_POST['obit_extre_uncao'];
				$obit_data_falecimento=$_POST['data'];
				$obit_data_falecimento = implode("-",array_reverse(explode("/",$obit_data_falecimento)));
				
				$select=mysql_query("SELECT obit_id FROM obitos WHERE obit_idoso_id='$idos_id'") or die(mysql_error());
				$registro=mysql_fetch_array($select);
				$obit_id=$registro['obit_id'];
				if($obit_id==''){	
					$insert_obito=mysql_query("INSERT INTO obitos (obit_idoso_id,obit_causa,obit_local,obit_extre_uncao,obit_data_falecimento) VALUES ('$idos_id','$obit_causa','$obit_local','$obit_extre_uncao','$obit_data_falecimento')") or die (mysql_error());
				
					$update_idos=mysql_query("UPDATE idosos SET idos_falecido='1',idos_ativo='0' WHERE idos_id='$idos_id'") or die (mysql_error());

					if($insert_obito && $update_idos){
						echo "<script>alert('Dados inseridos com Sucesso!');
								  window.location.href='listar_obitos.php';
						  </script>";
					}
					else{
						echo "<script>alert('Erro ao inserir dados!');
								  window.history.go(-1);
						  </script>";
					}
				}
				else{
					echo "<script>alert('Óbito já está cadastrado!');
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