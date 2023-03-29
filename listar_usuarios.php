<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']!=1){
		echo "<script>alert('Voce não tem permissão para acessar esta página!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
    <head/>

	<body id='corpo'>
	    <a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
        	<div id="ficha">
            	<span class='ficha_titulos'>	    				
		    			Usuários do Sistema<br><br>       
				</span>
            	<div id="listas">
            		<table border='1px' bordercolor='#CCCCCC'>				
						<?php
						include 'conexao.php';						
						//consulta sql - select
						$select = mysql_query("SELECT * FROM usuarios");
						echo "<tr>";
							echo "<td width='55%'>";
								echo "<center>Nome<center>";	
							echo "</td>";
							echo "<td>";
								echo "<center>Login<center>";	
							echo "</td>";
							echo "<td>";
								echo "<center>Nível<center>";	
							echo "</td>";
							echo "<td colspan='2'>";
								echo "<center>Opções<center>";	
							echo "</td>";
						echo "</tr>";
						$cont=0;
						while($linha=mysql_fetch_array($select)){
							$usua_id=$linha["usua_id"];
							$usua_nome=$linha["usua_nome"];
							$usua_nivel=$linha["usua_nivel"];
							$usua_login=$linha['usua_login'];
							//for($i=0;$i<100;$i++){
							echo "<tr>";
								echo "<td>";
									echo "&nbsp;&nbsp;&nbsp;&nbsp;$usua_nome &nbsp;&nbsp;&nbsp;&nbsp;";	
								echo "</td>";
								echo "<td>";
									echo "&nbsp;&nbsp;&nbsp;&nbsp;$usua_login &nbsp;&nbsp;&nbsp;&nbsp;";	
								echo "</td>";
								echo "<td>";
									echo "&nbsp;&nbsp;&nbsp;&nbsp;$usua_nivel &nbsp;&nbsp;&nbsp;&nbsp;";	
								echo "</td>";
						?>
                    			<td>
                                	<a href='editar_usuario.php?usua_id=<?php echo $usua_id ?>'><img src='imagens/editar.gif' title='Editar Usuário' border='0'/></a>
                                </td>
								<td>
									<a href='excluir_usuario.php?usua_id=<?php echo $usua_id ?>' onClick="return confirm('Tem certeza que deseja excluir esse usuario ?')"><img src='imagens/excluir.gif' title='Excluir Idoso' border='0'/></a>
					        	</td>
                                
                   		<?php
							echo "</tr>";//}
								$cont++;
						}
							echo "<tr>";
								echo "<td>";
									echo "<center>Total de usuários</center>";	
								echo "</td>";
								echo "<td colspan='4'>";
									echo "<center>$cont</center>";	
								echo "</td>";
							echo "</tr>";
							//fecha a conexão com o banco de dados
							mysql_close($conexao); 
						?>
			        	</table>
                 </div>
         		 <span class="ficha_linkis">
                	<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
                    <img src='imagens/espaco.gif' width='4%' height='2%' />
                    <a href='cadastrar_usuario.php'><img src='imagens/novo.gif' border='0px'/></a>
                 </span>
			</div>
			<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 					
		</div>		
	</body>
</html>
								
							