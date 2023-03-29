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
			include 'script_menu_atendimenos.js'; 
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
                	<div id="listas">
    					<?php 
							include 'conexao.php';
							echo "<table border='1' bordercolor='#CCCCCC'>
            					<form name='form1'>
								<tr>";
									if($_SESSION['UsuarioNivel']!=3){
										echo "<td colspan='6'>";
									}
									else{
										echo "<td colspan='4'>";
									}
										echo "<select name='idos_id'>
											<option value=''>Buscar por nome...</option>";
											include 'select_idosos.php';
										echo "</select>
									</td>
								</form>
									<td bgcolor='#CAFFD8' align='center'>
										<img src='imagens/ficha.gif' title='Listar atendimentos deste idoso' border='0' onclick='listarAtendimentosIdoso(form1.idos_id.value)' style='cursor:pointer'/>
									</td>";
								echo "</tr>
                				<tr>
									<td><center>Idoso</center></td>
                					<td><center>Tipo</center></td>
                    				<td><center>Atendente</center></td>
                    				<td><center>Data</center></td>
                    				<td><center>Procedimento</center></td>";
									if($_SESSION['UsuarioNivel']!=3){
										echo "<td colspan='2'><center>Opções</center></td>";
									}
                				echo "</tr>";
							$select=mysql_query("SELECT idos_id,pess_nome,aten_idos_id,aten_tipo,aten_prof_nome,aten_id,aten_data,aten_procedimento FROM  pessoas a, idosos b,atendimentos c WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = c.aten_idos_id)");
							$cont=0;
							while($registro=mysql_fetch_array($select)){
								$idos_nome=$registro['pess_nome'];
								$aten_id=$registro['aten_id'];
								$aten_tipo=$registro['aten_tipo'];
								$aten_prof_nome=$registro['aten_prof_nome'];
								$aten_data=$registro['aten_data'];
								$aten_procedimento=$registro['aten_procedimento'];
								$aten_data = implode("/",array_reverse(explode("-",$aten_data)));
								//for($i=0;$i<100;$i++){
								echo "<tr>
									<td align='center'>$idos_nome</td>
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
										<td><center><a href='atendimento_excluido.php?aten_id=<?php echo $aten_id?>&amp;idos_id=<?php echo ''?>' onclick="return confirm('Tem certeza que deseja excluir este atendimento?')"><img src='imagens/excluir.gif' title='Excluir atendimento'></a></center></td> 
                                   	 	<?php 
									}
								echo "</tr>";	//}
								$cont++;
							}
							mysql_close($conexao);
	    ?>
        						<tr>
                					<td colspan="2">Total de Atendimentos</td>
                    				<td colspan="4"><center><?php echo $cont;?><center></td>
                				</tr>
            			</table>
            		</div>
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
                        <a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>
           			</span>
            	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		