<?php
$name = isset($_GET['name']) ? $_GET['name'] : '姓名';
$font = isset($_GET['font']) ? $_GET['font'] : '签名艺术字体';

require_once("config.php");
$fontList = $artSign->getFontLists();

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
