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
					Eventos<br><br>
                </span>
                <div id="listas">
    			<?php 
					include 'conexao.php';
					$idos_id=$_GET['idos_id'];
					$select_idos=mysql_query("SELECT idos_pess_id FROM idosos WHERE idos_id = '$idos_id'");
					$registro=mysql_fetch_array($select_idos);
					$pess_id=$registro['idos_pess_id'];
					$select_idos=mysql_query("SELECT pess_nome FROM pessoas WHERE pess_id = '$pess_id'");
					$registro=mysql_fetch_array($select_idos);
					$idos_nome=$registro['pess_nome'];
		
       				 echo "<table border='1px' bordercolor='#CCCCCC'>
            			<tr>
                			<td colspan='4'><center>$idos_nome</center></td>
                		</tr>
                		<tr>
                				<td align='center' style='min-width:100px'>Tipo</td>
                    			<td align='center' style='min-width:100px'>Data</td>
                   				<td align='center' style='min-width:100px'>Local</td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td align='center'>Opções</td>";
								}
                		echo "</tr>";
               
			   		 $cont=0;
					 $select_visi=mysql_query("SELECT * FROM eventos a,idosos_eventos b WHERE (a.even_id = b.idos_even_even_id) AND (b.idos_even_idos_id = '$idos_id')");
					while($registro=mysql_fetch_array($select_visi)){
						$even_id=$registro['even_id'];
						$idos_even_id=$registro['idos_even_id'];
  						$even_tipo=$registro['even_tipo'];
  						$even_data=$registro['even_data'];
  						$even_local=$registro['even_local'];
						$even_data = implode("/",array_reverse(explode("-",$even_data)));
						//for($i=0;$i<100;$i++){
					
						echo "<tr>
                			<td><center>$even_tipo</center></td>
                   	    	<td><center>$even_data</center></td>
                        	<td><center>$even_local</center></td>";
							if($_SESSION['UsuarioNivel']!=3){
								?>
								<td align='center'><a href='excluir_idoso_de_evento.php?idos_even_id=<?php echo $idos_even_id?>&idos_id=<?php echo $idos_id?>' onclick="return confirm('Está ação apagará a participação deste idoso neste evento. Confirma esta ação?')"><img src="imagens/excluir.gif" boder='0' title="Excluir este evento deste idoso"></a></td>
                                <?php
							}
               	    	echo "</tr>";//}	
						$cont++;
					}
					mysql_close($conexao);
	    		?>
        			<tr>
                		<td colspan="2">Total de Eventos</td>
                    	<td colspan="4"><center><?php echo $cont;?><center></td>
                	</tr>
            	</table>
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
           		