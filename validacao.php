<?php 
		if (!isset($_SESSION)){
			session_start();
		}
?>
<html>
	<head>
		<title>validar dados</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  		<link rel="stylesheet" type="text/css" href="index.css">
	</head>
    <body background="imagens/fundo.gif">
      	<img src="imagens/cabecalho_1.gif" id='cabecalho' border='0px'/>
        <div id="esquerda"></div>
        <div id="direita"></div>
		<?php
			// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
			if(!empty($_POST) && (empty($_POST['usua_login']) || empty($_POST['usua_senha']))){
				echo "<form action='validacao.php' method='post'>
						<div id='form_login'>
							<center><legend><i>Logue para acessar o sistema</i></legend></center>
                  			<span class='auto'>
                  	  			Usuário:
                       		</span>
                        	<span class='auto'>  
                     			<input type='text' name='usua_login' id='txUsuario' maxlength='25' />
								<font size='3px' color='#FF0033'><br>Dados Incorretos!</font>
                        	</span>
                        	<span class='auto'>
                   				Senha: 
                        	</span>
                        	<span class='auto'>   
				      			<input type='password' name='usua_senha' id='txSenha'/>
                        	</span>
				 			<span class='auto'>
                				<input type='Image' name='send' src='imagens/enter.gif' autofocus>
                        	</span>
                		</div>
   		  			</form>";
					session_destroy(); // Destrói a sessão limpando todos os valores salvos
			}
			else{
				include 'conexao.php';
				$usua_login=$_POST['usua_login'];
				$usua_senha=$_POST['usua_senha'];
				$query = mysql_query("SELECT usua_id,usua_nome,usua_nivel,usua_senha FROM usuarios WHERE usua_login = '$usua_login'") or die (mysql_error());
				$resultado = mysql_fetch_array($query);
				$usua_id=$resultado['usua_id'];
				$usua_regs_nome=$resultado['usua_nome'];
				$usua_regs_nivel=$resultado['usua_nivel'];
				$usua_regs_senha=$resultado['usua_senha'];
				$flag=true;
				//echo "Usuário: ".$usua_regs_nome;
				
				if($usua_regs_nome==''){
					echo "<form action='validacao.php' method='post'>
            				<div id='form_login'>
			    				<center><legend><i>Logue para acessar o sistema</i></legend></center>
            	      			<span class='auto'>
        	          	  			Usuário:
    	                    	</span>
	                        	<span class='auto'>  
                     				<input type='text' name='usua_login' id='txUsuario' maxlength='25' />
									<font size='3px' color='#FF0033'><br>Usuário Inesistente!</font>
            	        	    </span>
                		        <span class='auto'>
                	   				Senha: 
            	      		    </span>
        	         	        <span class='auto'>   
					     	 		<input type='password' name='usua_senha' id='txSenha'/>
	                        	</span>
				 				<span class='auto'>
                					<input type='Image' name='send' src='imagens/enter.gif'  autofocus>
                    	    	</span>
                			</div>
   		  				</form>";
					session_destroy(); // Destrói a sessão limpando todos os valores salvos
				}
				else{
					if($usua_senha!=$usua_regs_senha){
						echo "<form action='validacao.php' method='post'>
            					<div id='form_login'>
			    					<center><legend><i>Logue para acessar o sistema</i></legend></center>
                  					<span class='auto'>
                  	  					Usuário:
                       				 </span>
			                        <span class='auto'>  
            			         		<input type='text' name='usua_login' id='txUsuario' maxlength='25' value='$usua_login'/>
                        			</span>
  			                        <span class='auto'>
              			     			Senha: 
                        			</span>
			                        <span class='auto'>   
							      		<input type='password' name='usua_senha' id='txSenha'/>
										<font size='3px' color='#FF0033'><br>Senha Incorreta!</font>
    			                    </span>
				 					<span class='auto'>
        		        				<input type='Image' name='send' src='imagens/enter.gif' autofocus>
                			        </span>
                				</div>
   		  					</form>";
						session_destroy(); // Destrói a sessão limpando todos os valores salvos
					}
					else{
						$_SESSION['UsuarioID'] = $resultado['usua_id'];
						$_SESSION['UsuarioNome'] = $resultado['usua_nome'];
						$_SESSION['UsuarioNivel'] = $resultado['usua_nivel'];
						
						echo "<script>window.location.href='home.php';</script>";
					}
				}	
			}
		?>
		<div id="rodape"></div>    	
	</body>
</html>