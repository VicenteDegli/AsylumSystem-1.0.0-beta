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
		<?php include 'script_espera.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Espera<br><br>
                </span>
                	
							<form name="form1" action='espera_cadastrada.php' method='post'>
                            	<span class="coluna_x2">
				  					Nome:<br>
  				  					<input type='text' size="50%" name='idos_nome'>
                                </span>
				  				<span class="coluna_x1">
				 					 Data de Nascmento:<br>
				 					 <input type="text" name="idos_data_nasc" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">	
                                </span>				
				  				<span class="coluna_x1">
				 					 CPF:<br>
				  					<input type='text' size="20%" name='idos_cpf' maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')">
                                </span>
                                <span class="coluna_x1">
		    	 					<br>Sexo:
                                    <select name="idos_sexo">
               	  						<option value="m">Masculino</option>
           		  						<option value="f">Feminino</option>
                                    </select>
                                </span>
                                <span class="coluna_x1">
				  					Data do Pedido:<br>
				  					<input type="text" name="espe_data_pedido" size="19%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
                                </span>
                                <span class="coluna_x1">
                  					Situação do Idoso:<br>
                  					<input type="text" name="espe_situacao">
                                </span>
                                <span class="coluna_x1">
                  					<br>Nivel de Prioridade:
                  					<select name="espe_nive_prioridade">
                  						<option value="1">Máxima</option>
                        				<option value="2">Média</option>
                        				<option value="3">Mínima</option>
                  					</select>
                                </span>
				  				<span class="coluna_x2">
				 					Endereço:<br>
				  					<input type='text' size="50%" name='idos_endereco'>
                                </span>
				  				<span class="coluna_x2">
				  					Bairro:<br>
				  					<input type='text' size="50%" name='idos_bairro'>
                                </span>
				  				<span class="coluna_x2">
				  					Cidade:<br>
				  					<input type='text' size="50%" name='idos_cidade'>
                                </span>
				  				<span class="coluna_x1">
				  					CEP:<br>
				  					<input name='idos_cep' type='text' maxlength='9' size="20%" OnKeyPress="formatar(this, '#####-###')">
                                </span>
				  				<span class="coluna_x0">
				  					<br>Estado:
				 					<select name='idos_uf'>
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
                                <span class="coluna_x2">
                  					Nome do Pedinte:<br>
                  					<input type="text" name="espe_pedinte" size="50%">
                                </span>
                                <span class="coluna_x1">
                  					Telefone do Pedinte:<br>
                  					<input type="text" name="espe_tele_pedinte">
                                </span>
                  				
                  				<span class="coluna_x1">
                  					Análize de Prioridade:<br>
				  					<textarea name="espe_anal_prioridade" rows="2" cols="20"></textarea>
                 				</span>
        					</form>
   						 
                    		<div id="linkis_fixos">
             					<img src="imagens/cadastrar.gif" border='0px' onClick="check()" style="cursor:pointer"/>
                    			<img src="imagens/espaco.gif" width="4%" height="2%" />
                    		 	<a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
                    		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
                    		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
                    		 	<a href="listar_esperas.php"><img src="imagens/todos.gif" border='0px'/></a>
                    		</div>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		
                		