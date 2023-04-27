<?php
require_once('../QuickChart.php');

$qc = new QuickChart();
$qc->setConfig("{
    type: 'pie',
    data: {
      labels: ['Site', 'TV', 'Rádio'],
      datasets: [{
        label: 'Tipos de Mídia',
        data: [15, 1, 1]
      }]
    }
  }");

echo $qc->getShortUrl();
// Or write it to a file
echo $qc->toFile('./img/short-url.png');
// Prints:
// https://quickchart.io/chart/render/zf-16815ac3-850f-4f5f-a79c-f6386c688f48
?>