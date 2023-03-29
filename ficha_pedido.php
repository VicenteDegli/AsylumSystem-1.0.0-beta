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
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
    	<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos'  title='Sair do Sistema'><p></a>
    	 <?php
        		include 'conexao.php';
					
					$pess_id=$_GET['pess_id'];
					$pedi_id=$_GET['pedi_id'];
            		$select=mysql_query("SELECT * FROM pessoas a,pedidos_servicos b WHERE (a.pess_id = b.pedi_pess_id) AND (b.pedi_id = '$pedi_id')");
					
					$linha=mysql_fetch_array($select);
						$pess_nome=$linha["pess_nome"];
						$pess_data_nasc=$linha["pess_data_nasc"];
						$pess_cpf=$linha["pess_cpf"];
						$pess_sexo=$linha["pess_sexo"];	
						$pess_endereco=$linha['pess_endereco'];
						$pess_cidade=$linha['pess_cidade'];	
						$pess_bairro=$linha['pess_bairro'];	
						$pess_cep=$linha['pess_cep'];	
						$pess_uf=$linha['pess_uf'];		
						$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
  						$pedi_tipo_servico=$linha['pedi_tipo_servico'];
  						$pedi_telefone=$linha['pedi_telefone'];
  						$pedi_ende_referencia=$linha['pedi_ende_referencia'];
  						$pedi_date=$linha['pedi_date'];
  						$pedi_email=$linha['pedi_email'];
						$pedi_date = implode("/",array_reverse(explode("-",$pedi_date)));
					mysql_close($conexao);
				?>
		
			<div id='principal'>
			<div id='ficha'>
				<div id='ficha_in'>
				   <span class='ficha_titulos'>
							ABRIGO DO VELHOS JOSÉ LIMA<br>
				   </span>
				   <span class='coluna_x4'>
							Rua Pedro Rodrigues Carmo, 6 &nbsp;Centro - Bom Jesus do Itabapoana - RJ 28360-000‎&nbsp;Tel: (22) 3831-1326
				   </span>
				   <span class='ficha_titulos'>
							<font size='-1'>FICHA DO VOLUNTÁRIO</font><br><br>
				   </span>
				   <span class='auto_margen'>
							Nome: <?php echo $pess_nome?>
				   </span>
				   <span class='auto_margen'>
						Sexo: <?php 
							if($pess_sexo=='m'){
								 echo "Masculino";
							}
							else{
								 echo "Feminino";
							}?>
					</span>
				    <span class='auto_margen'>
							Data de Nascimento: <?php echo $pess_data_nasc?> 
					</span>
				    <span class='auto_margen'>
							CPF: <?php echo $pess_cpf?> 
					</span>
					<span class='auto_margen'>
							Tipo de Serviço: <?php echo $pedi_tipo_servico?>
				    </span>
					<span class='auto_margen'>
							Email: <?php echo $pedi_email?>
				    </span>
                    <span class='auto_margen'>
							Data do pedido: <?php echo $pedi_date?>
				    </span>
					<span class='auto_margen'>
						Endereço: <?php echo "$pess_endereco, &nbsp;&nbsp;&nbsp;Bairro: $pess_bairro - $pess_cidade - $pess_uf - CEP: $pess_cep - Referência: $pedi_ende_referencia";?>
					</span>
				</div>
				<div id="linkis_fixos">
					<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
					<img src='imagens/espaco.gif' width='4%' height='2%' />
					 <?php
                    if($_SESSION['UsuarioNivel']!=3){
						?>
						<a href='editar_pedido.php?pess_id=<?php echo $pess_id?>&amp;pedi_id=<?php echo $pedi_id?>'><img src='imagens/editar_btn.gif' border='0px'/></a>
						<img src='imagens/espaco.gif' width='4%' height='2%' />
                        <?php
					}
					?>
					<a href='listar_pedidos.php'><img src='imagens/todos.gif' border='0px'/></a>			
				</div>
			</div>
        <div id='direita'></div>
		<div id='esquerda'></div>
        <div id='rodape'></div>
      </div>
	</body>
</html>