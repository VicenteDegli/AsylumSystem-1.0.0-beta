<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="documentos.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <?php include 'script_menu_idoso.js'?>
	</head>

	<body bgcolor="#DFFFDF">
        <a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
        	<div id="ficha">
            	<span class='ficha_titulos'>
                	Lista de idosos no sitema<br><br>
                </span>
            	<div id="listas">
    	<?php 
			include 'conexao.php';
				echo "<table border='1px' bordercolor='#CCCCCC'>
							<form name='form1'>
								<tr>";
									if($_SESSION['UsuarioNivel']==1){
										echo "<td colspan='3'>
											<select name='idos_id'>
												<option value=''>Buscar por nome...</option>";
												include 'select_todos_idosos.php';
											echo "</select>
										</td>";
									}
									else if($_SESSION['UsuarioNivel']==2){
										echo "<td colspan='3'>
											<select name='idos_id'>
												<option value=''>Buscar por nome...</option>";
												include 'select_todos_idosos.php';
											echo "</select>
										</td>";
									}
									else if($_SESSION['UsuarioNivel']==3){
										echo "<td colspan='3'>
											<select name='idos_id'>
												<option value=''>Buscar por nome...</option>";
												include 'select_todos_idosos.php';
											echo "</select>
										</td>";
									}
							echo "</form>
									<td bgcolor='#CAFFD8'>
										<img src='imagens/receitas.gif' title='Ver Receituário' border='0' onclick='listarReceitas()' style='cursor:pointer' width='63px' height='12px'/>
									</td>";
									if($_SESSION['UsuarioNivel']!=3){
										echo "<td bgcolor='#CAFFD8'>
											<img src='imagens/editar.gif' title='Editar Idoso' border='0' onclick='editar()' style='cursor:pointer'/>
										</td>";
									}
									echo "<td bgcolor='#CAFFD8' align='center'>
										<img src='imagens/ficha.gif' title='Gerar Ficha' border='0' onclick='ficha()' style='cursor:pointer'/>
									</td>";
									
                           				if($_SESSION['UsuarioNivel']==1){
											echo "<td bgcolor='#CAFFD8'>";
												echo"<img src='imagens/excluir.gif' title='Excluir Idoso' border='0' onclick='excluir()' style='cursor:pointer'/>";
											echo"</td>";
										}
									
								echo "</tr>
							
							<tr>
                       		 	<td width='42%' align='center'>Nome</td> 
                       	        <td width='20%' align='center'>CPF</td> 
                           	    <td align='center'>Data de Nascimento</td>
                            	<td align='center' width='10%'>Sexo</td>";
								if($_SESSION['UsuarioNivel']==2){
									echo "<td colspan='2' align='center'>Opções</td>";
								}
								else if($_SESSION['UsuarioNivel']==1){
									echo "<td colspan='3' align='center'>Opções</td>";
								}
								else if($_SESSION['UsuarioNivel']==3){
									echo "<td align='center'>Opções</td>";
								}
                        	echo "</tr>";
							
				$select=mysql_query("SELECT idos_id,pess_nome,pess_cpf,pess_data_nasc,pess_sexo FROM  pessoas a, idosos b WHERE (a.pess_id = b.idos_pess_id) ORDER BY a.pess_nome");
				while($registro=mysql_fetch_array($select)){
					$idos_id=$registro['idos_id'];
					$idos_nome=$registro['pess_nome'];
					$idos_cpf=$registro['pess_cpf'];
					if($idos_cpf == ''){
						$idos_cpf = 'xxx.xxx.xxx-xx';
					}
					$idos_data_nasc=$registro['pess_data_nasc'];
					$idos_sexo=$registro['pess_sexo'];
					
					$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
					if($idos_data_nasc == '00/00/0000'){
						$idos_data_nasc = 'xx/xx/xxxx';
					}
					//for($i=0;$i<100;$i++){
					echo "<tr>
                            	<td align='center'>$idos_nome</td> 
                       	        <td align='center'>$idos_cpf</td> 
                           	    <td align='center'>$idos_data_nasc</td>
                            	<td align='center'>"; if($idos_sexo=='m'){ echo "Masculino";} else{ echo "Feminino";} echo"</td>";
								if($_SESSION['UsuarioNivel']!=3){
						        	echo "<td>
										<a href='editar_idoso.php?idos_id=$idos_id'><img src='imagens/editar.gif' title='Editar Idoso' border='0'/></a>
									</td>";
								}
								echo "<td align='center'>
									<a href='ficha_idoso_pdf.php?idos_id=$idos_id' target='_blank'><img src='imagens/ficha.gif' title='Gerar Ficha' border='0'/></a>
								</td>";	
								if($_SESSION['UsuarioNivel']==1){
									?>
                                    	<td><a href='excluir_idoso.php?idos_id=<?php echo $idos_id?>' onclick="return confirm('Essa ação excluirá permanentemente este idoso e todos os dados relacionados a ele da base de dados. Você confirma esta ação?')"><img src='imagens/excluir.gif' title='Excluir Idoso' border='0'/></a>
                                        </td>
									<?php
								}
								echo "</tr>";	//}						         
				}
					
					echo "</table>";
			mysql_close($conexao);
			
		?>
        		</div>
        		<span class="ficha_linkis">
                	<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
                    <?php
					if($_SESSION['UsuarioNivel']!=3){
						?>
                        	<img src='imagens/espaco.gif' width='4%' height='2%' />
							<a href='cadastrar_idoso.php'><img src='imagens/novo.gif' border='0px'/></a>
						<?php
					}
                    ?>
					<img src='imagens/espaco.gif' width='4%' height='2%' />
                    <a href='#inicio'><img src='imagens/inicio.gif' border='0px'/>
                </span>
			</div>
			<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 					
		</div>
        
	</body>
</html>