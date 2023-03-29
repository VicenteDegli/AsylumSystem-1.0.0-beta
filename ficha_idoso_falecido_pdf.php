<?php
//inclusão da biblioteca
require('fpdf/fpdf.php');


//criamos então um objeto FPDF com os valores padrões, já que não foi especificado
//nenhum parâmetro como tamanho da página, a unidade de media entre outros que veremos posteriormente
$pdf = new FPDF('P','cm','A4');
$pdf->SetMargins(0.6,0.5,0.6);
$pdf->SetAutoPageBreak(1,1);
//$pdf->Line(0,0,5,5);
//Inserimos uma página
$pdf->AddPage();
#aplicamos então a formatação informando o tipo de fonte, o estilo e o tamanho dela
$pdf->SetFont('Arial','',16);

#é aqui que criamos o conteúdo da página, esse método só deve ser inserido 
#após formatar a página
#são informadas as distâncias da margem (superior e esquerda) e em seguida colocamos 
#o texto a ser impresso
$pdf->SetAuthor('Vicente de Paulo Degli Esposti',1);
$pdf->SetTitle('Abrigo dos Velhos José Lima',1);

$str = iconv('UTF-8', 'windows-1252', 'Abrigo dos Velhos José Lima');
$pdf->Cell(0,0.7,$str,0,1,'C');

//$str = iconv("UTF-8", "windows-1252", "Rua Pedro Rodrigues Carmo, 6  Centro - Bom Jesus do Itabapoana - RJ 28360-000‎ Tel: (22) 3831-1326");
$pdf->SetFont('Arial','',10);
$pdf->Cell(12.4,0.5,'Rua Pedro Rodrigues Carmo, 6  Centro - Bom Jesus do Itabapoana',0,0,'R');
$pdf->Cell(2.5,0.5,'- RJ 28360-000',0,0,'C');
$pdf->Cell(0,0.5,'Tel: (22) 3831-1326',0,1,'L');

$pdf->SetFont('Arial','',13);
$str = iconv('UTF-8', 'windows-1252', 'Ficha do Idoso');
$pdf->Cell(0,0.8,$str,0,1,'C');

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
											responsaveis_internacoes g,
											obitos o
											
									    WHERE (a.pess_id = b.idos_pess_id) AND 
											  (c.exam_idoso_id = b.idos_id) AND
											  (d.docu_idoso_id = b.idos_id) AND			  										  
											  (b.idos_id = f.idos_resp_idos_id) AND
											  (f.idos_resp_resp_id = e.resp_id) AND
											  (b.idos_resp_inte_id = g.resp_inte_id) AND
											  (o.obit_idoso_id = b.idos_id) AND
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
					
					//Pegando dados do óbito
					$obit_causa=$registro['obit_causa'];
					$obit_local=$registro['obit_local'];
					$obit_extre_uncao=$registro['obit_extre_uncao'];
					$obit_data_falecimento=$registro['obit_data_falecimento'];
					$obit_data_falecimento = implode("/",array_reverse(explode("-",$obit_data_falecimento)));

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

//cabeçalho da tabela 
$pdf->SetFont('arial','',10);
$pdf->Ln(0.2);

$str = iconv('UTF-8', 'windows-1252', "Nome: ".$idos_nome);
$pdf->Cell(8.5,0.6,$str,'BR',0,"L");

if($docu_identidade==1){
	$str = iconv('UTF-8', 'windows-1252', "RG: ".$iden_numero);
	$str1= iconv('UTF-8', 'windows-1252', "Orgão Expeditor: ".$iden_orgao);
}
else{
	$str = "RG: Pendente";
	$str1 = iconv('UTF-8', 'windows-1252', "Orgão Expeditor: XXXXXX");
}
$pdf->Cell(3.3,0.6,$str,'BR',0,"L");
$pdf->Cell(5,0.6,$str1,'BR',0,"L");

if($idos_sexo=='m'){
	$str = "Sexo: Masculino";
}
else{
	$str = "Sexo: Feminino";
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$str = iconv('UTF-8', 'windows-1252', "Data de Nascimento: ".$idos_data_nasc);
$pdf->Cell(6,0.6,$str,'BR',0,"L");

$str = "CPF: ".$idos_cpf;
$pdf->Cell(4.5,0.6,$str,'BR',0,"L");

if($idos_tipo_sanguineo==''){
	$str = iconv('UTF-8', 'windows-1252', "Tipo Sanguíneo: XX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Tipo Sanguíneo: ".$idos_tipo_sanguineo);
}
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($idos_estd_civil==1){
	$str = "Estado Civil: Casado(a)";
}
else if($idos_estd_civil==2){
	$str = "Estado Civil: Solteiro(a)";
}
else if($idos_estd_civil==3){
	$str = "Estado Civil: Viuvo(a)";
}
else if($idos_estd_civil==4){
	$str = "Estado Civil: Divorciado(a)";
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_cor==1){
	$str = iconv('UTF-8', 'windows-1252', "Etinia: Branco(a)");
}
else if($idos_cor==2){
	$str = iconv('UTF-8', 'windows-1252', "Etinia: Negro(a)");
}
else if($idos_cor==3){
	$str = iconv('UTF-8', 'windows-1252', "Etinia: Índio(a)");
}
else if($idos_cor==4){
	$str = iconv('UTF-8', 'windows-1252', "Etinia: Pardo(a)");
}
$pdf->Cell(3.2,0.6,$str,'BR',0,"L");

if($docu_titulo==1){
	$str = iconv('UTF-8', 'windows-1252', "Título de Eleitor: ".$titu_numero);
	$str1= iconv('UTF-8', 'windows-1252', "Zona: ".$titu_zona);
	$str2= iconv('UTF-8', 'windows-1252', "Seção: ".$titu_secao);
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Título de Eleitor: Pendente");
	$str1= iconv('UTF-8', 'windows-1252', "Zona: XXXX");
	$str2= iconv('UTF-8', 'windows-1252', "Seção: XXXX");
}

$pdf->Cell(6,0.6,$str,'BR',0,"L");
$pdf->Cell(2.7,0.6,$str1,'BR',0,"L");
$pdf->Cell(2.7,0.6,$str2,'BR',0,"L");

if($docu_cart_trab==1){
	$str = iconv('UTF-8', 'windows-1252', "Carteira de Trabalho: ".$cart_numero);
	$str1= iconv('UTF-8', 'windows-1252', "Série: ".$cart_serie);
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Carteira de Trabalho: Pendente");
	$str1= iconv('UTF-8', 'windows-1252', "Série: XXXXXX");
}

$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$pdf->Cell(3.5,0.6,$str1,'BR',0,"L");

$str = iconv('UTF-8', 'windows-1252', "Pai: ".$idos_pai);
$pdf->Cell(8,0.6,$str,'BR',0,"L");
$str = iconv('UTF-8', 'windows-1252', "Mãe: ".$idos_mae);
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$str = iconv('UTF-8', 'windows-1252', "Profissão: ".$idos_profissao);
$pdf->Cell(5,0.6,$str,'BR',0,"L");

$str = iconv('UTF-8', 'windows-1252', "Data de Ingresso: ".$idos_data_ingresso);
$pdf->Cell(5,0.6,$str,'BR',0,"L");

$str = iconv('UTF-8', 'windows-1252', "Nº de Filhos: ".$idos_qtde_filhos);
$pdf->Cell(2.8,0.6,$str,'BR',0,"L");

if($idos_batizado==1){
	$str = iconv('UTF-8', 'windows-1252', "Recebeu Batizmo: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Recebeu Batizmo: NÃO");
}
$pdf->Cell(3.9,0.6,$str,'BR',0,"L");

if($idos_tem_bens==1){
	$str = iconv('UTF-8', 'windows-1252', "Possui Bens: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Possui Bens: NÃO");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_grau_instrucao==1){
	$str = iconv('UTF-8', 'windows-1252', "Grau de Instrução: Nível Fundamental");
}
else if($idos_grau_instrucao==2){
	$str = iconv('UTF-8', 'windows-1252', "Grau de Instrução: Nível Fundamental Incompleto");
}
else if($idos_grau_instrucao==3){
	$str = iconv('UTF-8', 'windows-1252', "Grau de Instrução: Nível Médio");
}
else if($idos_cor==1){
	$str = iconv('UTF-8', 'windows-1252', "Grau de Instrução: Nível Superior");
}
$pdf->Cell(8.2,0.6,$str,'BR',0,"L");

if($idos_casm_relig==1){
	$str = iconv('UTF-8', 'windows-1252', "Casamento Religioso: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Casamento Religioso: NÃO");
}
$pdf->Cell(4.8,0.6,$str,'BR',0,"L");

if($idos_mant_familia==1){
	$str = iconv('UTF-8', 'windows-1252', "Mantem Família: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Mantem Família: NÃO");
}
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($idos_eleitor==1){
	$str = iconv('UTF-8', 'windows-1252', "Eleitor: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Eleitor: NÃO");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_inter_ord_jud==1){
	$str = iconv('UTF-8', 'windows-1252', "Interno Por Ordem Judicial: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Interno Por Ordem Judicial: NÃO");
}
$pdf->Cell(5.3,0.6,$str,'BR',0,"L");

if($idos_livre_espo_vontd==1){
	$str = iconv('UTF-8', 'windows-1252', "Interno por livre e espontãnea vontade: SIM");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Interno por livre e espontãnea vontade: NÃO");
}
$pdf->Cell(7.3,0.6,$str,'BR',0,"L");

if($docu_regi_casamento==0){
	$str = iconv('UTF-8', 'windows-1252', "Certidão de Casamento: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Certidão de Casamento: APRESENTADO");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($docu_regi_nascimento==0){
	$str = iconv('UTF-8', 'windows-1252', "Certidão de Nascimento: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Certidão de Nascimento: APRESENTADO");
}
$pdf->Cell(7,0.6,$str,'BR',0,"L");

if($idos_sus_nacional==''){
	$str = iconv('UTF-8', 'windows-1252', "Nº Nacional do SUS: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Nº Nacional do SUS: ".$idos_sus_nacional);
}
$pdf->Cell(7.5,0.6,$str,'BR',0,"L");

if($idos_sus_nacional==''){
	$str = iconv('UTF-8', 'windows-1252', "Nº Municipal do SUS: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Nº Municipal do SUS: ".$idos_sus_municipal);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_valor_contribuicao==''){
	$str = iconv('UTF-8', 'windows-1252', "Contribuição: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Contribuição: R$".$idos_valor_contribuicao.",00");
}
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($idos_endereco==''){
	$str = iconv('UTF-8', 'windows-1252', "Endereço: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Endereço: ".$idos_endereco);
}
$pdf->Cell(8,0.6,$str,'BR',0,"L");

if($idos_bairro==''){
	$str = iconv('UTF-8', 'windows-1252', "Bairro: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Bairro: ".$idos_bairro);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_cidade==''){
	$str = iconv('UTF-8', 'windows-1252', "Cidade: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Cidade: ".$idos_cidade);
}
$pdf->Cell(8,0.6,$str,'BR',0,"L");

if($idos_uf==''){
	$str = iconv('UTF-8', 'windows-1252', "Estado: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Estado: ".$idos_uf);
}
$pdf->Cell(2.5,0.6,$str,'BR',0,"L");

if($idos_cep==''){
	$str = iconv('UTF-8', 'windows-1252', "CEP: : XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "CEP: ".$idos_cep);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($idos_pertences==''){
	$str = iconv('UTF-8', 'windows-1252', "Pertences: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Pertences: ".$idos_pertences);
}

if($idos_pertences!=''){
	$pdf->MultiCell(0,0.6,$str,'B','J',0);
	$pdf->Ln(0.2);
}
$pdf->SetFont('arial','',12);
$pdf->Cell(0,0.8,'Exames',0,1,"C");

$pdf->SetFont('arial','',10);
if($exam_pa==0){
	$str = iconv('UTF-8', 'windows-1252', "Exame de PA: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Exame de PA: APRESENTADO");
}
$pdf->Cell(5.4,0.6,$str,'BR',0,"L");

if($exam_soro_lues==0){
	$str = iconv('UTF-8', 'windows-1252', "Soro Lues: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Soro Lues: APRESENTADO");
}
$pdf->Cell(4.9,0.6,$str,'BR',0,"L");

if($exam_rx_torax==0){
	$str = iconv('UTF-8', 'windows-1252', "RX do torax: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "RX do torax: APRESENTADO");
}
$pdf->Cell(5,0.6,$str,'BR',0,"L");

if($exam_receitas==0){
	$str = iconv('UTF-8', 'windows-1252', "Apresentou Receitas: NÃO");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Apresentou Receitas: SIM");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($exam_urina==0){
	$str = iconv('UTF-8', 'windows-1252', "Exame de Urina: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Exame de Urina: APRESENTADO");
}
$pdf->Cell(7,0.6,$str,'BR',0,"L");

if($exam_fezes==0){
	$str = iconv('UTF-8', 'windows-1252', "Exame de Fezes: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Exame de Fezes: APRESENTADO");
}
$pdf->Cell(7,0.6,$str,'BR',0,"L");

if($exam_contagioso==0){
	$str = iconv('UTF-8', 'windows-1252', "Possui Doença Contagiosa: NÃO");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Possui Doença Contagiosa: SIM");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($exam_hemo_completo==0){
	$str = iconv('UTF-8', 'windows-1252', "Hemograma Completo: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Hemograma Completo: APRESENTADO");
}
$pdf->Cell(7,0.6,$str,'BR',0,"L");

if($exam_ecg==0){
	$str = iconv('UTF-8', 'windows-1252', "Ecocardiograma: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Ecocardiograma: APRESENTADO");
}
$pdf->Cell(6.5,0.6,$str,'BR',0,"L");

if($exam_decl_medica==0){
	$str = iconv('UTF-8', 'windows-1252', "Declaração Médica: PENDENTE");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Declaração Médica: APRESENTADO");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',12);
$str = iconv('UTF-8', 'windows-1252', "Responsável por Idoso");
$pdf->Cell(0,0.8,$str,0,1,"C");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',10);

$str = iconv('UTF-8', 'windows-1252', "Nome: ".$resp_nome);
$pdf->Cell(8.5,0.6,$str,'BR',0,"L");

if($resp_cpf==''){
	$str = iconv('UTF-8', 'windows-1252', "CPF: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "CPF: ".$resp_cpf);
}
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($resp_data_nasc=='00/00/0000'){
	$str = iconv('UTF-8', 'windows-1252', "Data de Nascimento: xx/xx/xxxx");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Data de Nascimento: ".$resp_data_nasc);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($resp_identidade==''){
	$str = iconv('UTF-8', 'windows-1252', "RG: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "RG: ".$resp_identidade);
}
$pdf->Cell(3.3,0.6,$str,'BR',0,"L");

if($resp_telefone==''){
	$str = iconv('UTF-8', 'windows-1252', "Tel: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Tel(s): ".$resp_telefone." - ".$resp_telefones);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($resp_endereco==''){
	$str = iconv('UTF-8', 'windows-1252', "Endereço: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Endereço: ".$resp_endereco);
}
$pdf->Cell(8,0.6,$str,'BR',0,"L");

if($resp_bairro==''){
	$str = iconv('UTF-8', 'windows-1252', "Bairro: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Bairro: ".$resp_bairro);
}
$pdf->Cell(6,0.6,$str,'BR',0,"L");

if($resp_cidade==''){
	$str = iconv('UTF-8', 'windows-1252', "Cidade: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Cidade: ".$resp_cidade);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

if($resp_uf==''){
	$str = iconv('UTF-8', 'windows-1252', "Estado: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Estado: ".$resp_uf);
}
$pdf->Cell(2.5,0.6,$str,'BR',0,"L");

if($resp_cep==''){
	$str = iconv('UTF-8', 'windows-1252', "CEP: : XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "CEP: ".$resp_cep);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',12);
$str = iconv('UTF-8', 'windows-1252', "Responsável pela Internação");
$pdf->Cell(0,0.8,$str,0,1,"C");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',10);

$str = iconv('UTF-8', 'windows-1252', "Nome: ".$resp_inte_nome);
$pdf->Cell(8.5,0.6,$str,'BR',0,"L");

if($resp_inte_cpf==''){
	$str = iconv('UTF-8', 'windows-1252', "CPF: XXXXXX");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "CPF: ".$resp_inte_cpf);
}
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($resp_inte_data_nasc=='00/00/0000'){
	$str = iconv('UTF-8', 'windows-1252', "Data de Nascimento: xx/xx/xxxx");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Data de Nascimento: ".$resp_inte_data_nasc);
}
$pdf->Cell(0,0.6,$str,'B',1,"L");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',12);
$str = iconv('UTF-8', 'windows-1252', "Óbito");
$pdf->Cell(0,0.8,$str,0,1,"C");
$pdf->Ln(0.2);

$pdf->SetFont('arial','',10);

$str = iconv('UTF-8', 'windows-1252', "Causa: ".$obit_causa);
$pdf->Cell(8,0.6,$str,'BR',0,"L");

$str = iconv('UTF-8', 'windows-1252', "Local: ".$obit_local);
$pdf->Cell(4,0.6,$str,'BR',0,"L");

$str = iconv('UTF-8', 'windows-1252', "Data: ".$obit_data_falecimento);
$pdf->Cell(4,0.6,$str,'BR',0,"L");

if($obit_extre_uncao == 0){
	$str = iconv('UTF-8', 'windows-1252', "Extrema Unção: NÃO");
}
else{
	$str = iconv('UTF-8', 'windows-1252', "Extrema Unção: SIM");
}
$pdf->Cell(0,0.6,$str,'B',1,"L");


// Vai para 1.5 cm da borda inferior
$pdf->SetY(-1);
// Seleciona Arial itálico 8
$pdf->SetFont('Arial','I',8);
// Imprime o número da página centralizado
$str = iconv('UTF-8', 'windows-1252', "Página ");
$pdf->Cell(0,0,$str.$pdf->PageNo(),0,0,'L');


$pdf->SetY(-1);
// Seleciona Arial itálico 8
$pdf->SetFont('Arial','I',8);
// Imprime o número da página centralizado
$str = iconv('UTF-8', 'windows-1252', "Página ");
$pdf->Cell(0,0,date("d/m/Y"),0,0,'R');
//    02299887766 Endereço: Rua Barros Guimarães,    Bairro: Lia Mácia - Bom Jesus do Itabapoana - RJ - CEP: 28360000
//aqui encerramos o arquivo e enviamos o mesmo para o navegador
//esta linha não deve estar antes de terminar de escrever o conteúdo da página,
//pois ela é responsável por gerar a  saída do arquivo PDF
$pdf->Output();

?>
