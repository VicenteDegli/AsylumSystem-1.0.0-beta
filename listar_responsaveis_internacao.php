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
					Responsáveis por Internações<br><br>
                </span>
                <div id="listas">
    				<table border='1px' bordercolor="#CCCCCC">								
						<?php
        					include 'conexao.php';
							//Consulta sql
            				$select=mysql_query("SELECT * FROM responsaveis_internacoes a, pessoas b WHERE (a.resp_inte_pess_id = b.pess_id)");				echo "<tr>";
								echo "<td>";
									echo "<center>Nome</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Data de Nascimento</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>CPF</center>";	
								echo "</td>";
								echo "<td>";
									echo "<center>Sexo</center>";	
								echo "</td>";
								echo "<td colspan='2'>";
									echo "<center>Opções</center>";	
								echo "</td>";
							echo "</tr>";
							$cont=0;
							while($linha=mysql_fetch_array($select)){
								$pess_id=$linha["pess_id"];
								$pess_nome=$linha["pess_nome"];
								$pess_data_nasc=$linha["pess_data_nasc"];
								$pess_cpf=$linha["pess_cpf"];
								$pess_sexo=$linha["pess_sexo"];
								$resp_inte_id=$linha['resp_inte_id'];
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
										else
											echo "Feminino";	
									echo "</td>";
									?>
                            	    <td>
									   <a href='alterar_responsavel_internacao.php?resp_inte_id=<?php echo $resp_inte_id?>'><img src="imagens/editar.gif" border='0px' title="Editar responsável"></a>
                            		</td>
									<td>
										<a href='excluir_responsaveis_internacao.php?pess_id=<?php echo $pess_id?>&amp;resp_inte_id=<?php echo $resp_inte_id?>' onClick="return confirm('Tem certeza que deseja excluir responsavel?')"><img src="imagens/excluir.gif" border='0px' title="Excluir responsável"></a>
                               	    </td>
                                    <?php
								echo "</tr>";//}
								$cont++;
							}
							echo "<tr>";
								echo "<td align='center'>";
									echo "Total de Responsáveis";	
								echo "</td>";
								echo "<td colspan='5' align='center'>";
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
                        <a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>      
      			   </span>
              </div>
           	  <div id="esquerda"></div>
     		  <div id="direita"></div>
        	  <div id="rodape"></div> 
        </div>	
	</body>
</html>           	