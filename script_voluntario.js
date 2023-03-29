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
							alert("Favor entrar com a data de nascimento.");
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
						 	alert("Favor entrar com o CPF.");
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
				function validarNome(nome) {
					if(nome=="") {
						alert("Favor entrar com o nome.");
						return false;
					}
					
					return true;
				}
				
				function validarTelefone(telefone) {
					if(telefone=="") {
						alert("Favor entrar com o telefone.");
						return false;
					}
					return true;
				}
				
				function validarIdentidade(rg) {
					if(rg=="" || rg.length!=12) {
						alert("Favor entrar com o RG corretamente.");
						return false;
					}
					return true;
				}
				
				function validarEndereco(endereco){
					if(endereco=="") {
						alert("Favor entrar com o endereço.");
						return false;
					}
					return true;
				}
				
				function validarFuncao(funcao){
					if(funcao=="") {
						alert("Favor entrar com a funcao.");
						return false;
					}
					return true;
				}
				
				function validarComprometimento(comprometimento){
					if(comprometimento=="") {
						alert("Favor entrar com o comprometimento do voluntario.");
						return false;
					}
					return true;
				}
				
				function validarString(string){
					if(string=="") {
						alert("Preencha todos os campos!");
						return false;
					}
					return true;
				}
				
				function check(){				
					if(validarNome(document.form1.nome.value) && 
						verificarData(document.form1.data_nasc.value) && 
				     	validarCPF(document.form1.cpf.value) &&
						validarTelefone(document.form1.cola_telefone.value) &&
						validarIdentidade(document.form1.cola_identidade.value) &&
						validarFuncao(document.form1.cola_funcao.value) && 
						validarComprometimento(document.form1.volu_comprometimento.value) &&
						validarString(document.form1.func_endereco.value) &&
						validarString(document.form1.func_bairro.value) &&
						validarString(document.form1.func_cidade.value) &&
						validarString(document.form1.func_cep.value)){
							document.form1.submit();
					}
				}
</script>