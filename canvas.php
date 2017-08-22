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
	</style>
	<body></body>
	<script>
		var canvas = document.createElement('canvas');
		document.body.appendChild(canvas);
		var ctx = canvas.getContext('2d');
		ctx.font = "30px ArtSign_$font";
		ctx.fillText("$font",10,50);
	</script>
eof;
}
