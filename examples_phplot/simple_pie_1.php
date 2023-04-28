<?php

//Include the code
require_once '../phplot/phplot.php';

# The data labels aren't used directly by PHPlot. They are here for our
# reference, and we copy them to the legend below.
$data = array(
    array('Site', 7849),
    array('TV', 299),
    array('Radio', 5447),
);
$plot = new PHPlot(800,600);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
# Set enough different colors;
$plot->SetDataColors(array('red', 'green', 'blue'));
# Main plot title:
$plot->SetTitle("Por Tipos de Midia\n(Nossa legenda)");
# Build a legend from our data array.
# Each call to SetLegend makes one line as "label: value".
foreach ($data as $row)
    $plot->SetLegend(implode(': ', $row));
# Place the legend in the upper left corner:
$plot->SetLegendPixels(5, 5);
$plot->SetIsInline(true);
$plot->SetOutputFile('img/simple_pie_1.png');
$plot->DrawGraph();