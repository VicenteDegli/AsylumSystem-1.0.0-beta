<script language="javascript">
	function validarString(string) {		
		if(string=="") {
			alert("Preencher campo vazio.");
			return false;
		}
		return true;
	}
	function check(){
		if(validarString(document.form1.usua_nome.value) &&
		   validarString(document.form1.usua_login.value) &&
		   validarString(document.form1.usua_senha.value) &&
		   validarString(document.form1.usua_nivel.value)){
		   		document.form1.submit();
		}
	}
</script>