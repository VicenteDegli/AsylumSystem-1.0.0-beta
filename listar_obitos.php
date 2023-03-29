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
                	Lista de Óbitos<br><br>
                </span>
            	<div id="listas">
    	<?php 
			include 'conexao.php';
				echo "<table border='1px' bordercolor='#CCCCCC'>
							<tr>
                       		 	<td ><center>Nome</center></td> 
                       	        <td ><center>CPF</center></td> 
                           	    <td><center>Nascimento</center></td>
                            	<td ><center>Sexo</center></td>
								<td ><center>Falecimento</center></td>
								<td ><center>Local</center></td>
								<td ><center>Causa</center></td>
								<td ><center>Extrema Unção</center></td>
								<td colspan='4'><center>Opções</center></td>";
								
                        	echo "</tr>";
							
				$select=mysql_query("SELECT idos_id,pess_nome,pess_cpf,pess_data_nasc,pess_sexo,obit_causa,obit_local,obit_data_falecimento,obit_extre_uncao,obit_id FROM  pessoas a, idosos b, obitos c WHERE (a.pess_id = b.idos_pess_id) AND (b.idos_id = c.obit_idoso_id) AND (idos_falecido = '1')");
				while($registro=mysql_fetch_array($select)){
					$idos_id=$registro['idos_id'];
					$idos_nome=$registro['pess_nome'];
					$idos_cpf=$registro['pess_cpf'];
					if($idos_cpf == ''){
						$idos_cpf= 'xxx.xxx.xxx-xx';
					}
					$idos_data_nasc=$registro['pess_data_nasc'];
					$idos_sexo=$registro['pess_sexo'];
					$obit_id=$registro['obit_id'];
					$obit_causa=$registro['obit_causa'];
					$obit_local=$registro['obit_local'];
					$obit_data_falecimento=$registro['obit_data_falecimento'];
					$obit_extre_uncao=$registro['obit_extre_uncao'];
					
					$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
					if($idos_data_nasc == '00/00/0000'){
						$idos_data_nasc = 'xx/xx/xxxx';
					}
					$obit_data_falecimento = implode("/",array_reverse(explode("-",$obit_data_falecimento)));
					//for($i=0;$i<100;$i++){
					echo "<tr>
                            	<td><center>$idos_nome</center></td> 
                       	        <td><center>$idos_cpf</center></td> 
                           	    <td><center>$idos_data_nasc</center></td>
                            	<td><center>"; if($idos_sexo=='m'){ echo "Masculino";} else{ echo "Feminino";} echo"</center></td>
								<td><center>$obit_data_falecimento</center></td>
								<td><center>$obit_local</center></td>
								<td><center>$obit_causa</center></td>";
								echo "<td ><center>"; if($obit_extre_uncao==1){echo "Sim";}else{ echo "Não";} echo" </center></td>";
								if($_SESSION['UsuarioNivel']!=3){ 
                                   	echo "<td>
										<a href='editar_obito.php?obit_id=$obit_id&amp;idos_id=$idos_id'><img src='imagens/editar.gif' title='Editar Obito' border='0'/></a>
									</td>";		
									
                                    echo "<td bgcolor='#CAFFD8' align='center'>
										<a href='ficha_idoso_falecido_pdf.php?idos_id=$idos_id' target='_blank'> <img src='imagens/ficha.gif' title='Gerar Ficha' border='0' style='cursor:pointer'/>
									</td>";
									?>
                                    <td><a href='excluir_obito.php?obit_id=<?php  echo $obit_id?>&amp;idos_id=<?php  echo $idos_id?>' onclick="return confirm('Realmente você deseja ecluir óbito?')"><img src='imagens/excluir.gif' title='Excluir Obito' border='0'/></a>
                                    </td>
									<?php 
								}
								else{
									echo "<td bgcolor='#CAFFD8' align='center'>
										<a href='ficha_idoso_falecido_pdf.php?idos_id=$idos_id' target='_blank'> <img src='imagens/ficha.gif' title='Gerar Ficha' border='0' style='cursor:pointer'/>
									</td>";
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
                        		echo "<a href='cadastrar_obito.php'><img src='imagens/novo.gif' border='0' /></a>	
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