<?php // content="text/plain; charset=utf-8"
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_pie.php');

// Some data
$data = array(15,1,1);

// Create the Pie Graph.
$graph = new PieGraph(300,200);
$graph->clearTheme();
$graph->SetShadow();

// Set A title for the plot
$graph->title->Set("Por tipo de Mídia");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Create
$p1 = new PiePlot($data);
$p1->SetLegends(array("Site","TV","Rário"));
$graph->Add($p1);
$graph->Stroke('./img/pieex_2.png');
$graph->Stroke();

?>
