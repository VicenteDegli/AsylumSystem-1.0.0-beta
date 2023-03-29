<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php include 'script_visitar_por_idoso.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Visitas<br><br>
                </span>    	
       			<div id="listas">
    			<?php 
					include 'conexao.php';
       					 echo "<table border='1' bordercolor='#CCCCCC'>
						 	<form name='form1'>
								<tr>";
									if($_SESSION['UsuarioNivel']==3){
										echo"<td colspan='4'>
											<select name='idos_id'>
												<option value=''>Buscar por nome...</option>";
												include 'select_idosos.php';
											echo "</select>
										</td>";
									}
									else{
										echo"<td colspan='5'>
											<select name='idos_id'>
												<option value=''>Buscar por nome...</option>";
												include 'select_idosos.php';
											echo "</select>
										</td>";
									}
						 echo "</form>
									<td bgcolor='#CAFFD8' colspan='2' align='center'>
										<img src='imagens/ficha.gif' title='Listar visitar deste idoso' border='0' onclick='listarVisitasIdoso(form1.idos_id.value)' style='cursor:pointer'/>
									</td>";
								echo "</tr>
							
							
                			<tr>
								<td align='center'>Idoso</td>
                				<td align='center'>Visitante</td>
                    			<td align='center'>Telefone</td>
								<td align='center'>Data</td>
								<td align='center'>Parentesco</td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td align='center' colspan='2'>Opções</td>";
								}
                			echo "</tr>";
               				
							$cont=0;
			   				$select=mysql_query("SELECT idos_id,pess_nome,idos_visi_id,idos_visi_data,idos_visi_grau_parentesco,visi_id,visi_telefone,visi_nome FROM  pessoas a, idosos b,idosos_visitantes c, visitantes d WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = c.idos_visi_idos_id) AND (c.idos_visi_visi_id = d.visi_id)");
			    			
							while($registro=mysql_fetch_array($select)){
								$idos_id=$registro['idos_id'];
								$idos_nome=$registro['pess_nome'];
								$idos_visi_id=$registro['idos_visi_id'];
								$idos_visi_data=$registro['idos_visi_data'];
								$idos_visi_grau_parentesco=$registro['idos_visi_grau_parentesco'];
								$visi_telefone=$registro['visi_telefone'];
								$visi_nome=$registro['visi_nome'];
								$visi_id=$registro['visi_id'];
  								$visi_telefone=$registro['visi_telefone'];
  								$visi_nome=$registro['visi_nome'];
  								$idos_visi_data = implode("/",array_reverse(explode("-",$idos_visi_data)));
								//for($i=0;$i<100;$i++){
								echo "<tr>
									<td align='center'>$idos_nome</td>
                					<td align='center'>$visi_nome</td>
                        			<td align='center'>$visi_telefone</td>
									<td align='center'>$idos_visi_data</td>
									<td align='center'>$idos_visi_grau_parentesco</td>";
									if($_SESSION['UsuarioNivel']!=3){	
										echo "<td align='center'><a href='editar_visita.php?visi_id=$visi_id&amp;idos_visi_id=$idos_visi_id'><img src='imagens/editar.gif' title='Editar visita' boder='0px'></a></td>"; ?>
									<td align='center'><a href='visita_excluida.php?visi_id=<?php echo $visi_id?>&amp;idos_visi_id=<?php echo $idos_visi_id?>' onclick="return confirm('Você tem certeza que quer excluir esta visita?')"><img src='imagens/excluir.gif' title='Excluir visita' boder='0px' > </a></td>
               	    			<?php 
									}
									echo "</tr>";	//}
								$cont++;
							}
							mysql_close($conexao);
	    		?>
        				<tr>
                			<td colspan="2">Total de Visitas</td>
                    		<td colspan="5"><center><?php echo $cont;?><center></td>
                		</tr>
            		</table>
           		</div>
				<span class="ficha_linkis">
           		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
                    <?php
                    if($_SESSION['UsuarioNivel']!=3){
						?> 
                        <a href="cadastrar_visita.php"><img src="imagens/novo.gif" border='0px'/></a>
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