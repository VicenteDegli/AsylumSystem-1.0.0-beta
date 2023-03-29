<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Voce não tem permissão para acessar esta página!');
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
        <?php include 'script_reincersao.js'; 
			  include 'conexao.php'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Reincerir a Familia<br><br>
                </span>
                		<div id="form_receita">
							<form name="form1" action='idoso_reincerido.php' method='post'> 
                            	<span class="auto">
									Idoso:
                					<select name="idos_id">
                						<?php include 'select_idosos_nao_reinceridos.php' ?>
               						</select>
								</span>
                                <span class="auto">
									Data:
   									<input type="text" name="reic_data" size="13%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')">					
									Motivo:
									<input type='text' size="20%" name='reic_motivo'>
                       			</span>    
      						</form>
                         </div> 
                    <div id="linkis_fixos">
             				 <img src="imagens/cadastrar.gif" border='0px' onClick="submeter()" style="cursor:pointer"/>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
                    		 <img src="imagens/espaco.gif" width="5%" height="2%" />
                    		 <a href="listar_reincersoes.php"><img src="imagens/todos.gif" border='0px'/></a>
                    </div>
         	</div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>