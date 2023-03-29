<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <?php include 'conexao.php'; ?>
        
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
        	<div id="ficha">
            	<span class="ficha_titulos">
						Editar Medicamento<br><br>
                </span>
    	<?php
			include 'conexao.php';
			  $medc_id=$_GET['medc_id'];
    	      $select=mysql_query("SELECT * FROM medicamentos WHERE medc_id='$medc_id'");
			  $registro=mysql_fetch_array($select);
					$medc_id=$registro['medc_id'];
					$medc_nome=$registro['medc_nome'];
					$medc_horario=$registro['medc_horario'];
		?>
        		<div id="form_receita">
    	 			<form name="form1" action="medicamento_editado.php?medc_id=<?php echo $medc_id ?>" method="post">
					Nome*:	
					<input type='text' name='medc_nome' value='<?php echo $medc_nome ?>'> 
					Horário:
					<input type='text' name='medc_horario' value='<?php echo $medc_horario ?>'>
              	</div>	
         	
                    <span class="ficha_linkis">
                    		 <input type='image' src="imagens/cadastrar.gif">
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