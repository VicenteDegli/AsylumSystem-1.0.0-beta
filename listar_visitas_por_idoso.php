<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="documentos.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
	</head>

	<body bgcolor="#DFFFDF">
        <a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
        	<div id="ficha">
            	<span class='ficha_titulos'>
                	Visitas ao idoso<br><br>
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
		
        echo "<table border='1' bordercolor='#CCCCCC'>
            	<tr>
                	<td colspan='6'><center>$idos_nome</center></td>
                </tr>
                <tr>
                	<td><center>Nome</center></td>
                    <td><center>Grau de Parentesco</center></td>
                    <td><center>Data</center></td>
                    <td><center>Telefone</center></td>";
					if($_SESSION['UsuarioNivel']!=3){
						echo "<td colspan='2'><center>Opções</center></td>";
					}
                echo "</tr>";
               
			    $cont=0;
				$select_visi=mysql_query("SELECT * FROM idosos a,visitantes b,idosos_visitantes c WHERE (a.idos_id = c.idos_visi_idos_id) AND (c.idos_visi_visi_id = b.visi_id) AND (c.idos_visi_idos_id='$idos_id')");
				while($registro=mysql_fetch_array($select_visi)){
					$visi_id=$registro['visi_id'];
					$idos_visi_id=$registro['idos_visi_id'];
  					$visi_telefone=$registro['visi_telefone'];
  					$idos_visi_grau_parentesco=$registro['idos_visi_grau_parentesco'];
  					$visi_nome=$registro['visi_nome'];
  					$idos_visi_data=$registro['idos_visi_data'];
					//for($i=0;$i<100;$i++){
				    $idos_visi_data = implode("/",array_reverse(explode("-",$idos_visi_data)));
					
					echo "<tr>
                		<td><center>$visi_nome</center></td>
                   	    <td><center>$idos_visi_grau_parentesco</center></td>
                        <td><center>$idos_visi_data</center></td>
                        <td><center>$visi_telefone</center></td>";
						if($_SESSION['UsuarioNivel']!=3){
							echo "<td><center><a href='editar_visita.php?idos_visi_id=$idos_visi_id&amp;visi_id=$visi_id'><img src='imagens/editar.gif' title='Editar visita' border='0px'></a></center></td>";
							?>
							<td><center><a href='visita_excluida.php?idos_visi_id=<?php echo $idos_visi_id?>&amp;visi_id=<?php echo $visi_id?>' onclick="return confirm('Você tem certeza que deseja excluir esta visita?')"><img src="imagens/excluir.gif" title="Excluir visita" border='0px'></a></center></td>
                        	<?php
						}
               	    echo "</tr>";//}
					
					$cont++;
				}
			mysql_close($conexao);
	    ?>
        		<tr>
                	<td colspan="2">Total de Visitantes</td>
                    <td colspan="4"><center><?php echo $cont;?><center></td>
                </tr>
            </table>
            	</div>
        		<span class="ficha_linkis">
                	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="cadastrar_visita.php"><img src="imagens/novo.gif" border='0px'/></a>
                    <img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>
                    <img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="listar_visitas.php"><img src="imagens/todos.gif" border='0px' title="Todas visitas"/></a>
                </span>
			</div>
			<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 					
		</div>
	</body>
</html>