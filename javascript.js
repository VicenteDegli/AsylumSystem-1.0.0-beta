        <script language="JavaScript">
				/* Formatação para qualquer mascara */
				function formatar(src, mask){
					var i = src.value.length;
					var saida = mask.substring(0,1);
					var texto = mask.substring(i);
					if (texto.substring(0,1) != saida){
						src.value += texto.substring(0,1);
					}
				}

				    /* Valida Data */
					function verificarData(data){
						if(data==""){
								alert("Favor entrar com a data de vazio.");
								return false;
						}
						if(data.length!=10){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa.");
							return false;
						}
						
						var dia=data.substring(0,2);
						var mes=data.substring(3,5);
						var ano=data.substring(6,10);
						var data_atual=new Date();
						var ano_atual=data_atual.getFullYear();
						var mes_atual=data_atual.getMonth()+1;
						var dia_atual=data_atual.getDate();
						
						if(mes>12){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa. Obs: verifique mês!");
							return false;
						}
						if(dia>31){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa. Obs: verifique o dia!");
							return false;
						}
						if((dia>30 && mes==04) || (dia>30 && mes==06) || (dia>30 && mes==09) || (dia>30 && mes==11)){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa. Obs: verifique o dia");
							return false;
						}
						if(dia>29 && mes==02){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa. Obs: verifique o dia");
							return false;
						}
						if((ano>ano_atual) || (ano==ano_atual && mes>mes_atual) || (ano==ano_atual && mes==mes_atual && dia>dia_atual)){
							alert("Data invalida, favor emtra com o formato correto dd/mm/aaaa. Obs: não pode ser uma data futura!");
							return false;
						}
						return true;
					}
					
					
						

				function validarCPF(cpf) {
   						 cpf = cpf.replace(/[^\d]+/g,'');
   						 if(cpf == ''){
						 		alert("Favor preencher campo CPF vazio.");
						 		return false;
						 }
   						 // Elimina CPFs invalidos conhecidos
   						 if (cpf.length != 11 || 
       					 	 cpf == "00000000000" || 
       						 cpf == "11111111111" || 
        					 cpf == "22222222222" || 
       						 cpf == "33333333333" || 
       						 cpf == "44444444444" || 						
							 cpf == "55555555555" || 
        					 cpf == "66666666666" || 
        					 cpf == "77777777777" || 
        					 cpf == "88888888888" || 
        					 cpf == "99999999999"){	
							 		alert("CPF invalido.");						
        							return false;
     					 }
    						// Valida 1o digito
    						add = 0;
    						for (i=0; i < 9; i ++){
       							 add += parseInt(cpf.charAt(i)) * (10 - i);
						    }
    						rev = 11 - (add % 11);
    						if (rev == 10 || rev == 11){
       							 rev = 0;
							}
    						if (rev != parseInt(cpf.charAt(9))){
								 alert("CPF invalido.");	
       							 return false;
     						}
    						// Valida 2o digito
   							add = 0;
    						for (i = 0; i < 10; i ++){
       					    	add += parseInt(cpf.charAt(i)) * (11 - i);
							}
    						rev = 11 - (add % 11);
    						if (rev == 10 || rev == 11){
        						rev = 0;
							}
    						if (rev != parseInt(cpf.charAt(10))){
								alert("CPF invalido.");	
        						return false;
							}
   						    return true;
					}		
				//Verifica se os campos foram preenchhidos corretamente
				function validarString(string) {		
					if(string=="") {
							alert("Campo Texto Obrigatório Não Preenchido!");
							return false;
					}
					return true;
				}
				
				function validarRadio(ctrl){			
    				for(i=0;i<ctrl.length;i++){
        				if(ctrl[i].checked){ 
							return true;
						}
					}
					alert("Campo Multipla Escolha Obrigatório Não Selecionado!");
					return false;
				}
			
   				/**/	
		
				function validarResponsavelInternacao(resp_id,resp_nome){			
					if(resp_id=="" && resp_nome==""){
						alert("Selecione um responsável pela inernação ou selecione na lista");
						return false;
					}
					if(resp_id!="" && resp_nome!=""){
						alert("Escolha apenas um responsável.");
						return false;
					}
					if(resp_nome!=""){
						if( validarString(document.form1.resp_nome.value) &&                
					 		 validarCPF(document.form1.resp_cpf.value)){
							 return true;
					    }
						else{
							return false;
						}
					}
					return true;
				}
				
				
				function validarResponsavel(resp_id,resp_nome){		
					if(resp_id=="" && resp_nome==""){
						alert("Selecione um responsável pelo idoso ou cadastre um novo.");
						return false;
					}
					if(resp_id!="" && resp_nome!=""){
						alert("Escolha apenas um responsável pelo idoso.");
						return false;
					}
					if(resp_nome!=""){
						if(validarString(document.form1.resp1_nome.value) && 
						validarCPF(document.form1.resp1_cpf.value)){
							return true;
						}
						else{	
							return false;
						}
					}
					return true;
				}
					 	 	
				function check(){				
					if(validarString(document.form1.idos_nome.value)  &&            
				    	 /*verificarData(document.form1.idos_data_nasc.value) &&         
						 validarCPF(document.form1.idos_cpf.value) &&*/                 
						 validarString(document.form1.profissao.value) && 		   	  
						 validarString(document.form1.mae.value) && 				
						 validarString(document.form1.pai.value) && 				
						 verificarData(document.form1.ingresso.value) && 
						 validarString(document.form1.religiao.value) && 
						 validarString(document.form1.qtde_filhos.value) &&
						 validarString(document.form1.idos_endereco.value) &&
						 validarString(document.form1.idos_bairro.value) &&
						 validarString(document.form1.idos_cidade.value) &&
						 validarString(document.form1.idos_cep.value) &&
						 validarRadio(document.form1.cor) &&
						 validarRadio(document.form1.ecivil) &&
						 validarRadio(document.form1.instrucao) &&
						 validarRadio(document.form1.batizado) &&
						 validarRadio(document.form1.casamento) &&
						 validarRadio(document.form1.familia) &&
						 validarRadio(document.form1.bens) &&
						 validarRadio(document.form1.judicial) &&
						 validarRadio(document.form1.eleitor) &&
						 validarRadio(document.form1.livre) && 
						 validarRadio(document.form1.regi_nascimento) &&
						 validarRadio(document.form1.regi_casamento) &&
						 validarRadio(document.form1.docu_identidade) &&
						 validarRadio(document.form1.cart_trabalho) &&
						 validarRadio(document.form1.titulo) &&
						 validarRadio(document.form1.exam_rx_torax) &&
						 validarRadio(document.form1.exam_pa) &&
						 validarRadio(document.form1.exam_contagioso) &&
						 validarRadio(document.form1.exam_hemo_completo) &&
						 validarRadio(document.form1.exam_ecg) &&
						 validarRadio(document.form1.exam_soro_lues) &&
						 validarRadio(document.form1.exam_urina) &&
						 validarRadio(document.form1.exam_fezes) &&
						 validarRadio(document.form1.exam_receitas) &&
						 validarRadio(document.form1.exam_decl_medica)){
					 		return true;		 	
						}
						return false;
				}
				
				function submeter(){
						if(check() && validarResponsavel(document.form1.resp_id.value,document.form1.resp1_nome.value) && 
						validarResponsavelInternacao(document.form1.resp_inte_id.value,document.form1.resp_nome.value)){
							document.form1.submit();		
						} 
				}
		   </script>
