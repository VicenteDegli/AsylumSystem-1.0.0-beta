<?php	
	if (!isset($_SESSION)){
		session_start(); // Inicia a sessão
	}
    session_destroy(); // Destrói a sessão limpando todos os valores salvos
?>
<html>
	<head>
    	<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<link rel="stylesheet" type="text/css" href="index.css">
		<title>Login</title>
	</head>
	<body background="imagens/fundo.gif">   	
    	<img src="imagens/cabecalho_1.gif" id='cabecalho' border='0px'/>
        	<div id="esquerda"></div>
            <div id="direita"></div>
            <!--<div id="index">
            <!--<img src='imagens/igreja.gif' id='igreja' border='0px'>
             Formulário de Login -->
          
   	    		<form action="validacao.php" method="post">
            		<div id="form_login">
			    		<center><legend><i>Logue para acessar o sistema</i></legend></center>
                  		<span class="auto">
                  	  		Usuário:
                        </span>
                        <span class="auto">  
                     		<input type="text" name="usua_login" id="txUsuario" maxlength="25" />
                        </span>
                        <span class="auto">
                   			Senha: 
                        </span>
                        <span class="auto">   
				      		<input type="password" name="usua_senha" id="txSenha"/>
                        </span>
                        <span class="auto">
                			<input type="Image" name="send" src="imagens/enter.gif" autofocus>
                        </span>
                	</div>
   		  		</form>
        <div id="rodape"></div>     	
</body>
</html>