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
    	//Pegando dado do idoso que serão inseridos na tabela obitos e insere-os  se idoso já é falecido. 
				$idos_id=$_POST['idos_id'];
				$visi_id=$_POST['visi_id'];
  				$visi_nome=$_POST['visi_nome'];
  				$idos_visi_data=$_POST['idos_visi_data'];
				$idos_visi_grau_parentesco=$_POST['idos_visi_grau_parentesco'];
				$idos_visi_data = implode("-",array_reverse(explode("/",$idos_visi_data)));
				if($visi_nome!=''){	
					$visi_telefone=$_POST['visi_telefone'];
					$insert_visi=mysql_query("INSERT INTO visitantes (visi_telefone,visi_nome) VALUES ('$visi_telefone','$visi_nome')") or die (mysql_error());
				
					$select=mysql_query("SELECT visi_id FROM visitantes");
						while($registro=mysql_fetch_array($select)){
							$visi_id=$registro['visi_id'];
						}
					$insert_idos_visi=mysql_query("INSERT INTO idosos_visitantes (idos_visi_visi_id,idos_visi_idos_id,idos_visi_data,idos_visi_grau_parentesco) VALUES ('$visi_id','$idos_id','$idos_visi_data','$idos_visi_grau_parentesco')") or die (mysql_error());
				}
				else{
					$insert_idos_visi=mysql_query("INSERT INTO idosos_visitantes (idos_visi_visi_id,idos_visi_idos_id,idos_visi_data,idos_visi_grau_parentesco) VALUES ('$visi_id','$idos_id','$idos_visi_data','$idos_visi_grau_parentesco')") or die (mysql_error());
				}

			if($insert_idos_visi){
				echo "<script>alert('Visita inserida com Sucesso!');
							window.location.href='listar_visitas.php';
				</script>";
			}
			else{
				echo "<script>alert('Erro ao inserir visita!');
							window.history.go(-1);
				</script>";
			}	
			mysql_close($conexao);
		?>
	</body>
</html>