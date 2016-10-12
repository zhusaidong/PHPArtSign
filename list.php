<?php
require_once("./common.php");

$savePath         = './DownLoadFont/';
$saveFontListFile = './FontList.txt';
$fontList         = GetFontListArray($saveFontListFile,$savePath);

$baseUrl = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER["REQUEST_URI"]).'/';

echo '<table border="1" cellspacing="0">';
echo '<tr>';
echo '<td>';
echo '字体名称';
echo '</td>';
echo '<td>';
echo 'image版';
echo '</td>';
echo '<td>';
echo 'html版';
echo '</td>';
echo '</tr>';
foreach($fontList as $key => $value)
{
	echo '<tr>';
	echo '<td>';
	echo $key;
	echo '</td>';
	echo '<td>';
	echo '<img src="image.php?name='.str_replace('字体','',$key).'&font='.$key.'"/>';
	echo '</td>';
	echo '<td>';
	echo GetData($baseUrl.'/html.php?name='.str_replace('字体','',$key).'&font='.$key);
	echo '</td>';
	echo '</tr>';
}
echo '</table>';
