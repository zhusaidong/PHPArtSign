<?php
require_once("./common.php");

$name = '姓名';
if(isset($_GET['name']))
$name = $_GET['name'];

$font = '签名艺术字体';
if(isset($_GET['font']))
$font = $_GET['font'];

$savePath        = './DownLoadFont/';
$saveFontListFile= './FontList.txt';
$fontList = GetFontListArray($saveFontListFile,$savePath);
if(isset($fontList[$font]))
{
	echo
<<<eof
	<style>
	@font-face { 
		font-family: ArtSign_$font;
		src: url('$fontList[$font]');
	} 
	.text_$font
	{
		font-family:ArtSign_$font;
		font-size:30px;
	}
	</style>
	<div class="text_$font">
		$name
	</div>
eof;
}
