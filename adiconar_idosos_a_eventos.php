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
        <link rel="stylesheet" type="text/css" href="estilo2.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
		<script language=javascript>
				function selecionarTodosMasculinos(){
   					for(var i=0;i<document.form1.elements.length;i++){
    					var x = document.form1.elements[i];
						i++;
						var y = document.form1.elements[i].value; 
						if(y=='m'){
							x.checked = document.form1.selectMasculinos.checked;
						}	 
					} 
				} 	
				function selecionarTodosFemininos(){ 
   					for (var i=0;i<document.form1.elements.length;i++){
    					var x = document.form1.elements[i]; 
						i++;
						var y = document.form1.elements[i].value;
						if(y=='f'){
							x.checked = document.form1.selectFemininos.checked; 
						}
					} 
				} 	
		</script>
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            	<span class="ficha_titulos">
						Adicionar idosos<br><br>
                </span>
    				<?php
						include 'conexao.php';
						$even_id=$_GET['even_id'];
						if($even_id==''){
    						//Pegando dado do idoso que serão inseridos na tabela obitos e insere-os  se idoso já é falecido. 
  							$even_tipo=$_POST['even_tipo'];
  							$even_data=$_POST['even_data'];
  							$even_local=$_POST['even_local'];
  				
							$even_data = implode("-",array_reverse(explode("/",$even_data)));
				
							$insert_even=mysql_query("INSERT INTO eventos (even_tipo,even_data,even_local) VALUES ('$even_tipo','$even_data','$even_local')") or die (mysql_error());
				
							$select=mysql_query("SELECT even_id FROM eventos");
							while($registro=mysql_fetch_array($select)){
								$even_id=$registro['even_id'];
							}
							if($insert_even){
								echo "<script>alert('Evento incluido com sucesso!');</script>";
							}
							else{
								echo "<script>alert('Erro ao incluir Evento!');
									window.history.go(-1);</script>";
							}
						}
					?>
					<!--Adicionando Idosos ao evento-->
					<form name='form1' action='idosos_adicionados.php?even_id=<?php echo $even_id?>' method='post'>
                    	<div id="add_idosos_evento">	
             				<?php include 'select_idosos_evento_m.php'?>
                    		<br><input type=checkbox name="selectMasculinos" onclick="selecionarTodosMasculinos()"/>Selecionar Todos
                            <input type="hidden"/>
                    		
           				</div>
                    	<div id="add_idosos_evento">
             				<?php include 'select_idosos_evento_f.php'?>
                    		<br><input type=checkbox name="selectFemininos" onclick="selecionarTodosFemininos()"/>Selecionar Todos
                            <input type="hidden"/>
                		</div>
				<span class="ficha_linkis">
                		<input type='image' src="imagens/cadastrar.gif"/>
                	</form>		
           			<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="#inicio"><img src="imagens/limpar_dados.gif" border='0px' onClick="document.forms[0].reset()" /></a>
           		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="home.php"><img src="imagens/home.gif" border='0px'/></a>
           		 	<img src="imagens/espaco.gif" width="4%" height="2%" />
           		 	<a href="listar_eventos.php"><img src="imagens/todos.gif" border='0px'/></a>
           		</span>
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>	
	</body>
</html>           		
	
	