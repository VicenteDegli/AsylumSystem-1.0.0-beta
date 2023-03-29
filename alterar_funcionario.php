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
        <?php include 'script_funcionario.js'; ?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Funcionário<br><br>
                </span>
                		<?php
        								include 'conexao.php';	
											$pess_id=$_GET['pess_id'];
											$cola_id=$_GET['cola_id'];
											$func_id=$_GET['func_id'];
											//Consulta sql
            								$select=mysql_query("SELECT * FROM pessoas WHERE pess_id='$pess_id'");
														$linha=mysql_fetch_array($select);
														$pess_nome=$linha["pess_nome"];
														$pess_data_nasc=$linha["pess_data_nasc"];
														$pess_cpf=$linha["pess_cpf"];
														$pess_sexo=$linha["pess_sexo"];
														$pess_endereco=$linha["pess_endereco"];
														$pess_bairro=$linha["pess_bairro"];
														$pess_cidade=$linha["pess_cidade"];
														$pess_cep=$linha["pess_cep"];
														$pess_uf=$linha["pess_uf"];
											$select=mysql_query("SELECT * FROM colaboradores WHERE cola_id='$cola_id'");
														$linha=mysql_fetch_array($select);
														$cola_telefone=$linha['cola_telefone'];
														$cola_identidade=$linha['cola_identidade'];
														$cola_funcao=$linha['cola_funcao'];
											$select=mysql_query("SELECT * FROM funcionarios WHERE func_id='$func_id'");
														$linha=mysql_fetch_array($select);
														$func_cola_id=$linha['func_cola_id'];
														$func_carg_horaria=$linha['func_carg_horaria'];
														$func_salario=$linha['func_salario'];
														$func_faltas=$linha['func_faltas'];
														
														$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
						?>
   						<form name="form1"  action='funcionario_alterado.php?pess_id=<?php echo $pess_id?>&amp;cola_id=<?php echo $cola_id?>&amp;func_id=<?php echo $func_id?>' method='post'>
							<span class="auto">
								Nome:<br>
								<input type='text' size="45%" name='nome' value="<?php echo $pess_nome?>">
                            </span>        
							<span class="auto">
								Data de Nascmento:<br>
                                <input type="text" name="data_nasc" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $pess_data_nasc?>">
							</span>		
							<span class="auto">
								CPF:<br>
								<input type='text'  name='cpf' size="25%" maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')" value="<?php echo $pess_cpf?>">
                            </span>           
							<span class="auto">
								Sexo:<br>
								<select name='sexo'>
 									<option value='m' <?php if($pess_sexo=='m'){echo "selected='selected'";}?>>Masculino</option>
 									<option value='f' <?php if($pess_sexo=='f'){echo "selected='selected'";}?>>Feminino</option>
								</select> 
                            </span>
                            <span class="auto">
                                Telefone: <br>
                                <input type='text'  name='cola_telefone' maxlength="12" OnKeyPress="formatar(this, '## ####-####')" value="<?php echo $cola_telefone?>">							</span>
                            <span class="auto">
                                Identidade:<br> 
                                <input type='text'  name='cola_identidade' maxlength="12" OnKeyPress="formatar(this, '##.###.###-#')" value="<?php echo $cola_identidade?>">
                            </span>
                            <span class="auto">
                                Funçao:<br>
                                <input type='text'  name='cola_funcao' maxlength="11" value="<?php echo $cola_funcao?>"> 
                            </span>
                            <span class="auto">
                                Carga Horária:<br>
                                <input type='text'  name='func_carg_horaria' maxlength="11" value="<?php echo $func_carg_horaria?>">
                            </span>
                            <span class="auto">
                                Salario:<br>
                                <input type='text'  name='func_salario' maxlength="11" value="<?php echo $func_salario?>">
                            </span>
                            <span class="auto">
                                Faltas:<br>
                            	<input type='text'  name='func_faltas' maxlength="11" value="<?php echo $func_faltas?>">
                            </span>
                         <span class="auto"> 	
					 		<span class="coluna_x2">
				 	 			Endereço:<br>
				  				<input type='text' size="50%" name='func_endereco' value="<?php echo $pess_endereco?>">
				 			</span>
                	 		<span class="coluna_x2">
                     			Bairro:<br>
				  				<input type='text' size="50%" name='func_bairro' value="<?php echo $pess_bairro?>">
					 		</span>
                 			<span class="coluna_x2">
				 				Cidade:<br>
				    			<input type='text' size="50%" name='func_cidade' value="<?php echo $pess_cidade?>">
                    		</span>
                    		<span class="coluna_x1">
								CEP:<br>
				  				<input name='func_cep' type='text' maxlength='9' OnKeyPress="formatar(this, '#####-###')" value="<?php echo $pess_cep?>">
							</span>
                            <span class="auto">
                    			<br>Estado:
				  				<select name='func_uf'>
				  					 <option value="AC" <?php if($pess_uf=='AC'){echo "selected='selected'";} ?>>AC</option>
							    	 <option value="AL" <?php if($pess_uf=='AL'){echo "selected='selected'";} ?>>AL</option>
				    				 <option value="AM" <?php if($pess_uf=='AM'){echo "selected='selected'";} ?>>AM</option>
				   					 <option value="AP" <?php if($pess_uf=='AP'){echo "selected='selected'";} ?>>AP</option>
				   					 <option value="BA" <?php if($pess_uf=='BA'){echo "selected='selected'";} ?>>BA</option>
				   					 <option value="CE" <?php if($pess_uf=='CE'){echo "selected='selected'";} ?>>CE</option>
						   			 <option value="DF" <?php if($pess_uf=='DF'){echo "selected='selected'";} ?>>DF</option>
						   			 <option value="ES" <?php if($pess_uf=='ES'){echo "selected='selected'";} ?>>ES</option>
						   			 <option value="GO" <?php if($pess_uf=='GO'){echo "selected='selected'";} ?>>GO</option>
				   					 <option value="MA" <?php if($pess_uf=='MA'){echo "selected='selected'";} ?>>MA</option>
						   			 <option value="MG" <?php if($pess_uf=='MG'){echo "selected='selected'";} ?>>MG</option>
						   			 <option value="MS" <?php if($pess_uf=='MS'){echo "selected='selected'";} ?>>MS</option>
						   			 <option value="MT" <?php if($pess_uf=='MT'){echo "selected='selected'";} ?>>MT</option>
				   					 <option value="PA" <?php if($pess_uf=='PA'){echo "selected='selected'";} ?>>PA</option>
						   			 <option value="PB" <?php if($pess_uf=='PB'){echo "selected='selected'";} ?>>PB</option>
						   			 <option value="PE" <?php if($pess_uf=='PE'){echo "selected='selected'";} ?>>PE</option>
						   			 <option value="PI" <?php if($pess_uf=='PI'){echo "selected='selected'";} ?>>PI</option>
				   					 <option value="PR" <?php if($pess_uf=='PR'){echo "selected='selected'";} ?>>PR</option>
						  			 <option value="RJ" <?php if($pess_uf=='RJ'){echo "selected='selected'";} ?>>RJ</option>
						   			 <option value="RN" <?php if($pess_uf=='RN'){echo "selected='selected'";} ?>>RN</option>
						   			 <option value="RO" <?php if($pess_uf=='RO'){echo "selected='selected'";} ?>>RO</option>
				   					 <option value="RR" <?php if($pess_uf=='RR'){echo "selected='selected'";} ?>>RR</option>
						  			 <option value="RS" <?php if($pess_uf=='RS'){echo "selected='selected'";} ?>>RS</option>
						   			 <option value="SC" <?php if($pess_uf=='SC'){echo "selected='selected'";} ?>>SC</option>
						   			 <option value="SE" <?php if($pess_uf=='SE'){echo "selected='selected'";} ?>>SE</option>
				   					 <option value="SP" <?php if($pess_uf=='SP'){echo "selected='selected'";} ?>>SP</option>
						   			 <option value="TO" <?php if($pess_uf=='TO'){echo "selected='selected'";} ?>>TO</option>
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
           		 			<a href="listar_funcionarios.php"><img src="imagens/todos.gif" border='0px'/></a>
           				</div>
            	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           	



    	 				
