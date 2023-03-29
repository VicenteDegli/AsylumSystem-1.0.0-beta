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
			if(isset($_POST['nome'])){ 
				include 'conexao.php';
				$pess_nome=$_POST['nome'];
				$pess_data_nasc=$_POST['data_nasc'];
		   		$pess_cpf=$_POST['cpf'];
				$pess_sexo=$_POST['sexo'];
				$pess_endereco=$_POST['func_endereco'];
				$pess_bairro=$_POST['func_bairro'];
				$pess_cidade=$_POST['func_cidade'];
				$pess_cep=$_POST['func_cep'];
				$pess_uf=$_POST['func_uf'];
				$cola_telefone=$_POST['cola_telefone'];
				$cola_identidade=$_POST['cola_identidade'];
				$cola_funcao=$_POST['cola_funcao'];
				$func_carg_horaria=$_POST['func_carg_horaria'];
				$func_salario=$_POST['func_salario'];
				$func_faltas=$_POST['func_faltas'];
				$pess_data_nasc = implode("-",array_reverse(explode("/",$pess_data_nasc)));
			  
				$insert=mysql_query("INSERT INTO pessoas (pess_nome,pess_data_nasc,pess_cpf,pess_sexo,pess_endereco,pess_bairro,pess_cidade,pess_cep,pess_uf) VALUES ('$pess_nome','$pess_data_nasc','$pess_cpf','$pess_sexo','$pess_endereco','$pess_bairro','$pess_cidade','$pess_cep','$pess_uf')") or die (mysql_error());
			
				$select=mysql_query("SELECT pess_id FROM pessoas");
				while($linha=mysql_fetch_array($select)){
					$pess_id=$linha['pess_id'];
				}
				$insert_cola=mysql_query("INSERT INTO colaboradores (cola_pess_id,cola_telefone,cola_identidade,cola_funcao) VALUES ('$pess_id','$cola_telefone','$cola_identidade','$cola_funcao')");
			
				$select=mysql_query("SELECT cola_id FROM colaboradores WHERE cola_pess_id='$pess_id'");
				$linha=mysql_fetch_array($select);
				$cola_id=$linha['cola_id'];
			
				$insert_func=mysql_query("INSERT INTO funcionarios (func_cola_id,func_carg_horaria,func_salario,func_faltas) VALUES ('$cola_id','$func_carg_horaria','$func_salario','$func_faltas')");
			
				if($insert && $insert_cola && $insert_func){
					echo "<script>
						alert('Funcionário inserido com sucesso!');
						window.location.href='listar_funcionarios.php';
					</script>";
				}
				else{
					echo "<script>
						alert('Erro ao inserir funcionário!');
						window.history.go(-1);
					</script>";
				}
			}	
        	?>
	</body>
</html>
