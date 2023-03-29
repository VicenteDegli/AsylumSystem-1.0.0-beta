<script language='javascript'>
	function listarAtendimentosIdoso(idos_id){
		if(idos_id==''){
			alert('Selecione um idoso!');
		}
		else{
			window.location.href='listar_atendimentos_por_idoso.php?idos_id='+idos_id;
		}
	}
</script>