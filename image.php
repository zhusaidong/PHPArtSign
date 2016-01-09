<?php
require_once("./common.php");

$name = '姓名';
if(isset($_GET['name']))
$name = $_GET['name'];

$font = '签名艺术字体';
if(isset($_GET['font']))
$font     = $_GET['font'];

$savePath        = './DownLoadFont/';
$saveFontListFile= './FontList.txt';
$fontList = GetFontListArray($saveFontListFile,$savePath);
if(isset($fontList[$font]))
{
	$im       = imagecreate((10 * 2 + 30 * strlen($name) / 2),80);
	$white    = imagecolorallocate($im,0xFF,0xFF,0xFF);//200,200,200);
	imagefill($im,0,0,$white);
	//imagecolortransparent($im,$white);//透明
	$black    = imagecolorallocate($im,0x00,0x00,0x00);
	imagettftext($im,30,0,10,50,$black,$fontList[$font],$name);
	header("Content-type:image/png");
	imagepng($im);
	imagedestroy($im);
}
