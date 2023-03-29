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
				$idos_id=$_POST['idos_id'];
				$reic_data=$_POST['reic_data'];
				$reic_motivo=$_POST['reic_motivo'];
				$reic_data = implode("-",array_reverse(explode("/",$reic_data)));
				
				$select=mysql_query("SELECT reic_id FROM idoso_reinceridos_familia WHERE reic_idos_id='$idos_id'") or die(mysql_error());
				$registro=mysql_fetch_array($select);
				$reic_id=$registro['obit_id'];
				
				if($reic_id==''){
					$insert_reic=mysql_query("INSERT INTO idoso_reinceridos_familia (reic_data,reic_motivo,reic_idos_id) VALUES ('$reic_data','$reic_motivo','$idos_id')") or die (mysql_error());
				
					$update_idos=mysql_query("UPDATE idosos SET idos_reinc_familia='1',idos_ativo='0' WHERE idos_id='$idos_id'") or die (mysql_error());
				
					if($insert_reic && $update_idos){
						echo "<script>alert('Operação realizada com sucesso!');
							window.location.href='listar_reincersoes.php';
						</script>";
					}
					else{
						echo "<script>alert('Falha ao realizar operação');
							window.history.go(-1);
						</script>";
					}
				}
				else{
					echo "<script>alert('Reincersão já cadastrada!');
							window.history.go(-1);
						</script>";
				}
			mysql_close($conexao); 
		?>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>