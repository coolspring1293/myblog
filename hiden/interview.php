<?php
$url = 'http://liuw53-wp.stor.sinaapp.com/interview%2Ftencent%2F2%2F';
$png = '.png';
for ($i = 1; $i <= 30; ++ $i) 
{
	echo '<img src="' . $url . $i . $png .'" alt="1"/><br/>';

}

for($i = 1; $i <= 4; ++ $i) 
{
	echo '<img src="' . $url . "10" . $i . $png .'" alt="1"/><br/>';

}
?>
