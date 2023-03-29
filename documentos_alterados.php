<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>
				alert('Você nã tem permissão para acessar esta página.');
				window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="documentos.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
	</head>

	<body bgcolor="#DFFFDF">
    	<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <div id="principal">
      		<div id="ficha">
            </div>               		
      		<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
      	</div>
    	<?php
			include 'conexao.php';
			//Pega id de documentos via get, que será refenrenciados nas tabelas, rg, titulo e cart. trab.
			$docu_id=$_GET['docu_id'];
			
			//Pega id de documentos via get, que serão necessários na manipulação do banco de dados
			$docu_identidade=$_GET['docu_identidade'];
			$docu_cart_trabalho=$_GET['docu_cart_trabalho'];
			$docu_titulo=$_GET['docu_titulo'];
			//variável axiliar que serã usadas como fleg para verificar insercão no banco de dados.
			$aux=true;
			
			//Seleciona dados na tabela documentos para verificar se documentos ja estão ou não cadasrados.
			$select=mysql_query("SELECT iden_id FROM identidades WHERE iden_docu_id='$docu_id'") or die (mysql_error());
			$registro=mysql_fetch_array($select);
			$identidade=$registro['iden_id'];
			
			$select=mysql_query("SELECT titu_id FROM titulos  WHERE titu_docu_id='$docu_id'") or die (mysql_error());
			$registro=mysql_fetch_array($select);
			$titulo=$registro['titu_id'];
			
			$select=mysql_query("SELECT cart_id FROM carteiras WHERE cart_docu_id='$docu_id'") or die (mysql_error());
			$registro=mysql_fetch_array($select);
			$carteira=$registro['cart_id'];
			
			//Atualiza o dados de identidade.
			if($docu_identidade==1 && $identidade!=""){	
				$iden_numero=$_POST['numero_rg'];
				$iden_orgao=$_POST['org_exp'];
				
				$update_rg=mysql_query("UPDATE identidades SET iden_numero='$iden_numero',iden_orgao='$iden_orgao' 
															WHERE iden_docu_id='$docu_id'") or die (mysql_error());
			}
			else if($docu_identidade==1){
				$iden_numero=$_POST['numero_rg'];
				$iden_orgao=$_POST['org_exp'];
				$update_rg=mysql_query("INSERT INTO identidades (iden_docu_id,iden_numero,iden_orgao) VALUES ('$docu_id','$iden_numero','$iden_orgao')") or die (mysql_error());
			}
			
			//Pega dados do idoso que serão inseridos na tabela carteiras e insere-os  se cart. treab. foi apresentada.
			if($docu_cart_trabalho==1 && $carteira!=""){	
				$cart_numero=$_POST['numero_cart'];
				$cart_serie=$_POST['serie'];
				$update_carteiras=mysql_query("UPDATE carteiras SET
						 	cart_docu_id='$docu_id',cart_numero='$cart_numero',cart_serie='$cart_serie' 
															    WHERE cart_docu_id='$docu_id'") or die (mysql_error());
			}
			else if($docu_cart_trabalho==1){
				$cart_numero=$_POST['numero_cart'];
				$cart_serie=$_POST['serie'];
				$update_carteiras=mysql_query("INSERT INTO carteiras (cart_docu_id,cart_numero,cart_serie) VALUES ('$docu_id','$cart_numero','$cart_serie')") or die (mysql_error());
			}
			
			//Pegando dado do idoso que serão inseridos na tabela titulos e insere-os  se titulo foi apresentado.
			if($docu_titulo==1 && $titulo!=""){	
				$titu_numero=$_POST['numero_titulo'];
				$titu_zona=$_POST['zona'];
				$titu_secao=$_POST['secao'];
				$update_titulo=mysql_query("UPDATE titulos SET titu_numero='$titu_numero',titu_zona='$titu_zona',titu_secao='$titu_secao'
														   WHERE titu_docu_id='$docu_id'") or die (mysql_error());
			}
			else if($docu_titulo==1){
				$titu_numero=$_POST['numero_titulo'];
				$titu_zona=$_POST['zona'];
				$titu_secao=$_POST['secao'];
				$update_titulo=mysql_query("INSERT INTO titulos (titu_docu_id,titu_numero,titu_zona,titu_secao) VALUES ('$docu_id','$titu_numero','$titu_zona','$titu_secao')") or die (mysql_error());
			}
			
			if($docu_identidade==1 && !$update_rg){
				$aux=false;
			}
			else if($docu_cart_trabalho==1 && !$update_carteiras){
				$aux=false;
			}
			else if($docu_titulo==1 && !$update_titulo){
				$aux=false;
			}
			if($aux){
				echo "<script>alert('Dados editado com Sucesso');";
				echo "window.location.href='listar_idosos.php'</script>";
			}
			else{
				echo "<script>
						alert('Erro ao editar documentos! Você será encaminhado para página anterior!');
						window.history.go(-1);
			 		  </script>";
			}	
        ?>              
	</body>
</html>
