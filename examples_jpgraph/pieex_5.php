<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_pie.php');

$data = array(40,60,21);

// Setup graph
$graph = new PieGraph(300,200);
$graph->clearTheme();
$graph->SetShadow();

// Setup graph title
$graph->title->Set("Por Tipo de Midia");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Create pie plot
$p1 = new PiePlot($data);
$p1->value->SetFont(FF_VERDANA,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.3);
$p1->SetCenter(0.4);
$p1->SetLegends(array("Site","TV","Rádio"));
//$p1->SetStartAngle(M_PI/8);
$p1->ExplodeSlice(2);

$graph->Add($p1);

$graph->Stroke('./img/pieex_5.png');
$graph->Stroke();

?>
