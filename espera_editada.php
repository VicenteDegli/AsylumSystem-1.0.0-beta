<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!!');
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
		if(isset($_POST['idos_nome'])){
			$pess_id=$_GET['pess_id'];
			$espe_id=$_GET['espe_id']; 
			//Pegando dados do idoso que serão inseridos na tabela pessoas		
			$pess_nome=$_POST['idos_nome'];
			$pess_data_nasc=$_POST['idos_data_nasc'];
		    $pess_cpf=$_POST['idos_cpf'];
			$pess_sexo=$_POST['idos_sexo'];
			$pess_endereco=$_POST['idos_endereco'];
			$pess_bairro=$_POST['idos_bairro'];
			$pess_cidade=$_POST['idos_cidade'];
			$pess_cep=$_POST['idos_cep'];
			$pess_uf=$_POST['idos_uf'];
			$pess_data_nasc = implode("-",array_reverse(explode("/",$pess_data_nasc)));
			
			$update_pess=mysql_query("UPDATE pessoas SET pess_nome='$pess_nome',pess_data_nasc='$pess_data_nasc',pess_cpf='$pess_cpf',pess_sexo='$pess_sexo',pess_endereco='$pess_endereco',pess_bairro='$pess_bairro',pess_cidade='$pess_cidade',pess_cep='$pess_cep',pess_uf='$pess_uf'	WHERE pess_id = '$pess_id'") or die (mysql_error());
			
			//Pegando dados que serão inseridos na tabela espera.		
			$select_pess=mysql_query("SELECT pess_id FROM pessoas");
			while($registro=mysql_fetch_array($select_pess)){
				$espe_pess_id=$registro['pess_id'];
			}
 		    $espe_situacao=$_POST['espe_situacao'];
            $espe_pedinte=$_POST['espe_pedinte'];
  		    $espe_tele_pedinte=$_POST['espe_tele_pedinte'];
  		    $espe_data_pedido=$_POST['espe_data_pedido'];
  		    $espe_anal_prioridade=$_POST['espe_anal_prioridade'];
 		    $espe_nive_prioridade=$_POST['espe_nive_prioridade'];
			$espe_data_pedido = implode("-",array_reverse(explode("/",$espe_data_pedido)));
			
			$update_espe=mysql_query("UPDATE esperas SET espe_situacao='$espe_situacao',espe_pedinte='$espe_pedinte',espe_tele_pedinte='$espe_tele_pedinte',espe_data_pedido='$espe_data_pedido',espe_anal_prioridade='$espe_anal_prioridade',espe_nive_prioridade='$espe_nive_prioridade' WHERE espe_id = '$espe_id'") or die (mysql_error());
			
			if($update_pess && $update_espe){
				echo "<script>alert('Espera atualizada com sucesso!');
							  window.location.href='listar_esperas.php';
				</script>";
			}
			else{
				echo "<script>alert('Erro ao atualizar espera!');
							  window.history.go(-1);
				</script>";
			}	
		}
        ?>                 
	</body>
</html>
