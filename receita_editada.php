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
        <?php include 'script_receita.js'; ?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
    			<?php
				 include 'conexao.php';
				 $rece_id=$_GET['rece_id'];
				 $rece_medico=$_POST['rece_medico'];
				 $rece_data=$_POST['rece_data'];
				 $qtde=$_POST['qtde'];
				 $rece_data = implode("-",array_reverse(explode("/",$rece_data)));

				 $update_rece=mysql_query("UPDATE receitas SET rece_medico='$rece_medico',rece_data='$rece_data' WHERE rece_id='$rece_id'") or die (mysql_error()); 
				
				 if($update_rece){
					 echo"<script>alert('Sucesso ao atualizar receita!'); 
					 </script>";
					 if($qtde==0){
					 	 echo"<script>
						 	window.location.href='listar_medicamentos_por_idoso.php?rece_id=$rece_id&idos_id='; 
					 	</script>";
					 }
					 else{
						echo "<span class='ficha_titulos'>
							Cadastrar Medicamentos<br><br>
                		</span>";
						echo "<div id='form_receita'>
    						<form name='form1' action='cadastrar_medicamento_validados.php?qtde=$qtde&amp;rece_id=$rece_id' method='post'>
							<input type='hidden' name='qtde' value='$qtde'>";
							for($i=1;$i<=$qtde;$i++){
			 					echo "<span class='auto'>
									Nome*:
									<input type='text' name='medc_nome_$i'> 
								</span>
								<span class='auto'>
									Horário:
									<input type='text' name='medc_horario_$i'>
								</span>";
							}	
                		echo "</div>";
					 }
				 }
				 else{
					 echo "<script>alert('Erro ao atualizar receita!');</script>
					 		window.history,go(-1);";
				 }
			 mysql_close($conexao);
			 
	    ?>
					<span class="ficha_linkis">
                    		 <input type="image" value="Cadastrar" src="imagens/cadastrar.gif">
                	</form>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="listar_usuario.php"><img src="imagens/todos.gif" border='0px'/></a>
                    </span>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
	</body>
</html>






