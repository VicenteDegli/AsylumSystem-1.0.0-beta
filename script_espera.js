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
							alert("Preencher campo vazio.");
							return false;
					}
					return true;
				}	
			 	 	
				function check(){				
					if(validarString(document.form1.idos_nome.value) &&            
				    	 verificarData(document.form1.idos_data_nasc.value) &&         
						 validarCPF(document.form1.idos_cpf.value) &&                  		   	  
						 validarString(document.form1.idos_endereco.value) &&
						 validarString(document.form1.idos_bairro.value) &&
						 validarString(document.form1.idos_cidade.value) &&
						 validarString(document.form1.idos_cep.value) &&
						 validarString(document.form1.espe_pedinte.value) &&
						 validarString(document.form1.espe_tele_pedinte.value) &&
						 verificarData(document.form1.espe_data_pedido.value) &&
						 validarString(document.form1.espe_situacao.value) &&
						 validarString(document.form1.idos_endereco.value)){
					 		document.form1.submit();		 	
						}
				}
		   </script>
