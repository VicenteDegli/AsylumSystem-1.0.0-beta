	Quando criamos um sistema web um pouco mais complexo temos a necessidade de gerar relatórios, uma forma de termos maior controle sobre a impressão, como forçar a impresão em paisagem, e a necessidade que muitos têm de armazenar estes relatórios nos levam a uma saída interessante: gerá-los no formato PDF.

	Neste tutorial vamos criar documentos PDF utilizando a classe PDF que pode ser baixada aqui.
<?php
	require_once("fpdf/fpdf.php");
 
	$pdf= new FPDF("P","pt","A4");
 
	$pdf->AddPage();
	$pdf->SetFont('arial','B',12);
	$pdf->Cell(0,5,"Boteco Digital",0,1,'L');
	$pdf->Ln(8);
	$pdf->Output("arquivo.pdf","D");

?>

Demo

Na linha 1 incluimos a classe FPDF. Na linha 3 criamos o documento PDF com as seguintes configurações:

Orientação: “P” Paisagem – (poderia ser retrato “L” )

Unidade de medida: “pt” – a unidade e medida é utilizada pelos métodos de escrita no documento PDF para determinar a posição onde o conteúdo deve ser escrito. As unidades aceitas são “pt”, “mm”, “cm” e “in”.

Formato: “A4″ – O formato utilizado pelas páginas.

Na linha 5 adicionamos uma nova página ao documento(a página inicial).

Na linha 6 modificamos a fonte do documento para “arial”, negrito “B”, tamanho “12″. A partir de agora todo texto que escrevermos no documento PDF terá estas configurações.

Na linha 7 escrevemos uma célula(área retangular) de texto no documento. Na ordem as configurações desta célula são:

Largura: Largura da célula(definidas pela unidade). Se 0, a célula se estende até a margem direita.
Altura: Altura da célula (definidas pela unidade).
Texto: Texto a ser impresso. Valor padrão: texto vazio.
Borda: Indica se as bordas devem ser desenhadas em volta da célula. Os valores aceitos são 0(sem borda), 1(com borda). Também é possível definir quais bordas serão desenhadas pela combinação das seguintes letras:
L: esquerda
T: acima
R: direita
B: abaixo
Nova linha: Indica onde a posição corrente deve ficar depois que a função for chamada. Os valores possíveis são:
0: à direita
1: no início da próxima linha
2: abaixo
Alinhamento Permite centralizar ou alinhar o texto. Os valores possíveis são: L(esquerda), C(centro), R(direita)
Na linha 8 temos uma quebra de linha com a altura de 8 unidades.

Na linha 9 mandamos o documento ser gerado e forçamos o download com o nome informado pelo primeiro argumento.Outras opções seriam:

I: envia o arquivo diretamente para o browser. Se o plug-in estiver instalado ele será usado. O nome indicado pelo por name e á usado quando se usa a opção “Salvar destino como” no link que gera o PDF.
D: envia para o browser e força o download do arquivo com o nome indicado por name.
F: salva em um arquivo local com o nome informado em name.
Vejamos agora um exemplo um pouco mais complexo

<?php
$nome = "Rodrigo";
$email = "blogbotecodigital@gmail.com";
$endereco = "Rua do Andradas 9999 nº 12";
$cep = "99999-999";
$cidade = "Urugaiana";
$estado = "RS";
$telefone= "9999-9999";
$observacoes = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis fringilla sagittis. Aliquam eu est dapibus justo commodo dapibus. Etiam aliquet, mauris id gravida suscipit, purus ligula venenatis nisi, eget dignissim elit ipsum a libero. In tristique vestibulum arcu sit amet mattis. Ut aliquet cursus consectetur. Fusce eu lacinia magna. Praesent laoreet sapien at est pulvinar nec facilisis sem mollis. Nulla eget congue tellus. Praesent id velit id sem volutpat condimentum ut at ligula. Phasellus libero leo, ultricies et eleifend et, mollis a metus. Duis adipiscing imperdiet luctus. Vestibulum pulvinar, dolor vel porttitor posuere, nisl est lacinia felis, nec gravida felis risus nec ante. Integer imperdiet, dui vitae pellentesque tempor, magna purus accumsan augue, eget hendrerit risus leo quis augue. Vivamus faucibus est quis ante placerat congue. ";
 
require_once("fpdf/fpdf.php");
 
$pdf= new FPDF("P","pt","A4");
 
 
$pdf->AddPage();
$pdf->Image('logog8.jpg');
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,"Ficha",0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(8);
 
 
//nome
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Nome:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(0,20,$nome,0,1,'L');
 
//email
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"E-mail:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$email,0,1,'L');
 
//Endereço
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Endereço:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$endereco,0,1,'L');
 
//cep
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"CEP:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$cep,0,1,'L');
 
//cidade
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Cidade:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$cidade,0,1,'L');
 
//Estado
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Estado:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$estado,0,1,'L');
 
$pdf->ln(10);
//Observações
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Observações:",0,1,'L');
$pdf->setFont('arial','',12);
$pdf->MultiCell(0,20,$observacoes,0,'J');
 
$pdf->Output("arquivo.pdf","D");
?>

Demo

Da linha 1 até a linha 8 temos os dados que serão mostrados na ficha. Nas linhas 10 a 14 já falamos no exemplo anterior

Na linha 15 inserimos uma imagem no PDF, note que devemos fornecer o endereço da imagem PATH ou URL. Outros parâmetros que podemos inserir são (na seqüência):

Image(string file [, float x [, float y [, float w [, float h [, string type]]]])

X: posição da imagem em relação ao eixo X.
Y: posição da imagem em relação ao eixo Y.
W: largura da imagem.
H: altura da imagem.
TYPE: tipo da imagem. S nõ for informado será detectado pela extensão.
Na linha 25 trocamos a fonte para Negrito – 26 inserimos um célula sem quebrar linha, para ao lado inserir o valor do campo. Na linha 27 inserimos o valor do nome.

Deste modo inserimos todos os dados até as observações.

Para inserir as observações, que podem facilmente ocupar várias linhas, utilizamos o método MultiCell que basicamente é o mesmo método Cell mas que pode ocupar várias linhas. Os parâmetros são basicamente os mesmo a não ser por aceitar a opção de alinhamento “J” de justificado.

Veremos agora um exemplo de como criar um tabela em PDF:
<?php
require_once("fpdf/fpdf.php");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
 
$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,"Relatório",0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(50);
 
//cabeçalho da tabela 
$pdf->SetFont('arial','B',14);
$pdf->Cell(130,20,'Coluna 1',1,0,"L");
$pdf->Cell(140,20,'Coluna 2',1,0,"L");
$pdf->Cell(130,20,'Coluna 3',1,0,"L");
$pdf->Cell(160,20,'Coluna 4',1,1,"L");
 
//linhas da tabela
$pdf->SetFont('arial','',12);
for($i= 1; $i <10;$i++){
    $pdf->Cell(130,20,"Linha ".$i,1,0,"L");
    $pdf->Cell(140,20,rand(),1,0,"L");
    $pdf->Cell(130,20,rand(),1,0,"L");
    $pdf->Cell(160,20,rand(),1,1,"L");
}
$pdf->Output("arquivo.pdf","D");

?>