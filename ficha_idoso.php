<?php include("verificar_sessao.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="estilo2.css" />
        <title>Sistema Abrigo Dos Velhos José Lima</title>
		<link rel='shortcut icon' href='imagens/FAVICON.ico' type='image/x-icon' />
        <link rel="stylesheet" type="text/css" href="css_ficha.css" />
	</head>

	<body bgcolor="#DFFFDF">
    	<a name="inicio" id="inicio"></a>
    	<img src='imagens/cabecalho_1.gif' id='img_head' border='0px' />
        <a href='index.php'><img src='imagens/logout.gif' align ='bottom' id='imgpos'  title='Sair do Sistema' /><p></a>
    	<?php 
			include 'conexao.php';
				
				$idos_id=$_GET['idos_id'];
				$select=mysql_query("SELECT * 
										FROM 
										    pessoas a,
											idosos b,
											exames c,
											documentos d,
											responsaveis e,
											idosos_responsaveis f,
											responsaveis_internacoes g
											
									    WHERE (a.pess_id = b.idos_pess_id) AND 
											  (c.exam_idoso_id = b.idos_id) AND
											  (d.docu_idoso_id = b.idos_id) AND			  										  
											  (b.idos_id = f.idos_resp_idos_id) AND
											  (f.idos_resp_resp_id = e.resp_id) AND
											  (b.idos_resp_inte_id = g.resp_inte_id) AND
											  (b.idos_id = '$idos_id')");	
				
					$registro=mysql_fetch_array($select);
										
					//Pegando dados de idoso na tabela pessoas. 
					$idos_nome=$registro['pess_nome'];
					$idos_cpf=$registro['pess_cpf'];
					$idos_data_nasc=$registro['pess_data_nasc'];
					$idos_sexo=$registro['pess_sexo'];
					$idos_endereco=$registro['pess_endereco'];
					$idos_bairro=$registro['pess_bairro'];
					$idos_cidade=$registro['pess_cidade'];
					$idos_cep=$registro['pess_cep'];
					$idos_uf=$registro['pess_uf'];
					
					//Pegando dados diretamente da tabela idoso.
					$idos_id=$registro['idos_id'];
  					$idos_pess_id=$registro['idos_pess_id'];
  					$idos_cor=$registro['idos_cor'];
  					$idos_grau_instrucao=$registro['idos_grau_instrucao'];
  					$idos_profissao=$registro['idos_profissao'];
 				    $idos_mae=$registro['idos_mae'];
					$idos_pai=$registro['idos_pai'];
  					$idos_data_ingresso=$registro['idos_data_ingresso'];
  					$idos_religiao=$registro['idos_religiao'];
  					$idos_batizado=$registro['idos_batizado'];
 				    $idos_estd_civil=$registro['idos_estd_civil'];
  					$idos_casm_relig=$registro['idos_casm_relig'];
  					$idos_mant_familia=$registro['idos_mant_familia'];
  					$idos_qtde_filhos=$registro['idos_qtde_filhos'];
  					$idos_tem_bens=$registro['idos_tem_bens'];
  					$idos_livre_espo_vontd=$registro['idos_livre_espo_vontd'];
  					$idos_pertences=$registro['idos_pertences'];
  					$idos_inter_ord_jud=$registro['idos_inter_ord_jud'];
  					$idos_eleitor=$registro['idos_eleitor'];
  					$idos_resp_inte_id=$registro['idos_resp_inte_id'];
  					$idos_valor_contribuicao=$registro['idos_valor_contribuicao'];
  					$idos_falecido=$registro['idos_falecido'];
  					$idos_reinc_familia=$registro['idos_reinc_familia'];
 				    $idos_ativo=$registro['idos_ativo'];
					$idos_tipo_sanguineo=$registro['idos_tipo_sanguineo'];					
					$idos_data_nasc = implode("/",array_reverse(explode("-",$idos_data_nasc)));
					if($idos_data_nasc == '00/00/0000'){
						$idos_data_nasc = 'xx/xx/xxxx';
					}
					$idos_data_ingresso = implode("/",array_reverse(explode("-",$idos_data_ingresso)));
					$idos_sus_municipal=$registro['idos_sus_municipal'];
					$idos_sus_nacional=$registro['idos_sus_nacional'];
								
					//Pegando dados de idoso na tabela exames
					$exam_id=$registro['exam_id'];
 				    $exam_rx_torax=$registro['exam_rx_torax'];
  					$exam_pa=$registro['exam_pa'];
 				    $exam_contagioso=$registro['exam_contagioso'];
  					$exam_hemo_completo=$registro['exam_hemo_completo'];
 				    $exam_ecg=$registro['exam_ecg'];
 				    $exam_soro_lues=$registro['exam_soro_lues'];
  					$exam_urina=$registro['exam_urina'];
  					$exam_fezes=$registro['exam_fezes'];
  					$exam_receitas=$registro['exam_receitas'];
  					$exam_decl_medica=$registro['exam_decl_medica'];
  					$exam_idoso_id=$registro['exam_idoso_id'];
					
					//Pegando id de responsáveis e reponsaveis pela internação, que serão necessarios para buscar seus respectivos dados que estão guardados na tabela pessoa.
					$resp_inte_id=$registro['resp_inte_id'];
					$resp_inte_pess_id=$registro['resp_inte_pess_id'];
					$select_resp_inte=mysql_query("SELECT * FROM  pessoas WHERE pess_id = '$resp_inte_pess_id'");
					$registro_resp_inte=mysql_fetch_array($select_resp_inte);
  					$resp_inte_nome=$registro_resp_inte['pess_nome'];
  					$resp_inte_data_nasc=$registro_resp_inte['pess_data_nasc'];
  					$resp_inte_cpf=$registro_resp_inte['pess_cpf'];
  					$resp_inte_sexo=$registro_resp_inte['pess_sexo'];
					$resp_inte_data_nasc = implode("/",array_reverse(explode("-",$resp_inte_data_nasc)));
					
					//Responsável pelo idoso
					$resp_id=$registro['resp_id'];
					$resp_pess_id=$registro['resp_pess_id'];
  					$resp_identidade=$registro['resp_identidade'];
  					$resp_telefone=$registro['resp_telefone'];
  					$resp_telefones=$registro['resp_telefones'];
					$select_resp=mysql_query("SELECT * FROM  pessoas WHERE pess_id = '$resp_pess_id'");
					$registro_resp=mysql_fetch_array($select_resp);
  					$resp_nome=$registro_resp['pess_nome'];
  					$resp_data_nasc=$registro_resp['pess_data_nasc'];
  					$resp_cpf=$registro_resp['pess_cpf'];
  					$resp_sexo=$registro_resp['pess_sexo'];
					$resp_endereco=$registro_resp['pess_endereco'];
					$resp_bairro=$registro_resp['pess_bairro'];
					$resp_cidade=$registro_resp['pess_cidade'];
					$resp_cep=$registro_resp['pess_cep'];
					$resp_uf=$registro_resp['pess_uf'];
					$resp_data_nasc = implode("/",array_reverse(explode("-",$resp_data_nasc)));
					
					//Pegando dados de idoso na tabela documentos
					 $docu_id=$registro['docu_id'];
				     $docu_regi_casamento=$registro['docu_regi_casamento'];
				     $docu_regi_nascimento=$registro['docu_regi_nascimento'];
 					 $docu_identidade=$registro['docu_identidade'];
  					 $docu_idoso_id=$registro['docu_idoso_id'];
 					 $docu_cart_trab=$registro['docu_cart_trab'];
 					 $docu_titulo=$registro['docu_titulo'];
					 
					 //Pegando dados de idoso na tabela identidade, se foi cadastrado
					 $iden_numero='';
					 if($docu_identidade==1){
						  $select_iden=mysql_query("SELECT * FROM  identidades WHERE iden_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_iden);
						  $iden_id=$registro['iden_id'];
  						  $iden_numero=$registro['iden_numero'];
  						  $iden_orgao=$registro['iden_orgao'];
 						  $iden_docu_id=$registro['iden_docu_id'];
					 }
					 
					 //Pegando dados de idoso na tabela carteiras, se foi cadastrado
					 if($docu_cart_trab==1){
						  $select_cart=mysql_query("SELECT * FROM  carteiras WHERE cart_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_cart);
						  $cart_id=$registro['cart_id'];
 						  $cart_numero=$registro['cart_numero'];
  						  $cart_serie=$registro['cart_serie'];
  						  $cart_docu_id=$registro['cart_docu_id'];
					 }
					 
					 //Pegando dados de idoso na tabela titulos, se foi cadastrado
					 if($docu_titulo==1){
						  $select_titu=mysql_query("SELECT * FROM  titulos WHERE titu_docu_id = '$docu_id'");
						  $registro=mysql_fetch_array($select_titu);
						  $titu_id=$registro['titu_id'];
  						  $titu_numero=$registro['titu_numero'];
 						  $titu_zona=$registro['titu_zona'];
						  $titu_secao=$registro['titu_secao'];
						  $titu_docu_id=$registro['titu_docu_id'];
					 }
			mysql_close($conexao);
		
		echo "<div id='principal'>";
			echo "<div id='ficha'>
				   <span class='coluna_x3'>
							ABRIGO DO VELHOS JOSÉ LIMA<br>
				   </span>
				   <span class='coluna_x4'>
							Rua Pedro Rodrigues Carmo, 6 &nbsp;Centro - Bom Jesus do Itabapoana - RJ 28360-000‎&nbsp;Tel: (22) 3831-1326
				   </span>
				   <span class='ficha_titulos'>
							FICHA DO IDOSO
				   </span>
				   <span class='ficha_valores_x3'>
							Nome: $idos_nome
				   </span>
				   <span class='ficha_valores_x0'>
							RG: "; 
							if ($iden_numero!=""){
								echo $iden_numero;
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x0'>
							Sexo: "; 
							if($idos_sexo=='m'){
								 echo "Masculino";
							}
							else{
								 echo "Feminino";
							}
					echo "</span>";
				   echo "<span class='ficha_valores_x2'>
							Data de Nascimento: $idos_data_nasc 
					</span>
				    <span class='ficha_valores_x1'>
							CPF: $idos_cpf 
					</span>";
					echo "<span class='ficha_valores_x0'>";
						echo "Tipo Sanguineo: ".$idos_tipo_sanguineo;
					echo "</span>";
					echo "<span class='ficha_valores_x0'>
							Côr: "; 
							if($idos_cor==1){
								echo "Branco(a)";
							}
							else if($idos_cor==2){
								echo "Negro(a)";
							}
							else if($idos_cor==3){
								echo "Índio(a)";
							}
							else if($idos_cor==4){
								echo "Pardo(a)";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x4'>
					    	Filiação: $idos_mae e $idos_pai
					</span>
					<span class='ficha_valores_x1'>
							Profissão: $idos_profissao 
					</span>
					<span class='ficha_valores_x2'>
							Data de Ingresoo: $idos_data_ingresso
					</span>
					<span class='ficha_valores_x1'>
							Número de Filhos: $idos_qtde_filhos
					</span>
					<span class='ficha_valores_x1'>
						Estado Civil: "; 
							if($idos_estd_civil==1){
								echo "Casado(a)";
							}
							else if($idos_estd_civil==2){
								echo "Solteiro(a)";
							}
							else if($idos_estd_civil==3){
								echo "Viuvo(a)";
							}
							else if($idos_estd_civil==4){
								echo "Divorciado(a)";
							}
					echo "</span>";
					
					echo "<span class='ficha_valores_x3'>
							Grau de Instrução: "; 
							if($idos_grau_instrucao==1){
								echo "Nível Fundamental";
							}
							else if($idos_grau_instrucao==2){
								echo "Nível Fundamental Incompleto";
							}
							else if($idos_grau_instrucao==3){
								echo "Nível Médio";}else if($idos_cor==1){echo "Nível Superior";
							}
					echo "</span>";
							echo "
					<span class='ficha_valores_x1'>
							Contribuição: R$ $idos_valor_contribuicao,00
					</span>
					<span class='ficha_valores_x1'>
							Batizado: "; 
							if($idos_batizado==1){
								echo "Sim";
							}
							else{
								 echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Casamento Religioso: "; 
							if($idos_casm_relig==1){
								echo "Sim";
							}
							else{ 
								echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "Mantem Família: "; 
							if($idos_mant_familia==1){
								echo "Sim";
							}
							else{ 
								echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "Possui Bens: "; if($idos_tem_bens==1){
								echo "Sim";
							}
							else{
								 echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "Eleitor: "; 
							if($idos_eleitor==1){
								echo "Sim";
							}
							else{
								 echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Interno Por Ordem Judicial: "; 
							if($idos_inter_ord_jud==1){
								echo "Sim";
							}
							else{ 
								echo "Não";
							}
					echo "</span>";
					
					echo "<span class='ficha_valores_x3'>";
							echo"Interno por livre e espontãnea vontade: "; 
							if($idos_casm_relig==1){
								echo "Sim";
							}
							else{ 
								echo "Não";
							}
					echo "</span>";	
					echo "<span class='ficha_valores_x2'>
							Nº Municipal do SUS: $idos_sus_municipal
						  </span>";
					echo "<span class='ficha_valores_x2'>
							Nº Nacional do SUS: $idos_sus_nacional
						  </span>";
					echo "<span class='ficha_valores_x4'>
						Pertences: $idos_pertences
					</span>		
					<span class='ficha_valores_x4'>
						Endereço: $idos_endereco, &nbsp;&nbsp;&nbsp;Bairro: $idos_bairro - $idos_cidade - $idos_uf - CEP: $idos_cep
					</span>";
						
					echo "<span class='ficha_titulos'>Situação da documentação</span>";
					echo "<span class='ficha_valores_x3'>";		
							echo "Certidão de Nascimento: ";
							if($docu_regi_nascimento==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "Identidade: ";
							if($docu_identidade==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x0'>";
							echo "Titulo: ";
							if($docu_titulo==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x3'>";
							echo "Certidão de Casamento: ";
							if($docu_regi_casamento==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Carteira de Trabalho: ";
							if($docu_cart_trab==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
							
							//Situação dos exames
					echo "<span class='ficha_titulos'>Situação dos Exames</span>";
					
					echo "<span class='ficha_valores_x2'>";
							echo "Exame de PA: ";
							if($exam_pa==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "Soro Lues: ";
							if($exam_soro_lues==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";
							echo "RX do torax: : ";
							if($exam_rx_torax==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x1'>";;
							echo "Receitas: ";
							if($exam_receitas==1){
								echo "Apresentado";
							}
							else{
								echo "Nenhuma Apresentada";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Exame de Urina: ";
							if($exam_urina==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					
					echo "<span class='ficha_valores_x2'>";
							echo "Exame de Fezes: ";
							if($exam_fezes==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Possui Doença Contagiosa: ";
							if($exam_contagioso==1){
								echo "Sim";
							}
							else{
								echo "Não";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Hemograma Completo: ";
							if($exam_hemo_completo==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";
							echo "Ecocardiograma: ";
							if($exam_ecg==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					echo "<span class='ficha_valores_x2'>";;
							echo "Declaração Médica: ";
							if($exam_decl_medica==1){
								echo "Apresentado";
							}
							else{
								echo "Pendente";
							}
					echo "</span>";
					
					
							
					echo "<span class='ficha_titulos'>Responsável Pelo Idoso</span>";
					echo "<span class='ficha_valores_x3'>
							Nome: $resp_nome
					</span>
					<span class='ficha_valores_x1'>
							CPF: $resp_cpf 
					</span>
					<span class='ficha_valores_x1'>
							RG: $resp_identidade
					</span>
					<span class='ficha_valores_x2'>
							Data de Nascimento: $resp_data_nasc 
					</span>
					<span class='ficha_valores_x3'>
							Tel(s): $resp_telefone  &nbsp;&nbsp;&nbsp; $resp_telefones
					</span>
					<span class='ficha_valores_x4'>
							Endereço: $resp_endereco, &nbsp;&nbsp;&nbsp;Bairro: $resp_bairro - $resp_cidade - $resp_uf - CEP: $resp_cep
					</span>";
					
					echo "<span class='ficha_titulos'>Responsável Pela Internação</span>
					<span class='ficha_valores_x3'>
							Nome: $resp_inte_nome
					</span>
					<span class='ficha_valores_x2'>
							Data de Nascimento: $resp_inte_data_nasc 
					</span>
					<span class='ficha_valores_x1'>
							CPF: $resp_inte_cpf 
					</span>
					<span class='ficha_linkis'>
						<a href='home.php'><img src='imagens/home.gif' border='0px'/></a>
						<img src='imagens/espaco.gif' width='4%' height='2%' />";
						if($_SESSION['UsuarioNivel']!=3){
							echo "<a href='editar_idoso.php?idos_id=$idos_id'><img src='imagens/editar_idoso.gif' border='0px'/></a>
							<img src='imagens/espaco.gif' width='4%' height='2%' />";
						}
						if($_SESSION['UsuarioNivel']==1){
							?>
                    		<a href='excluir_idoso.php?idos_id=<? echo $idos_id ?>'><img src='imagens/excluir_idoso.gif' border='0px' onclick="return confirm('Essa ação excluirá permanentemente este idoso e todos os dados relacionados a ele da base de dados. Você confirma esta ação?')" /></a>
							<?php 
						}
						if($_SESSION['UsuarioNivel']==2){
							echo "<a href='listar_idosos.php'><img src='imagens/todos.gif' border='0px'/></a>";
						}
                    	echo "<img src='imagens/espaco.gif' width='4%' height='2%' />
                    	<a href='#inicio'><img src='imagens/inicio.gif' border='0px'/>				
					</span>";	
					
					//for($i=0;$i<100;$i++){
						//echo "Vamos Ver<br>";
					//}
					echo"</div>";			
		?>
    </p>
    <div id='direita'></div>
		<div id='esquerda'></div>
        <div id='rodape'></div>
      </div>
	</body>
</html>