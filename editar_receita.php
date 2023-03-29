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
        <?php include 'script_receita.js'; ?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Editar Receita<br><br><br><br>
                </span>
                		<div id="form_usuario">
    						<?php
								include 'conexao.php';
			 					$rece_id=$_GET['rece_id'];
    	     					$select=mysql_query("SELECT * FROM receitas WHERE rece_id = '$rece_id'");
			  					$registro=mysql_fetch_array($select);
								$rece_id=$registro['rece_id'];
								$rece_medico=$registro['rece_medico'];
								$rece_data=$registro['rece_data'];
								$rece_data = implode("/",array_reverse(explode("-",$rece_data)));
							?>
    						<form name="form1" action="receita_editada.php?rece_id=<?php echo $rece_id ?>" method="post">
             					Médico*:
            					<input type='text' name='rece_medico' value='<?php echo $rece_medico ?>'>
               					Data*:
            					<input type='text' name='rece_data' size="15%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value='<?php echo $rece_data ?>'>
                                Nº de Medicamentos:
                				<select name="qtde"> 
                					<?php 
										for($i=0;$i<=10;$i++){
											echo "<option value='$i'>$i</option>";
										}
				    				?>
                				</select>
               				</form>
                        </div> 
                    <div id="linkis_fixos">
             				 <img src="imagens/cadastrar.gif" border='0px' onClick="check1()" style="cursor:pointer"/>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="listar_usuario.php"><img src="imagens/todos.gif" border='0px'/></a>
                    </div>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>