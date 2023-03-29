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
					Funcionários<br><br>
                </span>
                <div id="listas">
    				<table border='1px' bordercolor="#CCCCCC">							
						<?php
        					include 'conexao.php';
							//Consulta sql
            				$select=mysql_query("SELECT * FROM funcionarios a,colaboradores b,pessoas c WHERE (a.func_cola_id = b.cola_id) AND (b.cola_pess_id=c.pess_id)");
							echo "<tr>";
								echo "<td align='center'>";
									echo "<center>Nome</center>";	
								echo "</td>";
								echo "<td align='center'>";
									echo "Data de Nascimento";	
								echo "</td>";
								echo "<td align='center'>";
									echo "CPF";	
								echo "</td>";
								echo "<td align='center'>";
										echo "Sexo";	
								echo "</td>";
								echo "<td align='center'>";
									echo "Telefone";	
								echo "</td>";
								echo "<td align='center'>";
									echo "Identidade";	
								echo "</td>";
								echo "<td align='center'>";
									echo "Funcao";	
								echo "</td>";
								echo "<td align='center'>";
									echo "Carga Horaria";	
								echo "</td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td colspan='3' align='center'>";
										echo "Opções";	
									echo "</td>";
								}
							echo "</tr>";
							$cont=0;
							while($linha=mysql_fetch_array($select)){
								$pess_id=$linha["pess_id"];
								$pess_nome=$linha["pess_nome"];
								$pess_data_nasc=$linha["pess_data_nasc"];
								$pess_cpf=$linha["pess_cpf"];
								$pess_sexo=$linha["pess_sexo"];
								$cola_id=$linha['cola_id'];
								$cola_telefone=$linha['cola_telefone'];
								$cola_identidade=$linha['cola_identidade'];
								$cola_funcao=$linha['cola_funcao'];
								$func_id=$linha['func_id'];
								$func_cola_id=$linha['func_cola_id'];
								$func_carg_horaria=$linha['func_carg_horaria'];
								$func_salario=$linha['func_salario'];
								$func_faltas=$linha['func_faltas'];
								$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
								//for($i=0;$i<100;$i++){
								echo "<tr>";
									echo "<td align='center'>";
										echo "$pess_nome";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pess_data_nasc";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$pess_cpf";	
									echo "</td>";
									echo "<td align='center'>";
										if($pess_sexo=='m'){
											echo "Masculino";
										}
										else{
											echo "Feminino";
										}
									echo "</td>";
									echo "<td align='center'>";
										echo "$cola_telefone";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$cola_identidade";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$cola_funcao";	
									echo "</td>";
									echo "<td align='center'>";
										echo "$func_carg_horaria";	
									echo "</td>";
									if($_SESSION['UsuarioNivel']!=3){
										?>
                                    	<td>
									   		<a href='alterar_funcionario.php?pess_id=<?php echo $pess_id?>&amp;cola_id=<?php echo $cola_id?>&amp;func_id=<?php echo $func_id?>'><img src="imagens/editar.gif" border='0px' title="Editar funcionário"></a>
                                    	</td>
										<td>
											<a href='excluir_funcionario.php?pess_id=<?php echo $pess_id?>&amp;cola_id=<?php echo $cola_id?>&amp;func_id=<?php echo $func_id?>' onClick="return confirm('Tem certeza que deseja excluir funcionario?')"><img src="imagens/excluir.gif" border='0px' title="Excluir funcionário"></a>
                                    	</td>
                                        <td>
									   		<a href='ficha_funcionario.php?pess_id=<?php echo $pess_id?>&amp;cola_id=<?php echo $cola_id?>&amp;func_id=<?php echo $func_id?>'><img src="imagens/ficha.gif" border='0px' title="Visualizar ficha completa"></a>
                                    	</td>
                                   		<?php
									}
								echo "</tr>";//}
								$cont++;
							}
							echo "<tr>";
								echo "<td align='center'>";
									echo "Total de funcionarios";	
								echo "</td>";
								echo "<td align='center' colspan='10'>";
									echo "$cont";	
								echo "</td>";
								//fecha a conexão com o banco de dados
								mysql_close($conexao); 
								?>
						   </tr>
					   </table>
                   </div>
           		   <span class="ficha_linkis">
           		 		
       		 			<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
       		 			<img src="imagens/espaco.gif" width="4%" height="2%" />
                        <?php
                        if($_SESSION['UsuarioNivel']!=3){
       		 				echo "<a href='cadastrar_funcionario.php'><img src='imagens/novo.gif' border='0px'/></a>
							<img src='imagens/espaco.gif' width='4%' height='2%' />";
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