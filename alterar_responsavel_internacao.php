<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!');
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
        <?php include 'script_resp_inte.js'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
					Editar Responsável por Internação<br><br>
                </span>
                <div id="ficha_in">
    				<?php
						include 'conexao.php';
						$resp_inte_id=$_GET['resp_inte_id'];
						$select=mysql_query("SELECT * FROM  pessoas a,responsaveis_internacoes b WHERE (a.pess_id = b.resp_inte_pess_id) AND (b.resp_inte_id = '$resp_inte_id')");
				
						$linha=mysql_fetch_array($select);
					    $pess_id=$linha["pess_id"];
						$pess_nome=$linha["pess_nome"];
						$pess_data_nasc=$linha["pess_data_nasc"];
						$pess_cpf=$linha["pess_cpf"];
						$pess_sexo=$linha["pess_sexo"];
						$pess_data_nasc=implode("/",array_reverse(explode("-",$pess_data_nasc)));	
						mysql_close($conexao);			
					?>

    			 	<form name="form1" action='responsavel_internacao_alterado.php?pess_id=<?php echo $pess_id?>' method='post'>
						<span class="auto">
							Nome:<small>*</small><br>
							<input type='text' size="45%" name='nome' value="<?php echo $pess_nome?>">
                        </span>               
						<span class="auto">
							Data de Nascmento:<br>
                            <input type="text" name="data_nasc" value="<?php echo $pess_data_nasc?>" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">
						</span>				
						<span class="auto">
							CPF:<small>*</small><br>
							<input type='text'  name='cpf' value="<?php echo $pess_cpf?>" maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')">
                        </span>   
						<span class="auto">
							<br>Sexo:
							<select name='sexo'>
 								<option value='m' <?php if($pess_sexo=='m'){echo "selected='selected'";}?>>Masculino</option>
 								<option value='f' <?php if($pess_sexo=='f'){echo "selected='selected'";}?>>Feminino</option>
							</select> 
                        </span>
            	   </form> 
            	   </div>
           		   <div id="linkis_fixos">
           		 		<img src='imagens/cadastrar.gif' border='0px' onclick="check()" style="cursor:pointer"/></a>
                        <img src="imagens/espaco.gif" width="4%" height="2%" />
       		 			<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
       		 			<img src="imagens/espaco.gif" width="4%" height="2%" />
                        <a href="listar_responsaveis_internacao.php"><img src="imagens/todos.gif" border='0px'/></a>   
                        
      			   </div>
              </div>
           	  <div id="esquerda"></div>
     		  <div id="direita"></div>
        	  <div id="rodape"></div> 
        </div>	
	</body>
</html>           	

