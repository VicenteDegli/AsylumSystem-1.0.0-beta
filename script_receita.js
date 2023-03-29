<script language="JavaScript">
	//Verifica se os campos foram preenchhidos corretamente
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
	
	
				function validarString(string) {		
					if(string=="") {
							alert("Campo Médico é obrigtório");
							return false;
					}
					return true;
				}
		
				function validarIdoso(string) {		
					if(string=="") {
							alert("Selecione o Idoso!");
							return false;
					}
					return true;
				}
				 	
				function check(){				
					if(validarString(document.form1.rece_medico.value) &&
					   verificarData(document.form1.rece_data.value) && 
					   validarIdoso(document.form1.idos_id.value)){
					 		document.form1.submit();		 	
					}
					return false;
				}
				
				function check1(){				
					if(validarString(document.form1.rece_medico.value) &&
					   verificarData(document.form1.rece_data.value)){
					 		document.form1.submit();		 	
					}
					return false;
				}
</script>