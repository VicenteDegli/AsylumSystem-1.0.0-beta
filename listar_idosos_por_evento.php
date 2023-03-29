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
					Lista de idosos no evento<br><br>
                </span>
                <div id="listas">
                   	<?php 
						include 'conexao.php';
						$even_id=$_GET['even_id'];
						echo "<table border='1px' bordercolor='#CCCCCC'>";
							$select=mysql_query("SELECT * FROM eventos WHERE even_id = '$even_id'");
							$registro=mysql_fetch_array($select);
							$even_tipo=$registro['even_tipo'];
							$even_data=$registro['even_data'];
							$even_local=$registro['even_local'];
							$even_data = implode("/",array_reverse(explode("-",$even_data)));
							echo "<tr>
                       		 	<td align='center'>$even_tipo</td> 
                       	        <td align='center'>$even_data</td> 
                           	    <td align='center' colspan='3'>$even_local</td>
                        	</tr>";
							echo "<tr>
                       		 	<td align='center'>Nome</td> 
                       	        <td align='center'>CPF</td> 
                           	    <td align='center'>Data de Nascimento</td>
                            	<td align='center'>Sexo</td>
                        	</tr>";
							$select=mysql_query("SELECT idos_id,idos_even_id,pess_nome,pess_cpf,pess_data_nasc,pess_sexo FROM  pessoas a,idosos b,idosos_eventos c WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = c.idos_even_idos_id) AND (c.idos_even_even_id = '$even_id')");
							while($registro=mysql_fetch_array($select)){
								$idos_id=$registro['idos_id'];
								$idos_even_id=$registro['idos_even_id'];
								$idos_nome=$registro['pess_nome'];
								$idos_cpf=$registro['pess_cpf'];
								$idos_data_nasc=$registro['pess_data_nasc'];
								$idos_sexo=$registro['pess_sexo'];
					
								$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
								//for($i=0;$i<100;$i++){
								echo "<tr>
                            			<td align='center'>$idos_nome</center></td> 
                       	        		<td align='center'>$idos_cpf</center></td> 
                           	    		<td align='center'>$idos_data_nasc</center></td>
                            			<td align='center'>"; if($idos_sexo=='m'){ echo "Masculino";} else{ echo "Feminino";} echo"</center></td>";
								   
								if($_SESSION['UsuarioNivel']!=3){
									?>
                    	 			<td>
										<a href='excluir_idoso_de_evento.php?idos_even_id=<?php echo $idos_even_id ?>&even_id=<?php echo $even_id?>' onClick="return confirm('Está ação apagará a participação deste idoso neste evento. Confirma esta ação?')"><img src="imagens/excluir.gif" title="Excluir idoso de evento"></a>   						
                         			</td>
                   					<?php
								}
                            	echo"</tr>";//}							         
							}
							echo "</table>";
							mysql_close($conexao);
						?>
				</div>
				<span class="ficha_linkis">
           		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
                    <a href="listar_eventos.php"><img src="imagens/todos.gif" border='0px' /></a>
           		 	<?php
						if($_SESSION['UsuarioNivel']!=3){
							?>
           		 				<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 				<a href="cadastrar_evento.php"><img src="imagens/novo.gif" border='0px'/></a>
                            <?php
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
           		