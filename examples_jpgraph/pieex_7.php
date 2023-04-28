<?php // content="text/plain; charset=utf-8"
//$Id: pieex_7.php,v 1.1 2002/06/17 13:53:43 aditus Exp $
require_once ('../jpgraph/src/jpgraph.php');
require_once ('../jpgraph/src/jpgraph_pie.php');

// Some data
$data = array(27,23,10);

// A new graph
$graph = new PieGraph(350,200);
$graph->clearTheme();

// Setup title
$graph->title->Set("Por Tipo de Midia");
$graph->subtitle->Set('(Legenda do grafico)');
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// The pie plot
$p1 = new PiePlot($data);


// Move center of pie to the left to make better room
// for the legend
$p1->SetCenter(0.35,0.6);

// No border
$p1->ShowBorder(false);

// Label font and color setup
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");

// Use absolute values (type==1)
$p1->SetLabelType(PIE_VALUE_ABS);

// Label format
$p1->value->SetFormat("$%d");
$p1->value->HideZero();
$p1->value->Show();

// Size of pie in fraction of the width of the graph
$p1->SetSize(0.3);

// Legends
$p1->SetLegends(array("Site ($%d)","TV ($%d)","Rádio ($%d)"));
$graph->legend->Pos(0.05,0.3);

$graph->Add($p1);
$graph->Stroke('./img/pieex_7.png');
$graph->Stroke();
?>
