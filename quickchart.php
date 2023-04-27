<?php

if (PHP_OS == 'WINNT') {
	include('\Work\Clientes\PressManager\lib.pressmanager.com.br\lib_class.php');
}
else {
	include('/var/www/lib.pressmanager.com.br/lib_class.php');
}

include('pChart/class/pData.class.php'); 
include('pChart/class/pPie.class.php'); 
include('pChart/class/pDraw.class.php'); 
include('pChart/class/pImage.class.php');
		
$values = $_GET['chd'];
$labels = $_GET['chl'];
$colors = $_GET['chco'];
$size   = $_GET['chs'];

$values = str_replace('t:', '', $values);
$values = explode(',', $values);
$labels = explode('|', $labels);
$colors = explode(',', $colors);
list($width, $height) = explode('x', $size);

if ($height <= 150) {
	$radius = 40;
	$slice_height = 10;	
} else {
	$radius	 = 150;	
	$slice_height = 25;
}
	
$height = 500; // estou for�ando ser grande, mais depois fa�o um trim, caso contrario se tiver mta legenda no topo acaba cortando

$data = new pData();   
 
$data->addPoints($values,'Placar');
$data->addPoints($labels,'Label'); 
$data->setAbscissa('Label'); 

$myPicture = new pImage($width,$height,$data); 
$myPicture->setFontProperties( array( 'FontName'=>'pChart/fonts/verdana.ttf' , 'FontSize'=>8, 'R'=>102,'G'=>102,'B'=>102 ) ); 
 
$PieChart = new pPie($myPicture,$data);
foreach($colors as $key => $color) {
	$rgb = LibClass::hex2rgb($color);
	$PieChart->setSliceColor($key,array('R'=>$rgb[0],'G'=>$rgb[1],'B'=>$rgb[2]));
}

$PieChart->draw3DPie($width/2, $height/2, array('SliceHeight' => $slice_height, 'DrawLabels'=>TRUE , 'Border'=>false, 'LabelR' => 102, 'LabelG' => 102, 'LabelB' => 102, 'LabelStacked'=>true, 'Radius' => $radius) );
$PieChart->draw3DPie($width/2, $height/2, array('SliceHeight' => $slice_height, 'DrawLabels'=>TRUE , 'Border'=>false, 'LabelR' => 102, 'LabelG' => 102, 'LabelB' => 102, 'LabelStacked'=>true, 'Radius' => $radius) );
//$myPicture->autoOutput();

$img = LibClass::imagetrim($myPicture->Picture, imagecolorallocate($myPicture->Picture, 0xFF, 0xFF, 0xFF), 10, 0);
//$img = trim_image($myPicture->Picture);
header('Content-Type: image/png');
imagepng($img);

?>