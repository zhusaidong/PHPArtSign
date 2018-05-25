<?php
$name = isset($_GET['name']) ? $_GET['name'] : '姓名';
$font = isset($_GET['font']) ? $_GET['font'] : '签名艺术字体';

require_once("config.php");
$fontList = $artSign->getFontLists();
if(isset($fontList[$font]))
{
	$im       = imagecreate((10 * 2 + 30 * strlen($name) / 2),80);
	$white    = imagecolorallocate($im,0xFF,0xFF,0xFF);
	imagefill($im,0,0,$white);
	//imagecolortransparent($im,$white);//透明
	$black    = imagecolorallocate($im,0x00,0x00,0x00);
	
	$fontPath = $artSign->isConvertEncoding ? mb_convert_encoding($fontList[$font],'gbk','utf-8') : $fontList[$font]; 
	imagettftext($im,30,0,10,50,$black,$fontPath,$name);
	header("Content-type:image/png");
	imagepng($im);
	imagedestroy($im);
}
