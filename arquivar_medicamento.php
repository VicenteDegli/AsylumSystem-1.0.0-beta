<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>alert('Usuário incluido com sucesso!');
			  	  window.location.href='home.php';
			  </script>";
	}
?>
<html>
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
            </div>               		
      		<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
      	</div>
    		<?php
			 include 'conexao.php';
			 
				 $medc_id=$_GET['medc_id'];	
				 
				 $select=mysql_query("SELECT rece_idos_id FROM receitas a,medicamentos b WHERE (a.rece_id = b.medc_rece_id) AND (b.medc_id='$medc_id')") or die (mysql_error());
				 $registro=mysql_fetch_array($select);
				 $idos_id=$registro['rece_idos_id']; 
			
				 $update_rece=mysql_query("UPDATE medicamentos SET medc_ativo='0' WHERE medc_id='$medc_id'") or die (mysql_error()); 
				 	 
				 if($update_rece){
					 echo "<script>alert('Medicamento arquivado com sucesso!');
					 			   window.location.href='listar_medicamentos_por_idoso.php?idos_id=$idos_id&rece_id=';
					 </script>";
				 }
				 else{
					 echo "<script>alert('Erro ao arquivar medicamento!');
					 			   window.history.go(-1);
					 </script>";
				 }
			 mysql_close($conexao);
	    ?>
			<div id="esquerda"></div>
     		<div id="direita"></div>
        	<div id="rodape"></div> 
        </div>
	</body>
</html>






