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
            	<span class="ficha_titulos">
					Pedidos de Serviço<br><br>
                </span>
                <div id="listas">
    				<table border='1px' bordercolor="#CCCCCC">	
                    	<?php
        					include 'conexao.php';
							echo "<tr>";
								echo "<td>";
									echo "<center>Nome</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Data de Nascimento</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Data de Pedido</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>CPF</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Sexo</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Serviço</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Telefone</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Email</center>";	
								echo "</td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td colspan='3' align='center'>";
										echo "Opções";	
									echo "</td>";
								}
							echo "</tr>";
													
							//Consulta sql
            				$select=mysql_query("SELECT * FROM pessoas a,pedidos_servicos b WHERE (a.pess_id = b.pedi_pess_id)");
							$cont=0;
							while($linha=mysql_fetch_array($select)){
								$pess_id=$linha["pess_id"];
								$pess_nome=$linha["pess_nome"];
								$pess_data_nasc=$linha["pess_data_nasc"];
								$pess_cpf=$linha["pess_cpf"];
								$pess_sexo=$linha["pess_sexo"];			
								$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
								$pedi_id=$linha['pedi_id'];
  								$pedi_tipo_servico=$linha['pedi_tipo_servico'];
		  						$pedi_telefone=$linha['pedi_telefone'];
  								$pedi_ende_referencia=$linha['pedi_ende_referencia'];
  								$pedi_date=$linha['pedi_date'];
  								$pedi_email=$linha['pedi_email'];
								$pedi_date = implode("/",array_reverse(explode("-",$pedi_date)));
								//for($i=0;$i<100;$i++){
								echo "<tr>";
									echo "<td align='center'>";
										echo "$pess_nome";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pess_data_nasc";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pedi_date";	
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
									echo "<td align='center'>";
										echo "$pedi_tipo_servico";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pedi_telefone";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pedi_email";	
									echo "</td align='center'>";
									if($_SESSION['UsuarioNivel']!=3){	
										?>
        		                    	<td>
									   		<a href='editar_pedido.php?pess_id=<?php echo $pess_id?>&amp;pedi_id=<?php echo $pedi_id?>'><img src="imagens/editar.gif" border='0px' title="Editar pedido de serviço"></a>	
            		                	</td>
										<td>
									   		<a href='excluir_pedido.php?pess_id=<?php echo $pess_id?>&amp;pedi_id=<?php echo $pedi_id?>' onClick="return confirm('Tem certeza que deseja excluir pedido?')"><img src="imagens/excluir.gif" border='0px' title="Excluir pedido de serviço"></a>
		                            	</td>
                                        <td>
									   		<a href='ficha_pedido.php?pess_id=<?php echo $pess_id?>&amp;pedi_id=<?php echo $pedi_id?>'><img src="imagens/ficha.gif" border='0px' title="Ficha completa do pedido de serviço"></a>
		                            	</td>
        		                    	<?php
									}
								echo "</tr>";//}
								$cont++;
							}
							echo "<tr>";
								echo "<td align='center'>";
									echo "Total de Pedidos";	
								echo "</td>";
								echo "<td align='center' colspan='10'>";
									echo "$cont";	
								echo "</td>";
							echo "</tr>";						
								//fecha a conexão com o banco de dados
								mysql_close($conexao); 
							?>
						</table>
            	   </div>
           		   <span class="ficha_linkis">
           		 		
       		 			<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
       		 			<img src="imagens/espaco.gif" width="4%" height="2%" />
                        <?php
                        if($_SESSION['UsuarioNivel']!=3){
       		 				echo "<a href='cadastrar_pedido.php'><img src='imagens/novo.gif' border='0px'/></a>
							<img src='imagens/espaco.gif' width='4%' height='2%'/>";
                        }
						?>
                        <a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>   
                        
      			   </span>
              </div>
           	  <div id="esquerda"></div>
     		  <div id="direita"></div>
        	  <div id="rodape"></div> 
        </div>	
	</body>
</html>           	