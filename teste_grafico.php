<?php 
require_once 'phplot/phplot.php';
//require_once 'phplot/rgb.inc.php';

$plot = new PHPlot;

#Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
$plot->SetTitle("Gráfico de exemplo");
$plot->SetXTitle("Eixo X");
$plot->SetYTitle("Eixo Y");


#Definimos os dados do gráfico
$dados = array(
		array('Janeiro', 10),
		array('Fevereiro', 5),
		array('Março', 4),
		array('Abril', 8),
		array('Maio', 7),
		array('Junho', 5),
);

$plot->SetDataValues($dados);
 
#Neste caso, usariamos o gráfico em barras
$plot->SetPlotType("bars");

#Exibimos o gráfico
$plot->DrawGraph();
?>