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
        <?php include 'script_usuario.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<?php 
			include 'conexao.php';
			$usua_id=$_GET["usua_id"];
			
			$select = mysql_query("SELECT * FROM usuarios WHERE usua_id='$usua_id'");
			$linha=mysql_fetch_array($select);
				$usua_nome=$linha["usua_nome"];
				$usua_nivel=$linha["usua_nivel"];
				$usua_login=$linha['usua_login'];
				$usua_senha=$linha['usua_senha'];
			mysql_close($conexao);
		?>
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Editar Usuário <br><br><br><br>
                </span>
                		<div id="form_usuario">
		  					 <form name="form1" action='usuario_editado.php?usua_id=<?php echo $usua_id?>' method='post'>
							 	<span class="auto">
										Nome:<br>
										<input type='text' size="43%" name='usua_nome' value="<?php echo $usua_nome?>">
                                </span>
                                <span class="auto">
										<br>Nivel:
										<select name='usua_nivel'>
 											<option value='1' <?php if($usua_nivel=='1'){echo "selected='selected'";}?>>1</option>
 											<option value='2' <?php if($usua_nivel=='2'){echo "selected='selected'";}?>>2</option>
 											<option value='3' <?php if($usua_nivel=='3'){echo "selected='selected'";}?>>3</option>
 										</select>  
                                </span>
								<span class="auto">
										Login:<br>
										<input type='text' size="25%" name='usua_login' value="<?php echo $usua_login?>">
                                </span>
								<span class="auto">
                                        Senha:<br>
                                        <input type='password' size="25%" name='usua_senha' value="<?php echo $usua_senha?>">
                                </span>
								
                          </div>
                                <div id="linkis_fixos">
                                	 <img src="imagens/cadastrar.gif" border='0px' onClick="check()" style="cursor:pointer"/>
                    				 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    				 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    				 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    				 <a href="listar_usuarios.php"><img src="imagens/todos.gif" border='0px'/></a>
                                </div>
		   				 </form>
                    
		 	</div>               		
      		<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
	</body>
</html>