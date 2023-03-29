<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>
				alert('Você nã tem permissão para acessar esta página.');
			  </script>";
		header('location: index.php');
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
    	<?php include 'javascript1.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
      	<div id="principal">
      		<div id="ficha">
	<?php
		include('conexao.php');
    	$docu_identidade=$_GET['docu_identidade'];
		$docu_cart_trabalho=$_GET['docu_cart_trabalho'];
		$docu_titulo=$_GET['docu_titulo'];
		$docu_id=$_GET['docu_id'];	
		echo "<div id='ficha_documantos'>";
		echo "<span class='coluna_x3'>Cadastre os dados dos documentos.</span>";
			echo "<form name='form_if' action='documentos_alterados.php?docu_id=$docu_id&amp;docu_identidade=$docu_identidade&amp;docu_cart_trabalho=$docu_cart_trabalho&amp;docu_titulo=$docu_titulo' method='post'>";
								
				if($docu_identidade==1){
					$select=mysql_query("SELECT * FROM identidades WHERE iden_docu_id='$docu_id'");
					$registro=mysql_fetch_array($select);
					$iden_numero=$registro['iden_numero'];
					$iden_orgao=$registro['iden_orgao'];
					echo "<span class='coluna_x4'>";
						echo "RG<small>*</small>";
					echo "</span>";
					echo "<span class='forms'>";
						echo"Número:<br>";
							?>
								<input type='text' name='numero_rg' size='22%' maxlength="12" OnKeyPress="formatar(this, '##.###.###-#')" value="<?php echo $iden_numero?>">
                    		<?php
					echo "</span>";
					echo "<span class='forms'>";
						echo "Orgão Expeditor:<small>*</small><br>";
						echo "<input type='text' name='org_exp' size='22%' value='$iden_orgao'>";
					echo "</span>";
				}
				if($docu_cart_trabalho==1){
					$select=mysql_query("SELECT * FROM carteiras WHERE cart_docu_id='$docu_id'");
					$registro=mysql_fetch_array($select);
					$cart_numero=$registro['cart_numero'];
					$cart_serie=$registro['cart_serie'];
					echo "<span class='coluna_x4'>";
						echo "Carteira de Trabalho";
					echo "</span>";
					echo "<span class='forms'>";
						echo"Número:<small>*</small><br>";
						echo "<input type='text' name='numero_cart' size='22%' value='$cart_numero'>";
					echo "</span>";
					echo "<span class='forms'>";
						echo "Série:<small>*</small><br>";
						echo "<input type='text' name='serie' size='22%'  value='$cart_serie'>";
					echo "</span>";
				}
				if($docu_titulo==1){
					$select=mysql_query("SELECT * FROM titulos WHERE titu_docu_id='$docu_id'");
					$registro=mysql_fetch_array($select);
					$titu_numero=$registro['titu_numero'];
					$titu_zona=$registro['titu_zona'];
					$titu_secao=$registro['titu_secao'];
					echo "<span class='coluna_x4'>";
						echo "Título de Eleitor";
					echo "</span>";
					echo "<span class='forms'>";
						echo"Número:<small>*</small><br>";
						echo "<input type='text' name='numero_titulo' size='22%' value='$titu_numero'>";
					echo "</span>";
					echo "<span class='forms'>";
						echo "Zona:<small>*</small><br>";
						echo "<input type='text' name='zona' size='22%' value='$titu_zona'>";
					echo "</span>";
					echo "<span class='forms'>";
						echo "Seção:<small>*</small><br>";
						echo "<input type='text' name='secao' size='22%' value='$titu_secao'>";
					echo "</span>";
				}
				
				echo "<input type='hidden' name='docu_identidade' value='$docu_identidade'>";
				echo "<input type='hidden' name='docu_cart_trabalho' value='$docu_cart_trabalho'>";
				echo "<input type='hidden' name='docu_titulo' value='$docu_titulo'>";
				echo "</div>";
				echo "<div id='linkis_fixos'>
					<img src='imagens/salvar.gif' border='0px' onclick='selecionarFuncoes()' style='cursor:pointer'/>
				</div>";
				echo "</form>";
		?>	
			</div>
        	<div id="esquerda"></div>
     	    <div id="direita"></div>
		    <div id="rodape"></div>
		</div>
	</body>
</html>