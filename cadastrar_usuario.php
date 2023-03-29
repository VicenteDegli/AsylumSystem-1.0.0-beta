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
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php include 'script_usuario.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Novo Usuário <br><br><br><br>
                </span>
                		<div id="form_usuario">
		  					 <form name="form1" action='usuario_cadastrado.php' method='post'>
							 	<span class="auto">
										Nome:<br>
										<input type='text' size="43%" name='usua_nome' >
                                </span>
                                <span class="auto">
										<br>Nivel:
										<select name='usua_nivel'>
 											<option value='1'>1</option>
 											<option value='2'>2</option>
 											<option value='3'>3</option>
 										</select>  
                                </span>
								<span class="auto">
										Login:<br>
										<input type='text' size="25%" name='usua_login'>
                                </span>
								<span class="auto">
                                        Senha:<br>
                                        <input type='password' size="25%" name='usua_senha'>
                                </span>
								
                          </div>
                                <div id="linkis_fixos">
                                	 <img src="imagens/cadastrar.gif" border='0px' onClick="check()" style="cursor:pointer"/>
                    				 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    				 <a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
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