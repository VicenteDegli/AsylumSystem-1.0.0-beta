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
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio"></a>
		<img src='imagens/cabecalho_1.gif' id='img_head' border='0px'/>
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos' border='0px' title='Sair do Sistema'><p></a>
        <div id="principal">
      		<div id="ficha">
            </div>
            <div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
  
    	<?php
			include 'conexao.php';
    	//Pegando dado do idoso que serão inseridos na tabela obitos e insere-os  se idoso já é falecido. 
 			    $aten_tipo=$_POST['aten_tipo'];
  			    $aten_prof_nome=$_POST['aten_prof_nome'];
 			    $aten_data=$_POST['aten_data'];
 			    $aten_procedimento=$_POST['aten_procedimento'];
                $aten_idos_id=$_POST['idos_id'];
				$aten_data = implode("-",array_reverse(explode("/",$aten_data)));
				
				$insert_atendimento=mysql_query("INSERT INTO atendimentos (aten_tipo,aten_prof_nome,aten_data,aten_procedimento,aten_idos_id) VALUES ('$aten_tipo','$aten_prof_nome','$aten_data','$aten_procedimento','$aten_idos_id')") or die (mysql_error());

			if($insert_atendimento){
				echo "<script>alert('Atendmento inseridos com Sucesso!');
							  window.location.href='listar_atendimentos_por_idoso.php?idos_id=$aten_idos_id';
				</script>";
			}
			else{
				echo "<script>alert('Erro ao inserir atendimento!');
							  window.history.go(-1);
				</script>";
			}	
			mysql_close($conexao);
		?>
        
							<center>
					 			<a href="index.html"><input type='button' name='cadastrar' value='Início'></a>
				   			</center>
	</body>
</html>