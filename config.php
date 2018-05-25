<?php
/**
* config
* @author zhusaidong [zhusaidong@gmail.com]
*/
header("Content-type: text/html; charset=utf-8");

require_once("ArtSign.php");

$fontPath     = 'DownLoadFont/';
$fontListFile = 'FontList.txt';

$artSign = new ArtSign($fontListFile,$fontPath);
