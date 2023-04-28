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
$graph->title->Set("Por tipos de Mídia");
$graph->title->SetFont(FF_VERDANA,FS_BOLD,14);
$graph->title->SetColor("brown");

// Create pie plot
$p1 = new PiePlot($data);
//$p1->SetSliceColors(array("red","blue","yellow","green"));
$p1->SetTheme("earth");

$p1->value->SetFont(FF_ARIAL,FS_NORMAL,10);
// Set how many pixels each slice should explode
$p1->Explode(array(0,15,15,25,15));


$graph->Add($p1);
$graph->Stroke('./img/pieex_1.png');
$graph->Stroke();

?>
