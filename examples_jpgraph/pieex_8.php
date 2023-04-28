<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_pie.php');

$data = array(40,60,31);

// A new pie graph
$graph = new PieGraph(250,200);
$graph->clearTheme();

// Title setup
$graph->title->Set("Por Tipo de Midia");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Setup the pie plot
$p1 = new PiePlot($data);

// Adjust size and position of plot
$p1->SetSize(0.4);
$p1->SetCenter(0.5,0.52);

// Setup slice labels and move them into the plot
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetLabelPos(0.6);

// Finally add the plot
$graph->Add($p1);

// ... and stroke it
$graph->Stroke('./img/pieex_8.png');
$graph->Stroke();

?>
