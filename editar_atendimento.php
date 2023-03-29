<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para acessar esta página!');
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
        <?php 
			include 'script_atendimento.js'; 
			include 'conexao.php';
		?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Atendimento<br><br>
                </span>
                	<div id="ficha_documantos">
                    	<?php
							include 'conexao.php';
			   					$aten_id=$_GET['aten_id'];
			   					$idos_atual_id=$_GET['idos_id'];
    	       					$select_aten=mysql_query("SELECT * FROM atendimentos WHERE aten_id = '$aten_id'");
			  					$registro=mysql_fetch_array($select_aten);
								$aten_id=$registro['aten_id'];
								$aten_tipo=$registro['aten_tipo'];
								$aten_prof_nome=$registro['aten_prof_nome'];
								$aten_data=$registro['aten_data'];
								$aten_procedimento=$registro['aten_procedimento'];
								$aten_data = implode("/",array_reverse(explode("-",$aten_data)));
							mysql_close($conexao);
						?>
    					<form name="form1" action="atendimento_editado.php?aten_id=<?php echo $aten_id?>" method="post">
                        	<span class="auto">
             					Idoso:<br>
             					<select name="idos_id">
             						<?php include 'select_idoso_atendimento.php' ?>
            					</select>
                            </span>
                            <span class="auto">
			 					Data:<br>
             					<input type="text" name="aten_data" size="18%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php echo $aten_data?>">
                            </span>
                            <span class="auto">
			 					Profissional:<br>
			 					<input type='text' name='aten_prof_nome' size="51%" value='<?php echo $aten_prof_nome?>'>
                            </span>
                            <span class="auto">
            					 Atendimento:<br>
             					<input type='text' name='aten_tipo' size="20%" value='<?php echo $aten_tipo?>'>
                            </span>
                            <span class="auto">
			 					Procedimento:<br>
			 					<textarea name='aten_procedimento' rows="2" cols="20"><?php echo $aten_procedimento?></textarea>
                            </span>
                        </form>
					</div>
					<div id="linkis_fixos">
       					<img src="imagens/cadastrar.gif" border='0px' onClick="check()" style="cursor:pointer"/>
           				<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 		<a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
           		 		<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 		<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 		<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 		<a href="listar_atendimentos.php"><img src="imagens/todos.gif" border='0px'/></a>
           			</div>
            	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		
                		
