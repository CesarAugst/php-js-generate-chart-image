<?php

//Include the code
require_once '../phplot/phplot.php';

$data = array(
    array('', 10),
    array('', 20),
    array('', 30),
);
$plot = new PHPlot(800,600);
$plot->SetImageBorderType('plain');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
$plot->SetPlotType('pie');
$colors = array('red', 'green', 'blue', 'yellow', 'cyan');
$plot->SetDataColors($colors);
$plot->SetLegend(array('Site', 'TV', 'Radio'));
$plot->SetShading(0);
$plot->SetLabelScalePosition(0.2);
$plot->SetIsInline(true);
$plot->SetOutputFile('img/simple_pie_3.png');
$plot->DrawGraph();