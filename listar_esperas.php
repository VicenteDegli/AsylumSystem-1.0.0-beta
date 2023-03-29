<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
		<?php include 'script_espera.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Esperas<br><br>
                </span>
                	<div id="listas">
    					<table  height="3" border='2' bordercolor='#CCCCCC'>							
											<?php
        									include 'conexao.php';
													echo "<tr>";
															echo "<td align='center'>";
																	echo "<center>Nome</center>";	
															echo "</td>";
															echo "<td width='90px' align='center'>";
																	echo "Nascimento";	
															echo "</td>";
															echo "<td width='90px' align='center'>";
																	echo "Pedido";	
															echo "</td>";
															echo "<td width='110px' align='center'>";
																	echo "CPF";	
															echo "</td>";
															echo "<td width='65px' align='center'>";
																	echo "Sexo";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "Pedinte";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "Telefone";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "Situação";	
															echo "</td>";
															echo "<td>";
																	echo "Prioridade";	
															echo "</td>";
															if($_SESSION['UsuarioNivel']!=3){
																echo "<td colspan='2'>";
																	echo "Opções";	
																echo "</td>";
															}
													echo "</tr>";
													
													//Consulta sql
            										$select=mysql_query("SELECT * FROM pessoas a,esperas b WHERE (a.pess_id = b.espe_pess_id)");
													$cont=0;
													while($linha=mysql_fetch_array($select)){
														
														$pess_id=$linha["pess_id"];
														$pess_nome=$linha["pess_nome"];
														$pess_data_nasc=$linha["pess_data_nasc"];
														$pess_cpf=$linha["pess_cpf"];
														$pess_sexo=$linha["pess_sexo"];			
														$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
														$espe_id=$linha['espe_id'];
  														$espe_situacao=$linha['espe_situacao'];
  														$espe_pedinte=$linha['espe_pedinte'];
  														$espe_tele_pedinte=$linha['espe_tele_pedinte'];
  														$espe_data_pedido=$linha['espe_data_pedido'];
  														$espe_anal_prioridade=$linha['espe_anal_prioridade'];
  														$espe_nive_prioridade=$linha['espe_nive_prioridade'];
														$espe_data_pedido = implode("/",array_reverse(explode("-",$espe_data_pedido)));									//for($i=0;$i<100;$i++){
														echo "<tr>";
															echo "<td>";
																	echo "$pess_nome";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "$pess_data_nasc";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "$espe_data_pedido";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "$pess_cpf";	
															echo "</td>";
															echo "<td align='center'>";
																	if($pess_sexo=='m'){
																		echo "Masculino";
																	}
																	else
																		echo "Feminino";	
															echo "</td>";
															echo "<td>";
																	echo "$espe_pedinte";	
															echo "</td>";
															
															echo "<td align='center'>";
																	echo "$espe_tele_pedinte";	
															echo "</td>";
															echo "<td align='center'>";
																	echo "$espe_situacao";	
															echo "</td>";
															echo "<td align='center'>";
																	if($espe_nive_prioridade==1){
																		echo "Máxima";
																	}
																	else if($espe_nive_prioridade==2){
																		echo "Média";
																	}
																	else if($espe_nive_prioridade==3){
																		echo "Mínima";
																	}	
															echo "</td>";
												
                                                if($_SESSION['UsuarioNivel']!=3){
													?>
                                                		    <td align='center'>
																   <a href='editar_espera.php?pess_id=<?php echo $pess_id?>&amp;espe_id=<?php echo $espe_id?>'><img src='imagens/editar.gif' title='Editar Espera' border='0'/></a>
                                                                    
															</td>
															<td align='center'>
																	<a href='excluir_espera.php?pess_id=<?php echo $pess_id?>&amp;espe_id=<?php echo $espe_id?>' onClick="return confirm('Tem certeza que deseja excluir responsavel?')"><img src='imagens/excluir.gif' title='Excluir Espera' border='0'/></a>
                                                                    
															 </td>
                                                	<?php
                                                }
														echo "</tr>";//}
														$cont++;
													}
													echo "<tr>";
															echo "<td>";
																	echo "<center>Total de esperas <center>";	
															echo "</td>";
															echo "<td colspan='10'>";
																	echo "<center>$cont<center>";	
															echo "</td>
													</tr>";
													
													//fecha a conexão com o banco de dados
													mysql_close($conexao); 
											?>					                 	
					</table>
                 </div>
           					<span class="ficha_linkis">
                    		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                                 <?php 
									if($_SESSION['UsuarioNivel']!=3){
                        				echo "<img src='imagens/espaco.gif' width='4%' height='2%' />
										<a href='cadastrar_espera.php'><img src='imagens/novo.gif' border='0' /></a>";	
									}
								?>
                    		</span>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		