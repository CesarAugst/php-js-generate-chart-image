<?php
require_once('../QuickChart.php');

$qc = new QuickChart(array(
    'width'=> 500,
  'height'=> 300,
  'version'=> '2.9.4',
));

$config = <<<EOD
{
  type: 'doughnut',
  data: {
    labels: ['Site', 'TV', 'Rádio'],
    datasets: [
      {
        data: [15, 1, 1],
      },
    ],
  },
  options: {
    plugins: {
      datalabels: {
        display: true,
        backgroundColor: '#ccc',
        borderRadius: 3,
        font: {
          color: 'red',
          weight: 'bold',
        },
      },
      doughnutlabel: {
        labels: [
          {
            text: '17',
            font: {
              size: 20,
              weight: 'bold',
            },
          },
          {
            text: 'total',
          },
        ],
      },
    },
  },
}
EOD;

// Chart config can be set as a string or as a nested array
$qc->setConfig($config);
// Or write it to a file
echo $qc->toFile('./img/pie-label-1.png');
// Print the chart URL
echo $qc->getUrl();
// Prints:
// https://quickchart.io/chart?c=%7B%0A++++type%3A+%27bar%27%2C%0A++++data%3A+%7B%0A++++++labels%3A+%5B%27Q1%27%2C+%27Q2%27%2C+%27Q3%27%2C+%27Q4%27%5D%2C%0A++++++datasets%3A+%5B%7B%0A++++++++label%3A+%27Users%27%2C%0A++++++++data%3A+%5B50%2C+60%2C+70%2C+180%5D%0A++++++%7D%5D%0A++++%7D%0A++%7D&w=500&h=300&devicePixelRatio=1.0&format=png&bkg=transparent
?>