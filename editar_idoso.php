<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>
				alert('Você nã tem permissão para acessar esta página.');
				window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php include 'javascript.js'?>
	</head>

	<body>
     <img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
     <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>

     <div id="principal">
    	<?php 
			include 'conexao.php';
				
				$idos_id=$_GET['idos_id'];
				
				$select=mysql_query("SELECT * 
										FROM 
										    pessoas a,
											idosos b,
											exames c,
											documentos d,
											responsaveis e,
											idosos_responsaveis f,
											responsaveis_internacoes g
											
									    WHERE (a.pess_id = b.idos_pess_id) AND 
											  (c.exam_idoso_id = b.idos_id) AND
											  (d.docu_idoso_id = b.idos_id) AND			  										  
											  (b.idos_id = f.idos_resp_idos_id) AND
											  (f.idos_resp_resp_id = e.resp_id) AND
											  (b.idos_resp_inte_id = g.resp_inte_id) AND
											  (b.idos_id = '$idos_id')");	
				
					$registro=mysql_fetch_array($select);
										
					//Pegando dados de idoso na tabela pessoas. 
					$idos_nome=$registro['pess_nome'];
					$idos_cpf=$registro['pess_cpf'];
					$idos_data_nasc=$registro['pess_data_nasc'];
					$idos_sexo=$registro['pess_sexo'];
					$idos_endereco=$registro['pess_endereco'];
					$idos_bairro=$registro['pess_bairro'];
					$idos_cidade=$registro['pess_cidade'];
					$idos_cep=$registro['pess_cep'];
					$idos_uf=$registro['pess_uf'];
					
					//Pegando dados diretamente da tabela idoso.
					$idos_id=$registro['idos_id'];
  					$idos_pess_id=$registro['idos_pess_id'];
  					$idos_cor=$registro['idos_cor'];
  					$idos_grau_instrucao=$registro['idos_grau_instrucao'];
  					$idos_profissao=$registro['idos_profissao'];
 				   	$idos_mae=$registro['idos_mae'];
					$idos_pai=$registro['idos_pai']; 
  					$idos_data_ingresso=$registro['idos_data_ingresso'];
  					$idos_religiao=$registro['idos_religiao'];
  					$idos_batizado=$registro['idos_batizado'];
 				    $idos_estd_civil=$registro['idos_estd_civil'];
  					$idos_casm_relig=$registro['idos_casm_relig'];
  					$idos_mant_familia=$registro['idos_mant_familia'];
  					$idos_qtde_filhos=$registro['idos_qtde_filhos'];
  					$idos_tem_bens=$registro['idos_tem_bens'];
  					$idos_livre_espo_vontd=$registro['idos_livre_espo_vontd'];
  					$idos_pertences=$registro['idos_pertences'];
  					$idos_inter_ord_jud=$registro['idos_inter_ord_jud'];
  					$idos_eleitor=$registro['idos_eleitor'];
  					$idos_resp_inte_id=$registro['idos_resp_inte_id'];
  					$idos_valor_contribuicao=$registro['idos_valor_contribuicao'];
  					$idos_falecido=$registro['idos_falecido'];
  					$idos_reinc_familia=$registro['idos_reinc_familia'];
 				    $idos_ativo=$registro['idos_ativo'];
					$idos_tipo_sanguineo=$registro['idos_tipo_sanguineo'];	
					$idos_sus_municipal=$registro['idos_sus_municipal'];
					$idos_sus_nacional=$registro['idos_sus_nacional'];				
					$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
					$idos_data_ingresso = implode("/",array_reverse(explode("-",$idos_data_ingresso)));
									
					//Pegando dados de idoso na tabela exames
					$exam_id=$registro['exam_id'];
 				    $exam_rx_torax=$registro['exam_rx_torax'];
  					$exam_pa=$registro['exam_pa'];
 				    $exam_contagioso=$registro['exam_contagioso'];
  					$exam_hemo_completo=$registro['exam_hemo_completo'];
 				    $exam_ecg=$registro['exam_ecg'];
 				    $exam_soro_lues=$registro['exam_soro_lues'];
  					$exam_urina=$registro['exam_urina'];
  					$exam_fezes=$registro['exam_fezes'];
  					$exam_receitas=$registro['exam_receitas'];
  					$exam_decl_medica=$registro['exam_decl_medica'];
  					$exam_idoso_id=$registro['exam_idoso_id'];
					
					//Pegando id de responsáveis e reponsaveis pela internação, que serão necessarios para buscar seus respectivos dados que estão guardados na tabela pessoa.
					$resp_inte_id=$registro['resp_inte_id'];
					$resp_inte_pess_id=$registro['resp_inte_pess_id'];
					$select_resp_inte=mysql_query("SELECT * FROM  pessoas WHERE pess_id = '$resp_inte_pess_id'");
					$registro_resp_inte=mysql_fetch_array($select_resp_inte);
  					$resp_inte_nome=$registro_resp_inte['pess_nome'];
  					$resp_inte_data_nasc=$registro_resp_inte['pess_data_nasc'];
  					$resp_inte_cpf=$registro_resp_inte['pess_cpf'];
  					$resp_inte_sexo=$registro_resp_inte['pess_sexo'];
					$resp_inte_data_nasc = implode("/",array_reverse(explode("-",$resp_inte_data_nasc)));
					
					//Responsável pelo idoso
					$resp_id=$registro['resp_id'];
					$resp_pess_id=$registro['resp_pess_id'];
  					$resp_identidade=$registro['resp_identidade'];
  					$resp_telefone=$registro['resp_telefone'];
  					$resp_telefones=$registro['resp_telefones'];
					$select_resp=mysql_query("SELECT * FROM  pessoas WHERE pess_id = '$resp_pess_id'");
					$registro_resp=mysql_fetch_array($select_resp);
  					$resp_nome=$registro_resp['pess_nome'];
  					$resp_data_nasc=$registro_resp['pess_data_nasc'];
  					$resp_cpf=$registro_resp['pess_cpf'];
  					$resp_sexo=$registro_resp['pess_sexo'];
					$resp_endereco=$registro_resp['pess_endereco'];
					$resp_bairro=$registro_resp['pess_bairro'];
					$resp_cidade=$registro_resp['pess_cidade'];
					$resp_cep=$registro_resp['pess_cep'];
					$resp_uf=$registro_resp['pess_uf'];
					$resp_data_nasc = implode("/",array_reverse(explode("-",$resp_data_nasc)));
					
					//Pegando dados de idoso na tabela documentos
					 $docu_id=$registro['docu_id'];
				     $docu_regi_casamento=$registro['docu_regi_casamento'];
				     $docu_regi_nascimento=$registro['docu_regi_nascimento'];
 					 $docu_identidade=$registro['docu_identidade'];
  					 $docu_idoso_id=$registro['docu_idoso_id'];
 					 $docu_cart_trab=$registro['docu_cart_trab'];
 					 $docu_titulo=$registro['docu_titulo'];
					 
					 //Pegando dados da tabela idosos responsáveis
					 $idos_resp_id=$registro['idos_resp_id'];
	
					 //Pegando dados de idoso na tabela identidade, se foi cadastrado
					 if($docu_identidade==1){
						  $select_iden=mysql_query("SELECT * FROM  identidades WHERE iden_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_iden);
						  $iden_id=$registro['iden_id'];
  						  $iden_numero=$registro['iden_numero'];
  						  $iden_orgao=$registro['iden_orgao'];
 						  $iden_docu_id=$registro['iden_docu_id'];
					 }
					 
					 //Pegando dados de idoso na tabela carteiras, se foi cadastrado
					 if($docu_cart_trab==1){
						  $select_cart=mysql_query("SELECT * FROM  carteiras WHERE cart_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_cart);
						  $cart_id=$registro['cart_id'];
 						  $cart_numero=$registro['cart_numero'];
  						  $cart_serie=$registro['cart_serie'];
  						  $cart_docu_id=$registro['cart_docu_id'];
					 }
					 
					 //Pegando dados de idoso na tabela titulos, se foi cadastrado
					 if($docu_titulo==1){
						  $select_titu=mysql_query("SELECT * FROM  titulos WHERE titu_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_titu);
						  $titu_id=$registro['titu_id'];
  						  $titu_numero=$registro['titu_numero'];
 						  $titu_zona=$registro['titu_zona'];
						  $titu_secao=$registro['titu_secao'];
						  $titu_docu_id=$registro['titu_docu_id'];
					 }
			mysql_close($conexao);
			
	?>
    	<div id="ficha">
		<form name="form1" action="idoso_editado.php?idos_id=<?php echo $idos_id?>&amp;idos_pess_id=<?php echo $idos_pess_id?>&amp;resp_id=<?php echo $resp_id?>&amp;resp_inte_id=<?php echo $resp_inte_id?>&amp;resp_pess_id=<?php echo $resp_pess_id?>&amp;resp_inte_pess_id=<?php echo $resp_inte_pess_id?>&amp;idos_resp_id=<?php echo $idos_resp_id?>" method='post'>
        	<!--<a href="home.php"><img src="imagens/home.gif" border='0px' /></a>-->	
        	<span class="tabela_1">
                	<span class="coluna_x3">	
						Ficha de cadastro de idoso
                    </span>
            	
  				    <span class="coluna_x2">
                       Nome:<small>*</small><br>
                   	   <input type='text' size="50%" name='idos_nome' value="<?php echo $idos_nome ?>">
                    </span>
            		<span class="coluna_x1">
                    	Data de Nascmento:<small>*</small><br>
				  		<input type="text" name="idos_data_nasc" size="23%" value="<?php echo $idos_data_nasc ?>" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
                	</span>
                	<span class="coluna_x1">
						CPF:<small>*</small><br>
				 		 <input type='text'  name='idos_cpf' maxlength="14" value="<?php echo $idos_cpf?>" size="23%" OnKeyPress="formatar(this, '###.###.###-##')">
					</span>
                
               
                	<span class="coluna_x2">
				  		Nome da Mãe:<small>*</small><br>
				  		<input type='text' size="50%" name='mae' value="<?php echo $idos_mae ?>">
                    </span>
					<span class="coluna_x2">Nome do Pai:<small>*</small>
                    	<br>
				  		<input type='text' size="50%" name='pai' value="<?php echo $idos_pai ?>">
               		</span>
                
               
					<span class="coluna_x1"><br>Tipo Sanguineo:
				  		<select name="idos_tipo_sanguineo">
                          <option value=""></option>
                  		  <option value="A+" <?php if($idos_tipo_sanguineo=='A+'){echo "selected='selected'";} ?>>A+</option>
                    	  <option value="B+" <?php if($idos_tipo_sanguineo=='B+'){echo "selected='selected'";} ?>>B+</option>
                    	  <option value="AB+" <?php if($idos_tipo_sanguineo=='AB+'){echo "selected='selected'";} ?>>AB+</option>
                    	  <option value="O+" <?php if($idos_tipo_sanguineo=='O+'){echo "selected='selected'";} ?>>O+</option>
                    	  <option value="A-" <?php if($idos_tipo_sanguineo=='A-'){echo "selected='selected'";} ?>>A-</option>
                    	  <option value="B-" <?php if($idos_tipo_sanguineo=='B-'){echo "selected='selected'";} ?>>B-</option>
                    	  <option value="AB-" <?php if($idos_tipo_sanguineo=='AB-'){echo "selected='selected'";} ?>>AB-</option>
                    	  <option value="O-" <?php if($idos_tipo_sanguineo=='O-'){echo "selected='selected'";} ?>>O-</option>
				 		</select>
                     </span>	  
					 <span class="coluna_x1">
                     	<br>Sexo:
						<select name='idos_sexo'>
 							<option value='m' <?php if($idos_sexo=='m'){echo "selected='selected'";} ?>>Masculino</option>
 							<option value='f' <?php if($idos_sexo=='f'){echo "selected='selected'";} ?>>Feminino</option>
						</select>
                     </span>
                     <span class="coluna_x2">
                		<br>Quantidade de Filhos:
                   		<select name="qtde_filhos" >
                   		<?php 
							for($i=0;$i<21;$i++){
								echo "<option value='$i'"; if($idos_qtde_filhos==$i){echo "selected='selected'";} echo">$i</option>";
							}
						?> 
				  		</select>
                     </span>
                     <span class="coluna_x1">
				  		 Profissão:<small>*</small><br>
				  		<input type='text'  name='profissao' size='23%' maxlength="11" value="<?php echo $idos_profissao ?>">
					 </span>
                	 <span class="coluna_x1">
				  		 Data de ingresso:<small>*</small><br>
				  		 <input type="text" name="ingresso" size="23%" maxlength="10" value="<?php echo $idos_data_ingresso?>" OnKeyPress="formatar(this, '##/##/####')">
                     </span>
                	<span class="coluna_x1">
                    	Religião:<small>*</small><br>
						<input type='text' size="23%" name='religiao' value="<?php echo $idos_religiao ?>">
                    </span>
					
                	<span class="coluna_x1">
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
				 	 	Endereço:<small>*</small><br>
				  		<input type='text' size="50%" name='idos_endereco' value="<?php echo $idos_endereco ?>">
				 	 </span>
                	 <span class="coluna_x2">
                     	Bairro<small>*</small>:<br>
				  		<input type='text' size="50%" name='idos_bairro' value="<?php echo $idos_bairro ?>">
					 </span>
                
                 	<span class="coluna_x2">
				 		Cidade:<small>*</small><br>
				    	<input type='text' size="50%" name='idos_cidade' value="<?php echo $idos_cidade ?>">
                    </span>
                    <span class="coluna_x1">
						CEP:<small>*</small><br>
				  		<input name='idos_cep' type='text' maxlength='9' value="<?php echo $idos_cep ?>" OnKeyPress="formatar(this, '#####-###')">
					</span>
                   
                    <span class="coluna_x1">
                     	Valor de Contribuição:<br>
				  		<input type='text' size="23%" name='contribuicao' value="<?php echo $idos_valor_contribuicao ?>">	
                    </span>
                    <span class="coluna_x1">
				  		Pertences:<br>
				 	 <textarea name="pertences" rows="5" cols="20"><?php echo $idos_pertences?></textarea></td>
                  	</span>
                     <span class="coluna_x1">
                        Nº Municipal do SUS:<br>
				 	 	<input type='text' size="23%" name='sus_municipal' value="<?php echo $idos_sus_municipal?>" maxlength="5">
                    </span>
                    <span class="coluna_x2">
                        Nº Nacional do SUS:<br>
				 	 	<input type='text' size="45%" name='sus_nacional' value="<?php echo $idos_sus_nacional?>" maxlength="18">
                  	</span>
           			<span class="radios">
           		   	    Côr:<small>*</small><br> 
                        <input type="radio"  name="cor" value="1" <?php if($idos_cor==1){echo "checked='checked'";} ?>>Branco(a)<br>
           	        	<input type="radio" name="cor" value="2" <?php if($idos_cor==2){echo "checked='checked'";} ?>>Negro(a)<br>
           	        	<input type="radio" name="cor" value="3" <?php if($idos_cor==3){echo "checked='checked'";} ?>>Indio(a)<br>
               	    	<input type="radio" name="cor" value="4" <?php if($idos_cor==4){echo "checked='checked'";} ?>>Pardo(a)<br>
                 	</span>
                 	<span class="radios">
						Estado Civil:<small>*</small><br>
                        <input type="radio" name="ecivil" value="1" <?php if($idos_estd_civil==1){echo "checked='checked'";} ?>>Casado(a)<br>
                		<input type="radio" name="ecivil" value="2" <?php if($idos_estd_civil==2){echo "checked='checked'";} ?>>Solteiro(a)<br>
                		<input type="radio" name="ecivil" value="3" <?php if($idos_estd_civil==3){echo "checked='checked'";} ?>>Viuvo(a)<br>
                		<input type="radio" name="ecivil" value="4" <?php if($idos_estd_civil==4){echo "checked='checked'";} ?>>Divorciado(a)<br> 
				  	</span>
                  	<span class="radios">                
                		Grau de Instrução:<small>*</small><br>
                        <input type="radio" name="instrucao" value="1" <?php if($idos_grau_instrucao==1){echo "checked='checked'";} ?>>Fundamental<br>
               	     	<input type="radio" name="instrucao" value="2" <?php if($idos_grau_instrucao==2){echo "checked='checked'";} ?>>Fundamental Incompleto<br>
                	 	<input type="radio" name="instrucao" value="3" <?php if($idos_grau_instrucao==3){echo "checked='checked'";} ?>>Médio<br>
                     	<input type="radio" name="instrucao" value="4" <?php if($idos_grau_instrucao==4){echo "checked='checked'";} ?>>Superior<br> 
                    </span>
                 </span>
              </span>
              <span class="tabela_2">
              	   <span class="coluna_x0">
                		Interno <br>Por Ordem Judicial:<small>*</small>
                   </span>
                   <span class="coluna_x0"> 
                   		<br><input type="radio" name="judicial" value="1" <?php if($idos_inter_ord_jud==1){echo "checked='checked'";} ?>>Sim
           			  <input type="radio" name="judicial" value="0" <?php if($idos_inter_ord_jud==0){echo "checked='checked'";} ?>>Não
               		  	
                   </span>
                   <span class="coluna_x0">	
                   		Iterno por livre e<br> espontânea vontade:<small>*</small>
                   </span>
                   <span class="coluna_x0">
                   		<br><input type="radio" name="livre" value="1" <?php if($idos_livre_espo_vontd==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="livre" value="0" <?php if($idos_livre_espo_vontd==0){echo "checked='checked'";} ?>>Não
                   </span>
              	   <span class="coluna_x0">
                    	Batizado:<small>*</small>
                   </span>
                   <span class="coluna_x0">
                   		 <input type="radio" name="batizado" value="1" <?php if($idos_batizado==1){echo "checked='checked'";} ?>>Sim
           		 	  	<input type="radio" name="batizado" value="0" <?php if($idos_batizado==0){echo "checked='checked'";} ?>>Não
  				   </span>
                   <span class="coluna_x0">
                	  	Casamento Religioso:<small>*</small>
                   </span>
                   <span class="coluna_x0"> 
                   	  <input type="radio" name="casamento" value="1" <?php if($idos_casm_relig==1){echo "checked='checked'";} ?>>Sim
           			  <input type="radio" name="casamento" value="0" <?php if($idos_casm_relig==0){echo "checked='checked'";} ?>>Não
                   </span>
                   <span class="coluna_x0">
          			  	Mantem Família:<small>*</small>
                   </span>
                   <span class="coluna_x0">
                   		 <input type="radio" name="familia" value="1" <?php if($idos_mant_familia==1){echo "checked='checked'";} ?>>Sim
           			  <input type="radio" name="familia" value="0" <?php if($idos_mant_familia==0){echo "checked='checked'";} ?>>Não
                   </span>
              	   <span class="coluna_x0">
                    	Possui bens:<small>*</small>
                   </span>
                   <span class="coluna_x0"> 
                   	  <input type="radio" name="bens" value="1" <?php if($idos_tem_bens==1){echo "checked='checked'";} ?>>Sim
           			  <input type="radio" name="bens" value="0" <?php if($idos_tem_bens==0){echo "checked='checked'";} ?>>Não   
                   </span>
                   <span class="coluna_x0">
                	  	Eleitor:<small>*</small>
                   </span>
                   <span class="coluna_x0">
                   		<input type="radio" name="eleitor" value="1" <?php if($idos_eleitor==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="eleitor" value="0" <?php if($idos_eleitor==0){echo "checked='checked'";} ?>>Não 
   				   </span>
                   <span class="coluna_x3">
               	      Situação da Documentação
                   </span>
                   <span class="coluna_x0">
                      Apresentou Certidão<br> de Nascimento?<small>*</small>
                   </span>
                   <span class="coluna_x0">
                   		 <br><input type="radio" name="regi_nascimento" value="1" <?php if($docu_regi_nascimento==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="regi_nascimento" value="0" <?php if($docu_regi_nascimento==0){echo "checked='checked'";} ?>>Não
                   </span>
                   <span class="coluna_x0">
                      Certidão de Casamento:<small>*</small>
                   </span>
                   <span class="coluna_x0">  
                   		<input type="radio" name="regi_casamento" value="1" <?php if($docu_regi_casamento==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="regi_casamento" value="0" <?php if($docu_regi_casamento==0){echo "checked='checked'";} ?>>Não 
                   </span>
                   <span class="coluna_x0">
                       Identidade:<small>*</small> 
                   </span>
                   <span class="coluna_x0">
                   		 <input type="radio" name="docu_identidade" value="1" <?php if($docu_identidade==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="docu_identidade" value="0" <?php if($docu_identidade==0){echo "checked='checked'";} ?>>Não
                   </span>
                   <span class="coluna_x0">
                       Carteira de Trabalho:<small>*</small>
                   </span>
                       <span class="coluna_x0">
                       	  <input type="radio" name="cart_trabalho" value="1" <?php if($docu_cart_trab==1){echo "checked='checked'";} ?>>Sim
            			  <input type="radio" name="cart_trabalho" value="0" <?php if($docu_cart_trab==0){echo "checked='checked'";} ?>>Não 
                      </span>
                      <span class="coluna_x0">
                        Titulo de Eleitor:<small>*</small> 
                      </span>
                      <span class="coluna_x0">
                      	 <input type="radio" name="titulo" value="1" <?php if($docu_titulo==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="titulo" value="0" <?php if($docu_titulo==0){echo "checked='checked'";} ?>>Não 
       				  </span>
              		  <span class="coluna_x3">
           	   		  	  Situação dos Exames e Saude
                      </span>
                      
                      <span class="coluna_x0">
                        	Apresentou <br>Exame de PA?<small>*</small>
                      </span>
               		  <span class="coluna_x0">
                      		<br><input type="radio" name="exam_pa" value="1" <?php if($exam_pa==1){echo "checked='checked'";}?>>Sim
            				<input type="radio" name="exam_pa" value="0" <?php if($exam_pa==0){echo "checked='checked'";} ?>>Não
                      </span>
                      <span class="coluna_x0">
                        	Possui <br>Doença Contagiosa:<small>*</small>
                      </span> 
                      <span class="coluna_x0">
                      		<br><input type="radio" name="exam_contagioso" value="1" <?php if($exam_contagioso==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="exam_contagioso" value="0" <?php if($exam_contagioso==0){echo "checked='checked'";} ?>>Não  
                      </span>
                      <span class="coluna_x0">
                        	RX do torax:<small>*</small>
                      </span>
               		  <span class="coluna_x0">
                      	<input type="radio" name="exam_rx_torax" value="1" <?php if($exam_rx_torax==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="exam_rx_torax" value="0" <?php if($exam_rx_torax==0){echo "checked='checked'";} ?>>Não
                      </span>
                      <span class="coluna_x0">
                        	Emograma Completo:<small>*</small>
                      </span>
                      <span class="coluna_x0"> 
                      		<input type="radio" name="exam_hemo_completo" value="1" <?php if($exam_hemo_completo==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_hemo_completo" value="0" <?php if($exam_hemo_completo==0){echo "checked='checked'";} ?>>Não 
                      </span>
                      <span class="coluna_x0"> 
                        	Ecocardiograma:<small>*</small>
               		  </span>
                      <span class="coluna_x0">
                      		<input type="radio" name="exam_ecg" value="1" <?php if($exam_ecg==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_ecg" value="0" <?php if($exam_ecg==0){echo "checked='checked'";} ?>>Não 
                      </span>
                      <span class="coluna_x0">
                        	Soro Lues:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                      		<input type="radio" name="exam_soro_lues" value="1" <?php if($exam_soro_lues==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_soro_lues" value="0" <?php if($exam_soro_lues==0){echo "checked='checked'";} ?>>Não 
                      </span>
                      <span class="coluna_x0">
                        	Exame de Urina:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                      		<input type="radio" name="exam_urina" value="1" <?php if($exam_urina==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_urina" value="0" <?php if($exam_urina==0){echo "checked='checked'";} ?>>Não 
                      </span>
                      <span class="coluna_x0"> 
                       		Exame de Fezes:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                      		<input type="radio" name="exam_fezes" value="1" <?php if($exam_fezes==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_fezes" value="0" <?php if($exam_fezes==0){echo "checked='checked'";} ?>>Não 
                        </span>
                        <span class="coluna_x0">
                       		Receitas:<small>*</small> 
               		    </span>
                        <span class="coluna_x0">
                        	<input type="radio" name="exam_receitas" value="1" <?php if($exam_receitas==1){echo "checked='checked'";} ?>>Sim
            				<input type="radio" name="exam_receitas" value="0" <?php if($exam_receitas==0){echo "checked='checked'";} ?>>Não  
                        </span>
                        <span class="coluna_x0">
                       		Declaração Médica:<small>*</small>
                        </span> 
               		    <span class="coluna_x0">
                        	<input type="radio" name="exam_decl_medica" value="1" <?php if($exam_decl_medica==1){echo "checked='checked'";} ?>>Sim
            			<input type="radio" name="exam_decl_medica" value="0" <?php if($exam_decl_medica==0){echo "checked='checked'";} ?>>Não 
                        </span>
					</span>
                 <span class="tabela_3">
                 	<span class="coluna_x3">
	 			 		Responsável por Idoso
                    </span>
                    <span class="linha">
            			Obs: Selecione Responsável ou cadastre um novo.
                    </span>
                    <span class="coluna_x2">
               	    	Selecione Responsável:<br>
            			<select name='resp_id'>
                		<option value="">Novo...</option>
 							<?php include 'select_responsaveis_edit.php'?> 
						</select>
                    </span>
                    <span class="coluna_x2">
						Nome:<small>*</small><br>
						<input type='text' size="50%" name='resp1_nome'>
                    </span>
		            <span class="coluna_x1">
						Data de Nascmento:<br>
 		           		<input type="text" name="resp1_data_nasc" size="23%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
					</span>
                    <span class="coluna_x1">
						CPF:<small>*</small><br>
						<input type='text'  name='resp1_cpf' maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')" >
                    </span>
                    <span class="coluna_x1">
		            	RG:<br>
		            	<input type='text' name='resp1_rg' maxlength="12" OnKeyPress="formatar(this, '##.###.###-#')">
   			        </span>
                    <span class="coluna_x1">
						<br>Sexo:
						<select name='resp1_sexo'>
 							<option value='m'>Masculino</option>
 							<option value='f'>Feminino</option>
						</select>
      		        </span>
                    <span class="coluna_x2">
	    	        Endereço:<br>
		            <input type='text' size="50%" name='resp1_endereco'>
                    </span>
                    <span class="coluna_x2">
				  		Bairro:<br>
				  		<input type='text' size="50%" name='resp1_bairro'>
                  	</span>
                    <span class="coluna_x2">
				 		Cidade:<br>
				  		<input type='text' size="50%" name='resp1_cidade'>
                  	</span>
				 	<span class="coluna_x1">
				  		CEP:<br>
				  		<input type='text' size="23%" name='resp1_cep' maxlength="9" OnKeyPress="formatar(this, '#####-###')">
				  	</span>
                    <span class="coluna_x1">
		            	Telefone:<br>
 		           		<input type='text' name='resp1_tel' maxlength="12" OnKeyPress="formatar(this, '## ####-####')"> 
 		           	 </span>
                    
                    <span class="coluna_x1">
				  		<br>Estado:
				  		<select name='resp1_uf'>
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
		             <span class="coluna_x1">	
  		           		Telafones Adicionais:<br>
   		           		<input type='text' name='resp1_tel_ad' maxlength="12" OnKeyPress="formatar(this, '## ####-####')">
                     </span>
				</span>
            <span class="tabela_4">
            	<span class="coluna_x3">
                	Responsável Pela Internação
                </span>
            	<span class="linha">
                	Obs: Selecione Responsável ou cadastre um novo.
                </span>
				<span class="coluna_x2">
                	Selecione Responsável:<br>
            		<select name='resp_inte_id'>
                		<option value="">Novo...</option>
 						<?php include 'select_responsaveis_internacao_edit.php'?> 
					</select>
                </span>
                <span class="coluna_x2">
					Nome:<small>*</small><br>
					<input type='text' size="60px" name='resp_nome'>
            	</span>
				<span class="coluna_x1">
					Data de Nascmento:<br>
            		<input type="text" name="resp_data_nasc" size="23%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">					
				</span>
                <span class="coluna_x1">
					CPF:<small>*</small><br>
					<input type='text'  name='resp_cpf' size="23%" maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')">
            	</span>
				<span class="coluna_x1">
					<br>Sexo:
						<select name='resp_sexo'>
 							<option value='m'>Masculino</option>
 							<option value='f'>Feminino</option>
						</select>
                </span>
            </span> 
            <span class="ficha_linkis"> 
                    <img src="imagens/salvar.gif" border='0px' onclick="submeter()" style="cursor:pointer"/>
                    <img src="imagens/espaco.gif" width="4%" height="2%" />
                    <a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onclick="document.forms[0].reset()" /></a>
                    <img src="imagens/espaco.gif" width="4%" height="2%" />
                    <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    <img src="imagens/espaco.gif" width="4%" height="2%" />
                    <a href="#inicio"><img src="imagens/inicio.gif" border='0px'/></a>
            </span>
          </div>               		
	  </form>
    	  <div id="esquerda"></div>
     	  <div id="direita"></div>
          <div id="rodape"></div> 
     </div>  	
	</body>
</html>