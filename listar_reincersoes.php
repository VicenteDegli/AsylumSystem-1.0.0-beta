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
        <a href='index.php' target="new"><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
        	<div id="ficha">
            	<span class='ficha_titulos'>
                	Idosos Reinceridos a Família<br><br>
                </span>
            	<div id="listas">
    	<?php 
			include 'conexao.php';
				echo "<table border='1px' bordercolor='#CCCCCC'>
							<tr>
                       		 	<td ><center>Nome</center></td> 
                       	        <td ><center>CPF</center></td> 
                           	    <td><center>Data de Nascimento</center></td>
                            	<td ><center>Sexo</center></td>
								<td ><center>Data de Reincersão</center></td>
								<td ><center>Motivo</center></td>";
								if($_SESSION['UsuarioNivel']!=3){
									echo "<td colspan='4'><center>Opções</center></td>";
								}
                        	echo "</tr>";
							
				$select=mysql_query("SELECT idos_id,pess_nome,pess_cpf,pess_data_nasc,pess_sexo,reic_data,reic_motivo,reic_id FROM  pessoas a, idosos b, idoso_reinceridos_familia c WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = c.reic_idos_id)");
				while($registro=mysql_fetch_array($select)){
					$idos_id=$registro['idos_id'];
					$idos_nome=$registro['pess_nome'];
					$idos_cpf=$registro['pess_cpf'];
					$idos_data_nasc=$registro['pess_data_nasc'];
					$idos_sexo=$registro['pess_sexo'];
					$reic_id=$registro['reic_id'];
					$reic_data=$registro['reic_data'];
					$reic_motivo=$registro['reic_motivo'];
					
					$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
					$reic_data = implode("/",array_reverse(explode("-",$reic_data)));
					//for($i=0;$i<100;$i++){
					echo "<tr>
                            	<td><center>$idos_nome</center></td> 
                       	        <td><center>$idos_cpf</center></td> 
                           	    <td><center>$idos_data_nasc</center></td>
                            	<td><center>"; if($idos_sexo=='m'){ echo "Masculino";} else{ echo "Feminino";} echo"</center></td>
								<td><center>$reic_data</center></td>
								<td><center>$reic_motivo</center></td>";
								if($_SESSION['UsuarioNivel']!=3){
						        	echo "<td>
										<a href='editar_reincersao.php?reic_id=$reic_id&amp;idos_id=$idos_id'><img src='imagens/editar.gif' title='Editar Reincersão' border='0'/></a>
									</td>";		
									?>
                                    	<td><a href='excluir_reincersao.php?reic_id=<?php echo $reic_id?>&amp;idos_id=<?php echo $idos_id?>' onclick="return confirm('Realmente você deseja ecluir reincersão?')"><img src='imagens/excluir.gif' title='Excluir Obito' border='0'/></a>
                                        </td>
									<?php
								}
								echo "</tr>";//}							         
				}
					
					echo "</table>";
			mysql_close($conexao);
			
		?>
        		</div>
        		<span class="ficha_linkis">
                		<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
						<img src='imagens/espaco.gif' width='4%' height='2%' />	
						 <?php 
							if($_SESSION['UsuarioNivel']!=3){
                        		echo "<a href='reincerir_familia.php'><img src='imagens/novo.gif' border='0' /></a>	
								<img src='imagens/espaco.gif' width='4%' height='2%' />";
							}
						?>
                    	<a href='#inicio'><img src='imagens/inicio.gif' border='0px'/>
                </span>
			</div>
			<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 					
		</div>
	</body>
</html>