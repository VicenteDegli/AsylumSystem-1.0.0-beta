<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Você não tem permissão para assessar esta página!!');
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
        <?php include 'script_obitos.js'; 
			  include 'conexao.php'?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Cadastrar Óbito<br><br>
                </span>
                		<div id="form_receita">
                        	<?php  
								$idos_id=$_GET['idos_id'];
								$obit_id=$_GET['obit_id'];
								$select=mysql_query("SELECT obit_causa,obit_local,obit_data_falecimento,obit_extre_uncao FROM obitos WHERE obit_id = '$obit_id'");
								$registro=mysql_fetch_array($select);
								$obit_causa=$registro['obit_causa'];
								$obit_local=$registro['obit_local'];
								$obit_data_falecimento=$registro['obit_data_falecimento'];
								$obit_extre_uncao=$registro['obit_extre_uncao'];
								$obit_data_falecimento = implode("/",array_reverse(explode("-",$obit_data_falecimento)));
							?>
    						<form name="form1" action="obito_editado.php?obit_id=<?php  echo $obit_id?>&amp;idos_id=<?php  echo $idos_id?>" method="post">
                                <span class="auto"> 
									Causa:
									<input type='text' name='causa' value="<?php  echo $obit_causa?>">
                                </span>
                                
                                <span class="auto">
									Local:
									<input type='text' name='local' value="<?php  echo $obit_local?>">
                                </span> 
                                <span class="auto">
									Data:
                    				<input type="text" name="data" size="10%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value="<?php  echo $obit_data_falecimento?>">
                                </span>
                                <span class="auto">
									Recebeu Extrema Unção: 
               						<input type='radio' name='obit_extre_uncao' value='1' <?php  if($obit_extre_uncao==1){echo "checked='checked'";}?>>Sim
           							<input type='radio' name='obit_extre_uncao' value='0' <?php  if($obit_extre_uncao==0){echo "checked=='checked'";}?>>Não
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
                    		 <a href="listar_obitos.php"><img src="imagens/todos.gif" border='0px'/></a>
                    </div>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>