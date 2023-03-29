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

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
      <div id="principal">
      	<div id="ficha">
		<form name="form1" action='idoso_cadastrado.php' method='post'>
        	<!--<a href="home.php"><img src="imagens/home.gif" border='0px' /></a>-->	
        	<span class="tabela_1">
                	<span class="coluna_x3">	
						Ficha de cadastro de idoso
                    </span>
            	
  				    <span class="coluna_x2">
                       Nome:<small>*</small><br>
                   	   <input type='text' size="50%" name='idos_nome'>
                    </span>
            		<span class="coluna_x1">
                    	Data de Nascmento:<br>
				  		<input type="text" name="idos_data_nasc" size="23%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
                	</span>
                	<span class="coluna_x1">
						CPF:<br>
				 		 <input type='text'  name='idos_cpf' maxlength="14" size="25%" OnKeyPress="formatar(this, '###.###.###-##')">
					</span>
                
               
                	<span class="coluna_x2">
				  		Nome da Mãe:<small>*</small><br>
				  		<input type='text' size="50%" name='mae'>
                    </span>
					<span class="coluna_x2">Nome do Pai:<small>*</small>
                    	<br>
				  		<input type='text' size="50%" name='pai'>
               		</span>
                
               
					<span class="coluna_x1"><br>Tipo Sanguineo:
				  		<select name="idos_tipo_sanguineo">
                        	<option value=""></option>
                  			<option value="A+">A+</option>
                    		<option value="B+">B+</option>
                    		<option value="AB+">AB+</option>
                    		<option value="O+">O+</option>
                    		<option value="A-">A-</option>
                    		<option value="B-">B-</option>
                    		<option value="AB-">AB-</option>
                    		<option value="O-">O-</option>
				 		 </select>
                     </span>	  
					 <span class="coluna_x1">
                     	<br>Sexo:
						<select name='idos_sexo'>
 							<option value='m'>Masculino</option>
 							<option value='f'>Feminino</option>
						</select>
                     </span>
                     <span class="coluna_x2">
                		<br>Quantidade de Filhos:
                   		<select name="qtde_filhos">
                   		<?php 
							for($i=0;$i<21;$i++){
								echo "<option value='$i'>$i</option>";
							}
						?> 
				  		</select>
                     </span>
                     <span class="coluna_x1">
				  		 Profissão:<small>*</small><br>
				  		<input type='text'  name='profissao' size='23%' maxlength="11">
					 </span>
                	 <span class="coluna_x1">
				  		 Data de ingresso:<small>*</small><br>
				  		 <input type="text" name="ingresso" size="23%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
                     </span>
				
               
                	<span class="coluna_x1">
                    	Religião:<small>*</small><br>
						<input type='text' size="23%" name='religiao'>
                    </span>
					
                	<span class="coluna_x1">
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
				 	 	Endereço:<small>*</small><br>
				  		<input type='text' size="50%" name='idos_endereco'>
				 	 </span>
                	 <span class="coluna_x2">
                     	Bairro:<small>*</small><br>
				  		<input type='text' size="50%" name='idos_bairro'>
					 </span>
                
                 	<span class="coluna_x2">
				 		Cidade:<small>*</small><br>
				    	<input type='text' size="50%" name='idos_cidade'>
                    </span>
                    <span class="coluna_x1">
						CEP:<small>*</small><br>
				  		<input name='idos_cep' type='text' maxlength='9' OnKeyPress="formatar(this, '#####-###')">
					</span>
                   
                    <span class="coluna_x1">
                     	Valor de Contribuição:<br>
				  		<input type='text' size="25%" name='contribuicao'>	
                    </span>
                    <span class="coluna_x1">
				  		Pertences:<br>
				 	    <textarea name="pertences" rows="5" cols="20"></textarea>
                  	</span>
                    <span class="coluna_x1">
                        Nº Municipal do SUS:<br>
				 	 	<input type='text' size="23%" name='sus_municipal' maxlength="5">
                    </span>
                    <span class="coluna_x2">
                        Nº Nacional do SUS:<br>
				 	 	<input type='text' size="45%" name='sus_nacional' maxlength="18">
                  	</span>
                    
                    
           			<span class="radios">
           		   	    Côr:<small>*</small><br> 
               	    	<input type="radio"  name="cor" value="1">Branco(a)<br>
           	        	<input type="radio" name="cor" value="2">Preto(a)<br>
           	        	<input type="radio" name="cor" value="3">Indio(a)<br>
               	    	<input type="radio" name="cor" value="4">Pardo(a)<br>
                 	</span>
                 	<span class="radios">
						Estado Civil:<small>*</small><br> 
                		<input type="radio"  name="ecivil" value="1">Casado(a)<br>
                		<input type="radio" name="ecivil" value="2">Solteiro(a)<br>
                		<input type="radio" name="ecivil" value="3">Viuvo(a)<br>
                		<input type="radio" name="ecivil" value="4">Divorciado(a)<br>
				  	</span>
                  	<span class="radios">                
                		Grau de Instrução:<small>*</small><br> 
                	 	<input type="radio"  name="instrucao" value="1">Fundamental<br>
               	     	<input type="radio"  name="instrucao" value="2">Fundamental Incompleto<br>
                	 	<input type="radio" name="instrucao" value="3">Médio<br>
                     	<input type="radio" name="instrucao" value="4">Superior<br>
                    </span>
                   	
    			 	
          
                 </span>
              </span>
              <span class="tabela_2">
              	   <span class="coluna_x0">
                		Interno <br>Por Ordem Judicial:<small>*</small>
                   </span>
                   <span class="coluna_x0"> 
               		  	<br><input type="radio" name="judicial" value="1">Sim
           			 	<input type="radio" name="judicial" value="0">Não
                   </span>
                   <span class="coluna_x0">	
                   		Iterno por livre e<br> espontânea vontade:<small>*</small>
                   </span>
                   <span class="coluna_x0">
               		    <br><input type="radio" name="livre" value="1">Sim
            			<input type="radio" name="livre" value="0">Não
                   </span>
              	   <span class="coluna_x0">
                    	Batizado:<small>*</small>
                   </span>
                   <span class="coluna_x0">
           			  	<input type="radio" name="batizado" value="1">Sim
           		 	 	<input type="radio" name="batizado" value="0">Não
  				   </span>
                   <span class="coluna_x0">
                	  	Casamento Religioso:<small>*</small>
                   </span>
                   <span class="coluna_x0"> 
               		  	<input type="radio" name="casamento" value="1">Sim
           			  	<input type="radio" name="casamento" value="0">Não
                   </span>
                   <span class="coluna_x0">
          			  	Mantem Família:<small>*</small>
                   </span>
                   <span class="coluna_x0">
               		  	<input type="radio" name="familia" value="1">Sim
           			  	<input type="radio" name="familia" value="0">Não                   </span>
              	   <span class="coluna_x0">
                    	Possui bens:<small>*</small>
                   </span>
                   <span class="coluna_x0">    
           			  	<input type="radio" name="bens" value="1">Sim
           			  	<input type="radio" name="bens" value="0">Não
                   </span>
                   <span class="coluna_x0">
                	  	Eleitor:<small>*</small>
                   </span>
                   <span class="coluna_x0">
               		  	<input type="radio" name="eleitor" value="1">Sim
           			  	<input type="radio" name="eleitor" value="0">Não
   				   </span>
                   <span class="coluna_x3">
               	      Situação da Documentação
                   </span>
                   <span class="coluna_x0">
                      Apresentou Certidão<br> de Nascimento?<small>*</small>
                   </span>
                   <span class="coluna_x0">
               		  <br><input type="radio" name="regi_nascimento" value="1">Sim
            		  <input type="radio" name="regi_nascimento" value="0">Não
                   </span>
                   <span class="coluna_x0">
                      Certidão de Casamento:<small>*</small>
                   </span>
                   <span class="coluna_x0">  
               	      <input type="radio" name="regi_casamento" value="1">Sim
            		  <input type="radio" name="regi_casamento" value="0">Não 
                   </span>
                   <span class="coluna_x0">
                       Identidade:<small>*</small> 
                   </span>
                   <span class="coluna_x0">
               		   <input type="radio" name="docu_identidade" value="1">Sim
            		   <input type="radio" name="docu_identidade" value="0">Não 
                   </span>
                   <span class="coluna_x0">
                       Carteira de Trabalho:<small>*</small>
                   </span>
                       <span class="coluna_x0">
               				<input type="radio" name="cart_trabalho" value="1">Sim
            				<input type="radio" name="cart_trabalho" value="0">Não 
                      </span>
                      <span class="coluna_x0">
                        Titulo de Eleitor:<small>*</small> 
                      </span>
                      <span class="coluna_x0">
               		    <input type="radio" name="titulo" value="1">Sim
            			<input type="radio" name="titulo" value="0">Não 
       				  </span>
              		  <span class="coluna_x3">
           	   		  	  Situação dos Exames e Saude
                      </span>
                      
                      <span class="coluna_x0">
                        	Apresentou <br>Exame de PA?<small>*</small>
                      </span>
               		  <span class="coluna_x0">
                        	<br><input type="radio" name="exam_pa" value="1">Sim
            				<input type="radio" name="exam_pa" value="0">Não
                      </span>
                      <span class="coluna_x0">
                        	Possui <br>Doença Contagiosa:<small>*</small>
                      </span> 
                      <span class="coluna_x0"> 
               		    	<br><input type="radio" name="exam_contagioso" value="1">Sim
            				<input type="radio" name="exam_contagioso" value="0">Não 
                      </span>
                      <span class="coluna_x0">
                        	RX do torax:<small>*</small>
                      </span>
               		  <span class="coluna_x0">
                        	<input type="radio" name="exam_rx_torax" value="1">Sim
            				<input type="radio" name="exam_rx_torax" value="0">Não
                      </span>
                      <span class="coluna_x0">
                        	Emograma Completo:<small>*</small>
                      </span>
                      <span class="coluna_x0"> 
               		   		<input type="radio" name="exam_hemo_completo" value="1">Sim
            				<input type="radio" name="exam_hemo_completo" value="0">Não
                      </span>
                      <span class="coluna_x0"> 
                        	Ecocardiograma:<small>*</small>
               		  </span>
                      <span class="coluna_x0">
                        	<input type="radio" name="exam_ecg" value="1">Sim
            				<input type="radio" name="exam_ecg" value="0">Não 
                      </span>
                      <span class="coluna_x0">
                        	Soro Lues:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                        	<input type="radio" name="exam_soro_lues" value="1">Sim
            				<input type="radio" name="exam_soro_lues" value="0">Não
                      </span>
                      <span class="coluna_x0">
                        	Exame de Urina:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                        	<input type="radio" name="exam_urina" value="1">Sim
            				<input type="radio" name="exam_urina" value="0">Não
                      </span>
                      <span class="coluna_x0"> 
                       		Exame de Fezes:<small>*</small> 
               		  </span>
                      <span class="coluna_x0">
                        	<input type="radio" name="exam_fezes" value="1">Sim
            				<input type="radio" name="exam_fezes" value="0">Não 
                        </span>
                        <span class="coluna_x0">
                       		Receitas:<small>*</small> 
               		    </span>
                        <span class="coluna_x0">
                       		<input type="radio" name="exam_receitas" value="1">Sim
            				<input type="radio" name="exam_receitas" value="0">Não 
                        </span>
                        <span class="coluna_x0">
                       		Declaração Médica:<small>*</small>
                        </span> 
               		    <span class="coluna_x0">
                        	<input type="radio" name="exam_decl_medica" value="1">Sim
            				<input type="radio" name="exam_decl_medica" value="0">Não 
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
 							<?php include 'select_responsaveis.php'?> 
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
 						<?php include 'select_responsaveis_internacao.php'?> 
					</select>
                </span>
                <span class="coluna_x2">
					Nome:<small>*</small><br>
					<input type='text' size="50%" name='resp_nome'>
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
                    <img src="imagens/cadastrar.gif" border='0px' onclick="submeter()" style="cursor:pointer"/>
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
