<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!!');
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
            <?php
                include 'conexao.php';
				$pess_id=$_GET['pess_id'];
				$espe_id=$_GET['espe_id'];
				//Consulta sql
        		$select=mysql_query("SELECT * FROM pessoas a,esperas b WHERE (a.pess_id = b.espe_pess_id) AND (b.espe_id = '$espe_id')");
				$linha=mysql_fetch_array($select);
					$pess_nome=$linha["pess_nome"];
					$pess_data_nasc=$linha["pess_data_nasc"];
					$pess_cpf=$linha["pess_cpf"];
					$pess_sexo=$linha["pess_sexo"];	
					$pess_endereco=$linha['pess_endereco'];
					$pess_cidade=$linha['pess_cidade'];	
					$pess_bairro=$linha['pess_bairro'];	
					$pess_cep=$linha['pess_cep'];	
					$idos_uf=$linha['pess_uf'];		
					$pess_data_nasc = implode("/",array_reverse(explode("-",$pess_data_nasc)));
  					$espe_situacao=$linha['espe_situacao'];
  					$espe_pedinte=$linha['espe_pedinte'];
  					$espe_tele_pedinte=$linha['espe_tele_pedinte'];
  					$espe_data_pedido=$linha['espe_data_pedido'];
  					$espe_anal_prioridade=$linha['espe_anal_prioridade'];
  					$espe_nive_prioridade=$linha['espe_nive_prioridade'];
					$espe_data_pedido = implode("/",array_reverse(explode("-",$espe_data_pedido)));
				mysql_close($conexao); 
			?>

                	
							<form name="form1" action='espera_editada.php?pess_id=<?php echo $pess_id?>&amp;espe_id=<?php echo $espe_id?>' method='post'>
                            	<span class="coluna_x2">
				  					Nome:<br>
  				  					<input type='text' size="50%" name='idos_nome' value="<?php echo $pess_nome ?>">
                                </span>
				  				<span class="coluna_x1">
				 					 Data de Nascmento:<br>
				 					 <input type="text" name="idos_data_nasc" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $pess_data_nasc ?>">	
                                </span>				
				  				<span class="coluna_x1">
				 					 CPF:<br>
				  					<input type='text' size="20%" name='idos_cpf' maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')" value="<?php echo $pess_cpf ?>">
                                </span>
                                <span class="coluna_x1">
		    	 					<br>Sexo:
                                    <select name="idos_sexo">
               	  						<option value="m" <?php if($pess_sexo=='m'){echo "selected='selected'";}?>>Masculino</option>
           		  						<option value="f" <?php if($pess_sexo=='f'){echo "selected='selected'";}?>>Feminino</option>
                                    </select>
                                </span>
                                <span class="coluna_x1">
				  					Data do Pedido:<br>
				  					<input type="text" name="espe_data_pedido" size="19%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $espe_data_pedido ?>">
                                </span>
                                <span class="coluna_x1">
                  					Situação do Idoso:<br>
                  					<input type="text" name="espe_situacao" value="<?php echo $espe_situacao ?>">
                                </span>
                                <span class="coluna_x1">
                  					<br>Nivel de Prioridade:
                  					<select name="espe_nive_prioridade">
                                    	<option value="1" <?php if($espe_nive_prioridade==1){echo "selected='selected'";}?>>Máxima</option>
                       					<option value="2" <?php if($espe_nive_prioridade==2){echo "selected='selected'";}?>>Média</option>
                        				<option value="3" <?php if($espe_nive_prioridade==3){echo "selected='selected'";}?>>Mínima</option>
                  					</select>
                                </span>
				  				<span class="coluna_x2">
				 					Endereço:<br>
				  					<input type='text' size="50%" name='idos_endereco' value="<?php echo $pess_endereco ?>">
                                </span>
				  				<span class="coluna_x2">
				  					Bairro:<br>
				  					<input type='text' size="50%" name='idos_bairro' value="<?php echo $pess_bairro ?>">
                                </span>
				  				<span class="coluna_x2">
				  					Cidade:<br>
				  					<input type='text' size="50%" name='idos_cidade' value="<?php echo $pess_cidade ?>">
                                </span>
				  				<span class="coluna_x1">
				  					CEP:<br>
				  					<input name='idos_cep' type='text' maxlength='9' size="20%" OnKeyPress="formatar(this, '#####-###')" value="<?php echo $pess_cep ?>">
                                </span>
				  				<span class="coluna_x0">
				  					<br>Estado:
				 					<select name='idos_uf'>
				    					<option value="AC" <?php if($idos_uf=='AC'){echo "selected='selected'";} ?>>AC</option>
									    <option value="AL" <?php if($idos_uf=='AL'){echo "selected='selected'";} ?>>AL</option>
				    					<option value="AM" <?php if($idos_uf=='AM'){echo "selected='selected'";} ?>>AM</option>
				   						<option value="AP" <?php if($idos_uf=='AP'){echo "selected='selected'";} ?>>AP</option>
				    					<option value="BA" <?php if($idos_uf=='BA'){echo "selected='selected'";} ?>>BA</option>
				    					<option value="CE" <?php if($idos_uf=='CE'){echo "selected='selected'";} ?>>CE</option>
				    					<option value="DF" <?php if($idos_uf=='DF'){echo "selected='selected'";} ?>>DF</option>
				    					<option value="ES" <?php if($idos_uf=='ES'){echo "selected='selected'";} ?>>ES</option>
				    					<option value="GO" <?php if($idos_uf=='GO'){echo "selected='selected'";} ?>>GO</option>
				    					<option value="MA" <?php if($idos_uf=='MA'){echo "selected='selected'";} ?>>MA</option>
				    					<option value="MG" <?php if($idos_uf=='MG'){echo "selected='selected'";} ?>>MG</option>
				    					<option value="MS" <?php if($idos_uf=='MS'){echo "selected='selected'";} ?>>MS</option>
				    					<option value="MT" <?php if($idos_uf=='MT'){echo "selected='selected'";} ?>>MT</option>
				    					<option value="PA" <?php if($idos_uf=='PA'){echo "selected='selected'";} ?>>PA</option>
				    					<option value="PB" <?php if($idos_uf=='PB'){echo "selected='selected'";} ?>>PB</option>
				    					<option value="PE" <?php if($idos_uf=='PE'){echo "selected='selected'";} ?>>PE</option>
				    					<option value="PI" <?php if($idos_uf=='PI'){echo "selected='selected'";} ?>>PI</option>
				    					<option value="PR" <?php if($idos_uf=='PR'){echo "selected='selected'";} ?>>PR</option>
				    					<option value="RJ" <?php if($idos_uf=='RJ'){echo "selected='selected'";} ?>>RJ</option>
				    					<option value="RN" <?php if($idos_uf=='RN'){echo "selected='selected'";} ?>>RN</option>
				    					<option value="RO" <?php if($idos_uf=='RO'){echo "selected='selected'";} ?>>RO</option>
				    					<option value="RR" <?php if($idos_uf=='RR'){echo "selected='selected'";} ?>>RR</option>
				    					<option value="RS" <?php if($idos_uf=='RS'){echo "selected='selected'";} ?>>RS</option>
				    					<option value="SC" <?php if($idos_uf=='SC'){echo "selected='selected'";} ?>>SC</option>
				    					<option value="SE" <?php if($idos_uf=='SE'){echo "selected='selected'";} ?>>SE</option>
				    					<option value="SP" <?php if($idos_uf=='SP'){echo "selected='selected'";} ?>>SP</option>
				    					<option value="TO" <?php if($idos_uf=='TO'){echo "selected='selected'";} ?>>TO</option>
			      					</select>
                                </span>
                                <span class="coluna_x2">
                  					Nome do Pedinte:<br>
                  					<input type="text" name="espe_pedinte" size="50%" value="<?php echo $espe_pedinte ?>">
                                </span>
                                <span class="coluna_x1">
                  					Telefone do Pedinte:<br>
                  					<input type="text" name="espe_tele_pedinte" value="<?php echo $espe_tele_pedinte ?>">
                                </span>
                  				
                  				<span class="coluna_x1">
                  					Análize de Prioridade:<br>
				  					<textarea name="espe_anal_prioridade" rows="2" cols="20"><?php echo $espe_anal_prioridade?></textarea>
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
           		
 
				 