<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_pie.php');

$data = array(40,60,21);

$graph = new PieGraph(300,200);
$graph->clearTheme();
$graph->SetShadow();

$graph->title->Set("Por Tipo de Mídia");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("Site","TV","Rádio"));
$graph->Add($p1);

$graph->Stroke('./img/pieex_4.png');
$graph->Stroke();


?>
