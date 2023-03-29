<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php 
			include 'script_atendimento.js'; 
			include 'conexao.php';
		?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Atendimento ao idoso<br><br>
                </span>
    					<?php 
							include 'conexao.php';
							$idos_id=$_GET['idos_id'];
							$select_idos=mysql_query("SELECT idos_pess_id FROM idosos WHERE idos_id = '$idos_id'");
							$registro=mysql_fetch_array($select_idos);
							$pess_id=$registro['idos_pess_id'];
							$select_idos=mysql_query("SELECT pess_nome FROM pessoas WHERE pess_id = '$pess_id'");
							$registro=mysql_fetch_array($select_idos);
							$idos_nome=$registro['pess_nome'];
		
        					echo "<table border='1' bordercolor='#CCCCCC'>
            					<tr>
                					<td colspan='6'><center>$idos_nome</center></td>
                				</tr>
                				<tr>
                					<td><center>Tipo</center></td>
                    				<td><center>Atendente</center></td>
                    				<td><center>Data</center></td>
                    				<td><center>Procedimento</center></td>";
									if($_SESSION['UsuarioNivel']!=3){
										echo "<td colspan='2'><center>Opções</center></td>";
									}
                				echo "</tr>";
               
			    				$cont=0;
							$select_aten=mysql_query("SELECT * FROM atendimentos WHERE aten_idos_id = '$idos_id'");
							while($registro=mysql_fetch_array($select_aten)){
								$aten_id=$registro['aten_id'];
								$aten_tipo=$registro['aten_tipo'];
								$aten_prof_nome=$registro['aten_prof_nome'];
								$aten_data=$registro['aten_data'];
								$aten_procedimento=$registro['aten_procedimento'];
								$aten_data = implode("/",array_reverse(explode("-",$aten_data)));
								echo "<tr>
                					<td align='center'>$aten_tipo</td>
                   	   				<td align='center'>$aten_prof_nome</td>
                       				<td align='center'>$aten_data</td>
                       				<td align='center'>"; 
										if($aten_procedimento==''){
											echo "xxxxxxx";
										}
										else{
											echo $aten_procedimento;
										} 
									echo "</td>";
									if($_SESSION['UsuarioNivel']!=3){
									echo "<td align='center'><a href='editar_atendimento.php?aten_id=$aten_id&amp;idos_id=$idos_id'><img src='imagens/editar.gif' title='Editar atendimento'></a></center></td>";
									?>
									<td><center><a href='atendimento_excluido.php?aten_id=<?php echo $aten_id?>&amp;idos_id=<?php echo $idos_id?>' onclick="return confirm('Tem certeza que deseja excluir este atendimento?')"><img src='imagens/excluir.gif' title='Excluir atendimento'></a></center></td> 
                                    <?php 
								}
								echo "</tr>";
								$cont++;
							}
							mysql_close($conexao);
	    ?>
        						<tr>
                					<td colspan="2">Total de Atendimentos</td>
                    				<td colspan="4"><center><?php echo $cont;?><center></td>
                				</tr>
            			</table>
            		
						<span class="ficha_linkis"> 		
           			 		<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
        	   		 		<img src="imagens/espaco.gif" width="4%" height="2%" />
     	                   <?php
                        		if($_SESSION['UsuarioNivel']!=3){
									?>
           		 						<a href="cadastrar_atendimento.php"><img src="imagens/novo.gif" border='0px'/></a>
                	       				 <img src="imagens/espaco.gif" width="4%" height="2%" />
            	                    <?php
								}
							?>
 	                       <a href="listar_atendimentos.php"><img src="imagens/todos.gif" border='0px'/></a>
                        	<img src="imagens/espaco.gif" width="4%" height="2%" />
                       		<a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>
                        
           				</span>
            	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		