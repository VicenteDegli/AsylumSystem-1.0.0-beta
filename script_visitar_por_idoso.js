<script language='javascript'>
	function listarVisitasIdoso(idos_id){
		if(idos_id==''){
			alert('Selecione um idoso!');
		}
		else{
			window.location.href='listar_visitas_por_idoso.php?idos_id='+idos_id;
		}
	}
</script>