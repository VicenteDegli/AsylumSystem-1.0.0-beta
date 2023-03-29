<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php include 'script_voluntario.js'?>
         
	</head>
	
	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Voluntário<br><br>
                </span>
                		<form name="form1" action='voluntario_cadastrado.php' method='post'>
							<span class="auto">
								Nome:<br>
								<input type='text' size="45%" name='nome'>
                            </span>        
							<span class="auto">
								Data de Nascmento:<br>
                                <input type="text" name="data_nasc" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
							</span>		
							<span class="auto">
								CPF:<br>
								<input type='text'  name='cpf' size="25%" maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')">
                            </span>           
							<span class="auto">
								Sexo:<br>
								<select name='sexo'>
 									<option value='m'>Masculino</option>
 									<option value='f'>Feminino</option>
								</select> 
                            </span>
                            <span class="auto">
                                Telefone: <br>
                                <input type='text'  name='cola_telefone' maxlength="12" OnKeyPress="formatar(this, '## ####-####')">							</span>
                            <span class="auto">
                                Identidade:<br> 
                                <input type='text'  name='cola_identidade' maxlength="12" OnKeyPress="formatar(this, '##.###.###-#')">
                            </span>
                            <span class="auto">
                                Funçao:<br>
                                <input type='text'  name='cola_funcao'> 
                            </span>
                            <span class="auto">
                                Conprometimento:<br>
                                <input type='text'  name='volu_comprometimento'>
                            </span>
                         <span class="auto"> 	
					 		<span class="coluna_x2">
				 	 			Endereço:<br>
				  				<input type='text' size="50%" name='func_endereco'>
				 			</span>
                	 		<span class="coluna_x2">
                     			Bairro:<br>
				  				<input type='text' size="50%" name='func_bairro'>
					 		</span>
                 			<span class="coluna_x2">
				 				Cidade:<br>
				    			<input type='text' size="50%" name='func_cidade'>
                    		</span>
                    		<span class="coluna_x1">
								CEP:<br>
				  				<input name='func_cep' type='text' maxlength='9' OnKeyPress="formatar(this, '#####-###')">
							</span>
                            <span class="auto">
                    			<br>Estado:
				  				<select name='func_uf'>
				  					<option value="AC">AC</option>
				 		   			<option value="AL">AL</option>
				    				<option value="AM">AM</option>
				   				 	<option value="AP">AP</option>
				    				<option value="BA">BA</option>
				    				<option value="CE">CE</option>
				   					<option value="DF">DF</option>
				    				<option value="ES">ES</option>
				    				<option value="GO">GO</option>
				    				<option value="MA">MA</option>
				   			 		<option value="MG">MG</option>
				    				<option value="MS">MS</option>
				    				<option value="MT">MT</option>
				    				<option value="PA">PA</option>
				   					<option value="PB">PB</option>
				    				<option value="PE">PE</option>
				    				<option value="PI">PI</option>
				    				<option value="PR">PR</option>
				    				<option value="RJ">RJ</option>
				    				<option value="RN">RN</option>
				    				<option value="RO">RO</option>
				   				 	<option value="RR">RR</option>
				    				<option value="RS">RS</option>
				    				<option value="SC">SC</option>
				   				 	<option value="SE">SE</option>
				   				 	<option value="SP">SP</option>
				    				<option value="TO">TO</option>
			      				</select>
                     		</span>
                        </span>                   	
            			</form>
            			<div id="linkis_fixos">
       						<img src="imagens/cadastrar.gif" border='0px' onClick="check()" style="cursor:pointer"/>
           					<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 			<a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
           		 			<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 			<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 			<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 			<a href="listar_voluntarios.php"><img src="imagens/todos.gif" border='0px'/></a>
           				</div>
            	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           	