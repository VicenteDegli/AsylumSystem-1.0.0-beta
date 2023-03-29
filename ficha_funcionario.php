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
				$cola_id=$_GET['cola_id'];
				$func_id=$_GET['func_id'];
				//Consulta sql
            	$select=mysql_query("SELECT * FROM pessoas WHERE pess_id='$pess_id'");
					$linha=mysql_fetch_array($select);
					$pess_nome=$linha["pess_nome"];
					$pess_data_nasc=$linha["pess_data_nasc"];
					$pess_cpf=$linha["pess_cpf"];
					$pess_sexo=$linha["pess_sexo"];
					$pess_endereco=$linha["pess_endereco"];
					$pess_bairro=$linha["pess_bairro"];
					$pess_cidade=$linha["pess_cidade"];
					$pess_cep=$linha["pess_cep"];
					$pess_uf=$linha["pess_uf"];
				$select=mysql_query("SELECT * FROM colaboradores WHERE cola_id='$cola_id'");
					$linha=mysql_fetch_array($select);
					$cola_telefone=$linha['cola_telefone'];
					$cola_identidade=$linha['cola_identidade'];
					$cola_funcao=$linha['cola_funcao'];
				$select=mysql_query("SELECT * FROM funcionarios WHERE func_id='$func_id'");
					$linha=mysql_fetch_array($select);
					$func_cola_id=$linha['func_cola_id'];
					$func_carg_horaria=$linha['func_carg_horaria'];
					$func_salario=$linha['func_salario'];
					$func_faltas=$linha['func_faltas'];
					$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
			mysql_close($conexao);
		
		echo "<div id='principal'>";
			echo "<div id='ficha'>
				<div id='ficha_in'>
				   <span class='ficha_titulos'>
							ABRIGO DO VELHOS JOSÉ LIMA<br>
				   </span>
				   <span class='coluna_x4'>
							Rua Pedro Rodrigues Carmo, 6 &nbsp;Centro - Bom Jesus do Itabapoana - RJ 28360-000‎&nbsp;Tel: (22) 3831-1326
				   </span>
				   <span class='ficha_titulos'>
							<font size='-1'>FICHA DO FUNCIONÁRIO</font><br><br>
				   </span>
				   <span class='auto_margen'>
							Nome: $pess_nome
				   </span>
				   <span class='auto_margen'>
							RG: $cola_identidade
				   </span>";
				   echo "<span class='auto_margen'>
						Sexo: "; 
							if($pess_sexo=='m'){
								 echo "Masculino";
							}
							else{
								 echo "Feminino";
							}
					echo "</span>";
				    echo "<span class='auto_margen'>
							Data de Nascimento: $pess_data_nasc 
					</span>
				    <span class='auto_margen'>
							CPF: $pess_cpf 
					</span>
					<span class='auto_margen'>
							Função: $cola_funcao
				    </span>
					<span class='auto_margen'>
							Carga Horária: $func_carg_horaria
				    </span>
					<span class='auto_margen'>
							Salário: ";
									if($func_salario==''){
										echo "xxxxxx";
									}
									else{
										echo "R$ ".$func_salario.",00";
									}
				    echo "</span>";
					echo "<span class='auto_margen'>
							Faltas: ";if($func_faltas==''){
										echo "xxxxxx";
									}
									else{
										echo $func_faltas;
									}
				    echo "</span>";
					
					
					
					echo "<span class='auto_margen'>
						Endereço: $pess_endereco, &nbsp;&nbsp;&nbsp;Bairro: $pess_bairro - $pess_cidade - $pess_uf - CEP: $pess_cep
					</span>";
				?>
				</div>
				<div id="linkis_fixos">
					<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
					<img src='imagens/espaco.gif' width='4%' height='2%' />
                    <?php
                    if($_SESSION['UsuarioNivel']!=3){
						?>
						<a href='alterar_funcionario.php?pess_id=<?php echo $pess_id?>&amp;cola_id=<?php echo $cola_id?>&amp;func_id=<?php echo $func_id?>'><img src='imagens/editar_btn.gif' border='0px'/></a>
						<img src='imagens/espaco.gif' width='4%' height='2%' />
                        <?php
					}
					?>
					<a href='listar_funcionarios.php'><img src='imagens/todos.gif' border='0px'/></a>			
				</div>
			</div>
        <div id='direita'></div>
		<div id='esquerda'></div>
        <div id='rodape'></div>
      </div>
	</body>
</html>