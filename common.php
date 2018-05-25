<?php
header("Content-type: text/html; charset=utf-8");
/**
* 获取字体列表
* @param string $file 文件路径
* @param string $path 字体列表路径
*
* @return array 字体列表
*/
function GetFontListArray($file = 'FontList.txt',$path = 'DownLoadFont/')
{
	$data = parse_ini_file($file);
	$data = array_flip($data);
	foreach($data as $key => $value)
	{
		$data[$key] = $path.$data[$key];
	}
	return $data;
}
/**
* 字体下载
* @param array $fontList font 列表
* @param string $savePath 保存字体路径
* @param string $saveFontListFile 保存字体列表路径
*/
function FontDownLoad($fontList = array(),$savePath,$saveFontListFile)
{
	for($i = 0; $i < count($fontList); $i++)
	{
		$font = $fontList[$i];
		SaveFont($font,$savePath,$saveFontListFile);
	}
}
/**
* 保存 字体
* @param array $font 字体列表
* @param string $savePath 保存字体路径
* @param string $saveFontListFile 保存字体列表路径
*/
function SaveFont($font,$savePath,$saveFontListFile)
{
	$path = $font['path'];
	$save = GetName($path);
	SaveData($savePath.$save,GetData($path));
	SaveFontList($saveFontListFile,$save.'='.$font['name']);
}
/**
* 获取 url的文件名
* @param string $url url
* 
* @return string 文件名
*/
function GetName($url = '')
{
	$info = pathinfo($url);
	return $info['basename'];
}
/**
* 保存 font 列表
* @param string $data font 列表 数据
*/
function SaveFontList($saveFontListFile,$data = '')
{
	SaveData($saveFontListFile,$data."\n",TRUE);
}
/**
* 保存数据
* @param string $path 保存路径
* @param string $data 数据
* @param boolean $isFILEAPPEND 是否追加
* 
* @return
*/
function SaveData($path = '',$data = '',$isFILEAPPEND = FALSE)
{
	if($isFILEAPPEND)
	{
		file_put_contents($path,$data,FILE_APPEND);
	}
	else
	{
		file_put_contents($path,$data);
	}
}
/**
* 抓取数据
* @param string $url url
* 
* @return string data
*/
function GetData($url = '')
{
	return file_get_contents($url);
}
