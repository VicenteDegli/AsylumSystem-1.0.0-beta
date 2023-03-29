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
        <?php include 'script_eventos.js' ?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Editar Evento<br><br>
                </span>
                <div id="form_eventos">
       
    			<?php 
					include 'conexao.php';
					$even_id=$_GET['even_id'];
					$select=mysql_query("SELECT * FROM eventos WHERE even_id = '$even_id'");
					$registro=mysql_fetch_array($select);
					$even_id=$registro['even_id'];
  					$even_tipo=$registro['even_tipo'];
  					$even_data=$registro['even_data'];
  					$even_local=$registro['even_local'];	
					$even_data = implode("/",array_reverse(explode("-",$even_data)));
					mysql_close($conexao);
	   		 	?>
        			<form name="form1" action="evento_editado.php?even_id=<?php echo $even_id ?>" method="post">
                      
			 			<span class="auto">
             				Tipo:<br>
             				<input type='text' name='even_tipo' size="25%" value='<?php echo $even_tipo ?>'> 
                        </span>
                        <span class="auto">
            				Data:<br>
             				<input type="text" name="even_data" size="20%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value='<?php echo $even_data ?>'>
                        </span>
                        <span class="auto">
             				Local:<br>
             				<input type='text' name='even_local' size="25%" value='<?php echo $even_local ?>'>
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
           		 	<a href="listar_eventos.php"><img src="imagens/todos.gif" border='0px'/></a>
           		</div>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		 
           		