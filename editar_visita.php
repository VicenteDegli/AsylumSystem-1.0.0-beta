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
			include 'script_visitante.js';
		?>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
					Editar Visita<br><br>
                </span>    	
       			<div id="form_receita">
    				<?php 
						include 'conexao.php';
						$idos_visi_id=$_GET['idos_visi_id'];
						$visi_atual_id=$_GET['visi_id'];
						$select=mysql_query("SELECT * FROM visitantes a,idosos_visitantes b WHERE (a.visi_id = b.idos_visi_visi_id) AND (b.idos_visi_id = '$idos_visi_id')");
						$registro=mysql_fetch_array($select);
							$idos_atual_id=$registro['idos_visi_idos_id'];
							$visi_id=$registro['visi_id'];
  							$visi_data=$registro['idos_visi_data'];
							$idos_visi_grau_parentesco=$registro['idos_visi_grau_parentesco'];	
							$visi_data = implode("/",array_reverse(explode("-",$visi_data)));
						mysql_close($conexao);
	    			?>
    				<form name="form1" action="visita_editada.php?idos_visi_id=<?php echo $idos_visi_id ?>" method="post">
                    	<span class="auto">
	           				Idoso:<br>
             				<select name="idos_id">
             					<?php include 'select_idoso_atendimento.php' ?>
            				 </select>
                        </span>
                        <span class="auto">
             				Data:<br>
             				<input type="text" name="idos_visi_data" size="15%" maxlength="10" OnKeyPress="formatar(this, '##/##/####')" value='<?php echo $visi_data ?>'>
                        </span>
                        <span class="auto">
             				Visitante:<br>
             				<select name="visi_id">
                            	<option value="">Novo...</option>
             					<?php include 'select_visitantes_selecionado.php'?>
             				</select>
                        </span>
                        
                        
                        <span class="auto">
             				Grau Parentesco:<br>
             				<input type='text' size="15%" name='idos_visi_grau_parentesco' value="<?php echo $idos_visi_grau_parentesco ?>">
             				
                        </span>
                        <span class="auto">
                           	<font size="-1" color="#FF0000">Obs: Selecione a opção (novo...) se for cadastrar outro visitante.</font>
                        </span>
                       	<span class="auto">
            				Visitante:<br>
             				<input type='text' size="32%" name='visi_nome'>
                        </span>
                        <span class="auto">
			 				Telefone:<br>
			 				<input type='text' size="19%" name='visi_telefone'>
                        </span>
         			 </form>
        		</div>
				<div id="linkis_fixos">
					<img src="imagens/cadastrar.gif" boder='0px' onclick="check()" style="cursor:pointer"/>                   
                    <img src="imagens/espaco.gif" width="4%" height="2%" boder='0px' />
           		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		</div>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>          
	