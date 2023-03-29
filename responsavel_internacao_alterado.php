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
						if(isset($_POST['nome'])){ 
							include 'conexao.php';
							$pess_id=$_GET['pess_id'];
							$pess_nome=$_POST['nome'];
							$pess_data_nasc=$_POST['data_nasc'];
						    $pess_cpf=$_POST['cpf'];
							$pess_sexo=$_POST['sexo'];
							$pess_data_nasc = implode("-",array_reverse(explode("/",$pess_data_nasc)));
			  
							$update_pess=mysql_query("UPDATE pessoas SET pess_nome='$pess_nome',pess_data_nasc='$pess_data_nasc',pess_cpf='$pess_cpf',pess_sexo='$pess_sexo'	WHERE pess_id = '$pess_id'") or die (mysql_error());
			
							if($update_pess){
								echo "<script>
									alert('Responsavel editado com sucesso!');
									window.location.href='listar_responsaveis_internacao.php';
								</script>";
							}
							else{
								echo "<script>
									alert('Erro ao editar pessoa no banco de dados!');
									window.history.go(-1);
								</script>"; 
							}
						}
			mysql_close($conexao);
        ?>
	</body>
</html>
