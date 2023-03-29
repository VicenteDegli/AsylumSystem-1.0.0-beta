<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Usuário incluido com sucesso!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Medicamentos<br><br>
                </span>
                <div id="form_receita">
    	<?php
			 include 'conexao.php';
				 $qtde=$_GET['qtde'];
				 $rece_id=$_GET['rece_id'];

   				 $flag=true;	
				 for($i=1;$i<=$qtde;$i++){
					 $medc_nome=$_POST['medc_nome_'.$i];
					 if($medc_nome==''){
						 $flag=false;
						 break;
					 }
				 }
				 if($flag){
					 $aux=true;
					 for($i=1;$i<=$qtde;$i++){
						 $medc_nome=$_POST['medc_nome_'.$i];
						 $medc_horario=$_POST['medc_horario_'.$i];
						 $insert=mysql_query("INSERT INTO medicamentos (medc_rece_id,medc_nome,medc_horario,medc_ativo) VALUES ('$rece_id','$medc_nome','$medc_horario','1')") or die (mysql_error()); 
						 if(!$insert){
							 $aux=false;
						 }
					 } 
					 if($aux){
					    echo"<script>alert('Sucesso ao inserir Medicamentos!');
							  window.location.href='listar_medicamentos_por_idoso.php?rece_id=$rece_id&idos_id='</script>";
					 }
					 else{
						echo"<script>alert('Erro ao inserir Medicamentos!');</script>";
					 }
				 }	
				 else{
					 echo"<form name='form1' action='cadastrar_medicamento_validados.php?qtde=$qtde&amp;rece_id=$rece_id' method='post'>";
					 for($i=1;$i<=$qtde;$i++){
						 $medc_nome=$_POST['medc_nome_'.$i];
						 $medc_horario=$_POST['medc_horario_'.$i];
						 if($medc_nome==''){
						    echo "<span class='auto'>
						    	<font color='red'>Nome*:</font>	
								<input type='text' name='medc_nome_$i'> 
							</span>
							<span class='auto'>
								Horário:
								<input type='text' name='medc_horario_$i' value='$medc_horario'>
							</span>
						 </center>";
						 }
						 else{
							echo "<span class='auto'>
								Nome*:
								<input type='text' name='medc_nome_$i'> 
							</span>
							<span class='auto'>
								Horário:
								<input type='text' name='medc_horario_$i'>
							</span>
						 </center>";
						 }
						
					 }	 
				}		
			
			 mysql_close($conexao);		 
	    ?> 
           </div>
                <span class="ficha_linkis">
             				 <input type="image" value="Cadastrar" src="imagens/cadastrar.gif">
                	</form>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    		 
                </span>
            </div> 
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>






