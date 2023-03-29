<script language="javascript">
	function editar(){
		var idos_id=document.form1.idos_id.value;
		if(idos_id==''){
			alert('Selecione um Idoso!');
		}
		else{
			window.location.href='editar_idoso.php?idos_id='+idos_id;
		}
	}
	function excluir(){
		var idos_id=document.form1.idos_id.value;
		if(idos_id==''){
			alert('Selecione um Idoso!');
		}
		else{
			confirm('Essa ação excluirá permanentemente este idoso e todos os dados relacionados a ele da base de dados. Você confirma esta ação?');
			window.location.href='excluir_idoso.php?idos_id='+idos_id;
		}
	}
	function ficha(){
		var idos_id=document.form1.idos_id.value;
		if(idos_id==''){
			alert('Selecione um Idoso!');
		}
		else{
			window.open('ficha_idoso_pdf.php?idos_id='+idos_id,'_blank')
		}
	}
	function listarReceitas(){
		var idos_id=document.form1.idos_id.value;
		if(idos_id==''){
			alert('Selecione um Idoso!');
		}
		else{
			window.location.href='listar_medicamentos_por_idoso.php?idos_id='+idos_id+'&rece_id=';
		}
	}
</script>