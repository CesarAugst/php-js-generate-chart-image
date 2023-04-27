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


/* ficou muito lento
function trim_image($imgorg) {

	$width = imagesx($imgorg);
	$height = imagesy($imgorg);
			
	$img 		= imagecreatetruecolor($width, $height);
	$white 		= imagecolorallocate($img, 255, 255, 255);
	imagefill($img, 0, 0, $white);
	
	imagecopyresampled(
		$img, $imgorg,
		0, 0, 0, 0,
		$width, $height,
		$width, $height);
	
	$quality 	= 9;
	$valid_ext 	= 1;

	if($valid_ext){
		$img_top 		= 0;
		$img_bottom     = 0;
		$img_left 		= 0;
		$img_right 		= 0;

		//top
		for($img_top = 0; $img_top < imagesy($img); ++$img_top) {
		  for($x = 0; $x < imagesx($img); ++$x) {
			$rgb = imagecolorsforindex($img, imagecolorat($img, $x, $img_top));
			if( LibClass::iscolorwithinrange($rgb) ) {
			   break 2;
			}
		  }
		}

		//bottom
		for($img_bottom = 0; $img_bottom < imagesy($img); ++$img_bottom) {
		  for($x = 0; $x < imagesx($img); ++$x) {
			$rgb = imagecolorsforindex($img, imagecolorat($img, $x, imagesy($img) - $img_bottom-1));
			if( LibClass::iscolorwithinrange($rgb) ) {
			   break 2;
			}
		  }
		}

		//left
		for($img_left = 0; $img_left < imagesx($img); ++$img_left) {
		  for($y = 0; $y < imagesy($img); ++$y) {
			$rgb = imagecolorsforindex($img, imagecolorat($img, $img_left, $y));
			if( LibClass::iscolorwithinrange($rgb) ) {
			   break 2;
			}
		  }
		}

		//right
		for($img_right = 0; $img_right < imagesx($img); ++$img_right) {
		  for($y = 0; $y < imagesy($img); ++$y) {
			$rgb = imagecolorsforindex($img, imagecolorat($img, imagesx($img) - $img_right-1, $y));
			if( LibClass::iscolorwithinrange($rgb) ) {
			   break 2;
			}
		  }
		}
		
		$newimg_width = $width;
		if(($img_left + $img_right) < $width){
			$newimg_width = $width-($img_left+$img_right);
		}
		$newimg_height = $height;
		if(($img_top+$img_bottom) < $height){
			$newimg_height = $height-($img_top+$img_bottom);
		}		
		$newimg = imagecreatetruecolor($newimg_width, $newimg_height);		
		imagecopy($newimg, $img, 0, 0, $img_left, $img_top, $newimg_width, $newimg_height);	
		imagedestroy($img);
		unset($img);
		
		return $newimg;

	}

}		
*/
		
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