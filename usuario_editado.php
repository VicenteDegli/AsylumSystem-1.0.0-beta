<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']!=1){
		echo "<script>alert('Usuário incluido com sucesso!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
	</head>

	<body bgcolor="#DFFFDF">
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            </div>               		
      		<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
      	</div>
					<?php
						//chama o arquivo de conexão com o banco de dados
						include 'conexao.php';						
						//variáveis
						$usua_id=$_GET['usua_id'];
						$usua_nome=$_POST["usua_nome"];	
						$usua_login=$_POST["usua_login"];
						$usua_senha=$_POST['usua_senha'];	
						$usua_nivel=$_POST["usua_nivel"];
						
						//consulta sql - insert
						$usua_regs_id=NULL;
						$select=mysql_query("SELECT * FROM usuarios WHERE usua_login='$usua_login'") or die(mysql_error());
						$registro=mysql_fetch_array($select);
						$usua_regs_id=$registro['usua_id'];
						if($usua_regs_id!=NULL && $usua_regs_id!=$usua_id){
							echo "<script>alert('Login de Usuário Já Existe!');
									      window.history.go(-1);
								  </script>";
						}
						else{
							$update = mysql_query("UPDATE usuarios SET usua_nome='$usua_nome',usua_login='$usua_login',usua_senha='$usua_senha',usua_nivel='$usua_nivel' WHERE usua_id='$usua_id'") or die (mysql_error());									
					            if ($update){
									echo "<script>alert('Usuário editado com sucesso!');
												  window.location.href='listar_usuarios.php';
									      </script>";
								}
								else{
									echo "<script>alert('Erro ao editar Usuário! Você será encaminhado para página anterior.');
												  window.history.go(-1);
									      </script>";
								}								        		
				   			echo "</td>";
						echo "</tr>";	
						}
						//fecha a conexão com o banco de dados
						mysql_close($conexao); 
					?> 
		</center>   		
	</body>
</html>
								
							