<?php
header("Content-type: text/html; charset=utf-8");
require_once("./common.php");
$savePath         = './DownLoadFont/';
$saveFontListFile = './FontList.txt';
$fontList         = GetFontListArray($saveFontListFile,$savePath);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>
			PHPArtSign demo
		</title>
		<meta name="author" content="zsdroid">
		<style>
			body
			{
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h2>
			PHPArtSign demo
		</h2>
		<div class="html">
			<h3>
				html版PHPArtSign demo
			</h3>
			<form action="./html.php">
				<label for="">
					字体库:
					<select name="font">
						<option value="">
							选择字体库
						</option>
						<?php
						foreach($fontList as $key =>$value):?>
						<option value="<?=$key?>">
							<?=$key?>
						</option>
						<?php endforeach;?>
					</select>
				</label>
				<label for="">
					文本:
					<input type="text" name="name" value="" />
				</label>
				<label for="">
					<input type="submit" value="提交" />
				</label>
			</form>
		</div>
		<div class="image">
			<h3>
				image版PHPArtSign demo
			</h3>
			<form action="./image.php">
				<label for="">
					字体库:
					<select name="font">
						<option value="">
							选择字体库
						</option>
						<?php
						foreach($fontList as $key =>$value):?>
						<option value="<?=$key?>">
							<?=$key?>
						</option>
						<?php endforeach;?>
					</select>
				</label>
				<label for="">
					文本:
					<input type="text" name="name" value="" />
				</label>
				<label for="">
					<input type="submit" value="提交" />
				</label>
			</form>
		</div>
		<div>
			<a href="./list.php">
				点击查看字体效果列表
			</a>
		</div>
	</body>
</html>
