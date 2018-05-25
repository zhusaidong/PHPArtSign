<?php
require_once("config.php");
$fontList = $artSign->getFontLists();

$baseUrl = $artSign->getBaseUrl();

echo '
<table border="1" cellspacing="0">
	<tr>
		<td>
			字体名称
		</td>
		<td>
			image版
		</td>
		<td>
			html版
		</td>
	</tr>
	';
foreach($fontList as $key => $value)
{
	$get = 'name='.str_replace('字体','',$key).'&font='.$key;
	echo '
	<tr>
		<td>
			'.$key.'
		</td>
		<td>
			<img src="image.php?'.$get.'"/>
		</td>
		<td>
			'.file_get_contents($baseUrl.'/html.php?'.$get).'
		</td>
	</tr>
	';
}
echo '</table>';
