<?php

//Include the code
require_once '../phplot/phplot.php';

$data = array(
    array('', 100, 100, 200, 100),
    array('', 150, 100, 150, 100),
);
$plot = new PHPlot(800,600);
$plot->SetImageBorderType('plain');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
$plot->SetPlotType('pie');
$plot->SetIsInline(true);
$plot->SetOutputFile('img/simple_pie_2.png');
$plot->DrawGraph();