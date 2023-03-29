<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
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
            	<div id="listas">
            	<span class="ficha_titulos">
						Receituário do Idoso<br><br>
                </span>
    	<?php 
			include 'conexao.php';
				$rece_id=$_GET['rece_id'];
				$idos_id=$_GET['idos_id'];
			if($idos_id==''){
				$select_idos=mysql_query("SELECT rece_idos_id FROM  receitas WHERE rece_id = '$rece_id'");
				$registro=mysql_fetch_array($select_idos);
				$idos_id=$registro['rece_idos_id'];
				$select_idos=mysql_query("SELECT idos_pess_id FROM idosos WHERE idos_id = '$idos_id'");
				$registro=mysql_fetch_array($select_idos);
				$pess_id=$registro['idos_pess_id'];
				$select_idos=mysql_query("SELECT pess_nome FROM pessoas WHERE pess_id = '$pess_id'");
				$registro=mysql_fetch_array($select_idos);
				$idos_nome=$registro['pess_nome'];
			}
			else{
				$select_idos=mysql_query("SELECT idos_pess_id FROM idosos WHERE idos_id = '$idos_id'");
				$registro=mysql_fetch_array($select_idos);
				$pess_id=$registro['idos_pess_id'];
				$select_idos=mysql_query("SELECT pess_nome FROM pessoas WHERE pess_id = '$pess_id'");
				$registro=mysql_fetch_array($select_idos);
				$idos_nome=$registro['pess_nome'];
			}
			
        echo "<table border='1' bordercolor='#CCCCCC'>
            	<tr>
                	<td colspan='6'><center>$idos_nome</center></td>
                </tr>";
               	$n_receitas=0;
				$n_medicamentos=0;
			   	$select_qtde=mysql_query("SELECT * FROM receitas WHERE (rece_idos_id = '$idos_id') AND (rece_ativa='1')");
				while($registro=mysql_fetch_array($select_qtde)){
					$rece_id=$registro['rece_id'];
					$rece_medico=$registro['rece_medico'];
					$rece_data=$registro['rece_data'];
					$rece_data = implode("/",array_reverse(explode("-",$rece_data)));
					$n_receitas++; 
					echo "<tr>
                				<td><center>$rece_medico</center></td>
                   		    	<td><center>Data: $rece_data</center></td>";
						if($_SESSION['UsuarioNivel']!=3){
							
						  echo "<td>
								<a href='editar_receita.php?rece_id=$rece_id'><img src='imagens/editar.gif' title='Editar Receita' border='0'/></a>
							</td>";
						?>
							<td>
								<a href='excluir_receita.php?rece_id=<?php echo $rece_id?>'  onClick="return confirm('Essa ação implica também excluir todos medicamentos dessa receita. Tem certeza que deseja excluir esse receita?')"><img src='imagens/excluir.gif' title='Excluir Receita' border='0'/></a>
							</td>
                           
							<td width="18px" align="center">
								<a href='arquivar_receita.php?rece_id=<?php echo $rece_id?>' onClick="return confirm('Essa ação implica também arquivar todos medicamentos dessa receita. Tem certeza que deseja arquivar essa receita?')"><img src='imagens/arquivar.gif' title='Arquivar Receita' border='0'/></a></center>
							</td>
							<?php
						}
               	    	echo "</tr>";
                       	 
						$select=mysql_query("SELECT * FROM medicamentos WHERE (medc_rece_id = '$rece_id') AND (medc_ativo='1')");
						while($registro=mysql_fetch_array($select)){
							$medc_id=$registro['medc_id'];
							$medc_nome=$registro['medc_nome'];
							$medc_horario=$registro['medc_horario'];
							$n_medicamentos++;
						echo "<tr>
                				<td>Medicação: $medc_nome</td>
                   		    	<td>Horário: $medc_horario</td>";
								if($_SESSION['UsuarioNivel']!=3){
								
						  		echo "<td>
									<a href='editar_medicamento.php?medc_id=$medc_id'><img src='imagens/editar.gif' title='Editar Medicamento' border='0'/></a>
								</td>";
								?>
								<td>
									<a href='excluir_medicamento.php?medc_id=<?php echo $medc_id?>'  onClick="return confirm('Tem certeza que deseja excluir esse medicamento?')"><img src='imagens/excluir.gif' title='Excluir Medicamento' border='0'/></a>
								</td>
                               
								<td width="18px" align="center">
									<a href='arquivar_medicamento.php?medc_id=<?php echo $medc_id?>' onClick="return confirm('Tem certeza que deseja arquivar esse medicamento?')"><img src='imagens/arquivar.gif' title='Arquivar Medicamento' border='0'/></a></center>
								</td>
								<?php
							}
               	    		echo "</tr>";
                         	
						}
				}
				
			mysql_close($conexao);
		
						
	    ?>
        		<tr>
                	<td colspan="1"><?php echo $n_receitas." ";?>Receitas</td>
                    <td colspan="4"><?php echo $n_medicamentos." ";?>Medicamentos</td>
                </tr>
            </table> 
            </div>
                <span class="ficha_linkis">
                    		 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                              
                             <?php
							 	if($_SESSION['UsuarioNivel']!=3){
									?>
                                     <img src="imagens/espaco.gif" width="5%" height="2%" />
                    				 <a href="cadastrar_receita.php"><img src="imagens/novo.gif" border='0px'/></a>
                    		 		<?php
								}
							?>
                            <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		<a href="listar_idosos.php"><img src="imagens/idosos.gif" border='0px'/></a>
                </span>
            </div> 
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
	</body>
</html>