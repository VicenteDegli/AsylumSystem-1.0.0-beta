<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <script language="javascript">
			function eventos(idos_id){
				if(idos_id==''){
					alert('Selecione um idoso!');
				}
				else{
					window.location.href='listar_eventos_por_idoso.php?idos_id='+idos_id;
				}
			}
		</script>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
					Eventos<br><br>
                </span>
                <div id="listas">
    			<?php 
					include 'conexao.php';
        			echo "<table border='1px' bordercolor='#CCCCCC'>
							<form name='form1'>
							<tr>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td colspan='6'>
										<select name='idos_id'>
											<option value=''>Buscar por nome...</option>";
											include 'select_idosos.php';
										echo "</select>
									</td>";
								}
								else{
									echo "<td colspan='3'>
										<select name='idos_id'>
											<option value=''>Buscar por nome...</option>";
											include 'select_idosos.php';
										echo "</select>
									</td>";
								}
							echo "</form>";
									echo "<td bgcolor='#CAFFD8' align='center'>
										<img src='imagens/ficha.gif' title='Listar eventos frequentados por este idoso' border='0' onclick='eventos(form1.idos_id.value)' style='cursor:pointer'/>
							</tr>
               				<tr>
                				<td align='center' style='min-width:100px'>Tipo</td>
                    			<td align='center' style='min-width:100px'>Data</td>
                   				<td align='center' style='min-width:100px'>Local</td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td colspan='4' align='center'>Opções</td>";
								}
								else{
									echo "<td align='center'>Opções</td>";
								}
                			echo "</tr>";
               
			   		$cont=0;
					$select_visi=mysql_query("SELECT * FROM eventos");
					while($registro=mysql_fetch_array($select_visi)){
						$even_id=$registro['even_id'];
  						$even_tipo=$registro['even_tipo'];
  						$even_data=$registro['even_data'];
  						$even_local=$registro['even_local'];
						$even_data = implode("/",array_reverse(explode("-",$even_data)));
					    //for($i=0;$i<100;$i++){
						echo "<tr>
                			<td align='center'>$even_tipo</td>
                   	    	<td align='center'>$even_data</td>
                        	<td align='center'>$even_local</td>";
							if($_SESSION['UsuarioNivel']!=3){
                        		echo "<td align='center'><a href='editar_evento.php?even_id=$even_id'><img src='imagens/editar.gif' title='Eidtar evento'></a></td>";
								?>
								<td align='center'><a href='evento_excluido.php?even_id=<?php echo $even_id?>' onclick="return confirm('Tem certeza que deseja excluir este evento? Serão apagados também todos dados relacionados a ele.')"><img src='imagens/excluir.gif' title='Excluir evento'></a></td>
                                <?php		
							
							echo "<td align='center'><a href='adiconar_idosos_a_eventos.php?even_id=$even_id'><img src='imagens/add.gif' title='Adcionar idoso(s)'></a></td>";
							}
							echo "<td align='center'><a href='listar_idosos_por_evento.php?even_id=$even_id'><img src='imagens/ficha.gif' title='Participantes'></a></td>";
							
               	    	echo "</tr>";	//}
						$cont++;
					}
					mysql_close($conexao);
	   			 ?>
        				<tr>
                			<td colspan="2">Total de Eventos</td>
                    		<td colspan="5"><center><?php echo $cont;?><center></td>
                		</tr>
            		</table>
        		</div>
				<span class="ficha_linkis">
           		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
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
           		