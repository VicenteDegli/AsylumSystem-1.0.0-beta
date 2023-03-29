<?php include("verificar_sessao.php");
	if($_SESSION['UsuarioNivel']==3){
		echo "<script>
				alert('Você nã tem permissão para acessar esta página.');
			  </script>";
		header('location: index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link rel="stylesheet" type="text/css" href="documentos.css">
        <link rel="stylesheet" type="text/css" href="css_ficha.css">
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
				if(isset($_POST['idos_nome'])){
					//Pegando dados do idoso que serão inseridos na tabela pessoas		
					$pess_nome=$_POST['idos_nome'];
					$pess_data_nasc=$_POST['idos_data_nasc'];
				    $pess_cpf=$_POST['idos_cpf'];
					$pess_sexo=$_POST['idos_sexo'];
					$pess_endereco=$_POST['idos_endereco'];
					$pess_bairro=$_POST['idos_bairro'];
					$pess_cidade=$_POST['idos_cidade'];
					$pess_cep=$_POST['idos_cep'];
					$pess_uf=$_POST['idos_uf'];
					$pess_data_nasc = implode("-",array_reverse(explode("/",$pess_data_nasc)));
						
					//Pegando dados que serão inseridos na tabela idoso
					$idos_profissao=$_POST['profissao'];
					$idos_mae=$_POST['mae'];
					$idos_pai=$_POST['pai']; 
					$idos_data_ingresso=$_POST['ingresso'];
					$idos_data_ingresso = implode("-",array_reverse(explode("/",$idos_data_ingresso)));
					$idos_tipo_sanguineo=$_POST['idos_tipo_sanguineo'];
					$idos_religiao=$_POST['religiao'];
					$idos_qtde_filhos=$_POST['qtde_filhos'];
					$idos_estado=$_POST['idos_uf'];
					$idos_valor_contribuicaoo=$_POST['contribuicao'];
					$idos_pertences=$_POST['pertences'];
					$idos_estd_civil=$_POST['ecivil'];
					$idos_grau_instrucao=$_POST['instrucao'];
					$idos_batizado=$_POST['batizado'];
					$idos_casm_relig=$_POST['casamento'];
					$idos_mant_familia=$_POST['familia'];
					$idos_tem_bens=$_POST['bens'];
					$idos_inter_ord_jud=$_POST['judicial'];
					$idos_eleitor=$_POST['eleitor'];
					$idos_livre_espo_vontd=$_POST['livre'];
					$idos_cor=$_POST['cor'];
					$idos_sus_municipal=$_POST['sus_municipal'];
					$idos_sus_nacional=$_POST['sus_nacional'];
			
					//Pegando dados de idosoque serão inseridos na tabea documentos
					$docu_regi_nascimento=$_POST['regi_nascimento'];
					$docu_regi_casamento=$_POST['regi_casamento'];
					$docu_identidade=$_POST['docu_identidade'];
					$docu_cart_trabalho=$_POST['cart_trabalho'];
					$docu_titulo=$_POST['titulo'];
					
					//Pegando dados que serão inseridos na tabela responsaveis
					$resp_inte_id=$_POST['resp_inte_id'];
			
					//Pegando dados que serão inseridos na tabelo exames.
					$exam_rx_torax=$_POST['exam_rx_torax'];
		  			$exam_pa=$_POST['exam_pa'];
  					$exam_contagioso=$_POST['exam_contagioso'];
 		 			$exam_hemo_completo=$_POST['exam_hemo_completo'];
  					$exam_ecg=$_POST['exam_ecg'];
  					$exam_soro_lues=$_POST['exam_soro_lues'];
  					$exam_urina=$_POST['exam_urina'];
		  			$exam_fezes=$_POST['exam_fezes'];
  					$exam_receitas=$_POST['exam_receitas'];
  					$exam_decl_medica=$_POST['exam_decl_medica'];
			
					/*Pergar dados e inserir em responsável por idoso*/
					$resp_id=$_POST['resp_id'];
					//Pegando dados do idoso que serão inseridos na tabela pessoas.
					if($resp_id==""){				
						$resp_nome=$_POST['resp1_nome'];
						$resp_data_nasc=$_POST['resp1_data_nasc'];
		    			$resp_cpf=$_POST['resp1_cpf'];
						$resp_sexo=$_POST['resp1_sexo'];
						$resp_endereco=$_POST['resp1_endereco'];
						$resp_bairro=$_POST['resp1_bairro'];
						$resp_cidade=$_POST['resp1_cidade'];
						$resp_cep=$_POST['resp1_cep'];
						$resp_uf=$_POST['resp1_uf'];
						$resp_data_nasc = implode("-",array_reverse(explode("/",$resp_data_nasc)));
					
						//Pegando da dsdos que serão inseridos na tabela responsáveis.
						$resp_rg=$_POST['resp1_rg'];
						$resp_tel=$_POST['resp1_tel'];
						$resp_tel_ad=$_POST['resp1_tel_ad'];
						
						//checar se cpf já esta cadastrado, afim de evitar erro de duplicação no  banco de dados.
					
						$insert_pess=mysql_query("INSERT INTO pessoas (pess_nome,pess_data_nasc,pess_cpf,pess_sexo,pess_endereco,pess_bairro,pess_cidade,pess_cep,pess_uf) VALUES ('$resp_nome','$resp_data_nasc','$resp_cpf','$resp_sexo','$resp_endereco','$resp_bairro','$resp_cidade','$resp_cep','$resp_uf')") or die (mysql_error());
					
						$select_pess=mysql_query("SELECT pess_id FROM pessoas WHERE pess_cpf='$resp_cpf'");
						while($registro=mysql_fetch_array($select_pess)){
							$resp_pess_id=$registro['pess_id'];
						}
						$insert_resp=mysql_query("INSERT INTO responsaveis (resp_pess_id,resp_identidade,resp_telefone,resp_telefones) VALUES ('$resp_pess_id','$resp_rg','$resp_tel','$resp_tel_ad')") or die (mysql_error());
					
						$select_responsavel=mysql_query("SELECT resp_id FROM responsaveis WHERE resp_pess_id='$resp_pess_id'");
						$registro=mysql_fetch_array($select_responsavel);
						$resp_id=$registro['resp_id'];
					}
			
					if($resp_inte_id==""){
						//dados de responsavel que serão incluidos na tabela pessoa e cadastrando novo responsável.
						$resp_nome=$_POST['resp_nome'];
						$resp_data_nasc=$_POST['resp_data_nasc'];
				   	    $resp_cpf=$_POST['resp_cpf'];
						$resp_sexo=$_POST['resp_sexo'];
						$resp_data_nasc = implode("-",array_reverse(explode("/",$resp_data_nasc)));
			  	
						//insere dados de idoso na tabela responsaveis 
			    		$insert=mysql_query("INSERT INTO pessoas (pess_nome,pess_data_nasc,pess_cpf,pess_sexo) VALUES ('$resp_nome','$resp_data_nasc','$resp_cpf','$resp_sexo')") or die (mysql_error());
				
						//seleciona id de pessoa que será referenciado na tabela idoso
						$select_id=mysql_query("SELECT pess_id FROM pessoas");
						while($linha=mysql_fetch_array($select_id)){
							$pess_id=$linha['pess_id'];
						}
						//insere dados tabela responsável pela internação do idiso
						$insert_resp=mysql_query("INSERT INTO responsaveis_internacoes (resp_inte_pess_id) VALUES ('$pess_id')") or die (mysql_error());
						
						//seleciona id de responsável pela internação que será referenciado na tabela idoso
						$select_resp=mysql_query("SELECT resp_inte_id FROM responsaveis_internacoes WHERE resp_inte_pess_id='$pess_id'");
						$linha=mysql_fetch_array($select_resp);
						$resp_inte_id=$linha['resp_inte_id'];
					}
					
					$insert=true; $insert_idoso=true; $insert_documentos=true; $insert_exames=true; $insert_idos_resp=true;
			
			 		$insert=mysql_query("INSERT INTO pessoas (pess_nome,pess_data_nasc,pess_cpf,pess_sexo,pess_endereco,pess_bairro,pess_cidade,pess_cep,pess_uf) VALUES ('$pess_nome','$pess_data_nasc','$pess_cpf','$pess_sexo','$pess_endereco','$pess_bairro','$pess_cidade','$pess_cep','$pess_uf')") or die (mysql_error());
				
					//seleciona id de pessoa que será referenciado na tabela idoso
					$select_id=mysql_query("SELECT pess_id FROM pessoas");
					while($linha=mysql_fetch_array($select_id)){
						$pess_id=$linha['pess_id'];
					}
					//insere dados diretamente na tabela idoso  
					$insert_idoso=mysql_query("INSERT INTO idosos (idos_pess_id,idos_resp_inte_id,idos_profissao,idos_mae,idos_pai,idos_data_ingresso,idos_tipo_sanguineo,idos_religiao,idos_qtde_filhos,idos_valor_contribuicao,idos_pertences,idos_estd_civil,idos_grau_instrucao,idos_batizado,idos_casm_relig,idos_mant_familia,idos_tem_bens,idos_inter_ord_jud,idos_eleitor,idos_livre_espo_vontd,idos_falecido,idos_reinc_familia,idos_ativo,idos_cor,idos_sus_municipal,idos_sus_nacional) VALUES ('$pess_id','$resp_inte_id','$idos_profissao','$idos_mae','$idos_pai','$idos_data_ingresso','$idos_tipo_sanguineo','$idos_religiao','$idos_qtde_filhos','$idos_valor_contribuicaoo','$idos_pertences','$idos_estd_civil','$idos_grau_instrucao','$idos_batizado','$idos_casm_relig','$idos_mant_familia','$idos_tem_bens','$idos_inter_ord_jud','$idos_eleitor','$idos_livre_espo_vontd','0','0','1','$idos_cor','$idos_sus_municipal','$idos_sus_nacional')") or die (mysql_error());
			
					//SELECIONA ID DO IDOSO QUE SERÁ REFERENCIADO NAS TABELAS DOCUMENTOS, EXAMES E IDOSOS_RESPONSAVEIS
					$select_resp=mysql_query("SELECT idos_id FROM idosos WHERE idos_pess_id='$pess_id'");
					while($linha=mysql_fetch_array($select_resp)){
						$idos_id=$linha['idos_id'];
					}
						//Insere dados da tabela idosos_responsaveis que faz a relação n pra n entre idosos e responsaveis.
					$insert_idos_resp=mysql_query("INSERT INTO idosos_responsaveis (idos_resp_idos_id,idos_resp_resp_id) VALUES ('$idos_id','$resp_id')") or die (mysql_error()); 
				
				
					//Insere dados na tabela documentos, referenciando idoso.
					$insert_exames=mysql_query("INSERT INTO exames (exam_rx_torax,exam_pa,exam_contagioso,exam_hemo_completo,exam_ecg,exam_soro_lues,exam_urina,exam_fezes,exam_receitas,exam_decl_medica,exam_idoso_id) VALUES ('$exam_rx_torax','$exam_pa','$exam_contagioso','$exam_hemo_completo','$exam_ecg','$exam_soro_lues','$exam_urina','$exam_fezes','$exam_receitas','$exam_decl_medica','$idos_id')") or die (mysql_error());
			
			
			
					//Insere dados na tabela documentos, referenciando idoso.
					$insert_documentos=mysql_query("INSERT INTO documentos (docu_idoso_id,docu_regi_nascimento,docu_regi_casamento,docu_identidade,docu_cart_trab,docu_titulo) VALUES ('$idos_id','$docu_regi_nascimento','$docu_regi_casamento','$docu_identidade','$docu_cart_trabalho','$docu_titulo')") or die (mysql_error());
			
					//Seleciona Id da tabela documetos que será referenciado nas tabelas, rg, titula e cart trab.
					$select_docu=mysql_query("SELECT docu_id FROM documentos WHERE docu_idoso_id='$idos_id'");
					$linha=mysql_fetch_array($select_docu);
					$docu_id=$linha['docu_id'];
					//Form que entrará com valores para cadastrar daodos de documentos se eles forem apresentados.
					if($insert_idoso && $insert_documentos && $insert_exames && $insert_idos_resp){
						echo "<script>alert('Idoso Cadastrado com sucesso!');</script>";
						if($docu_identidade==1 || $docu_cart_trabalho==1 || $docu_titulo==1){
							echo "<script>window.location.href='cadastrar_documentos.php?docu_identidade=$docu_identidade&docu_cart_trabalho=$docu_cart_trabalho&docu_titulo=$docu_titulo&docu_id=$docu_id';</script>";
							//header("location: cadastrar_documentos.php?docu_identidade=".$docu_identidade."&docu_cart_trabalho=".$docu_cart_trabalho."&docu_titulo=".$docu_titulo."&docu_id=".$docu_id);
						}
						else{
							echo "<script>window.location.href='listar_idosos.php';</script>";
						}
					}
					else{
						echo "<script>
							alert('Erro ao incluir idoso no banco de dados! Você será encaminhado para página anterior!');	
							window.history.go(-1);
			 			</script>";
					}
				}
        	?>               
	</body>
</html>
