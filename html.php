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
	@font-face
	{ 
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
