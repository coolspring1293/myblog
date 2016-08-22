<!DOCTYPE html>
<html>
<head>
	<title>To short link</title>
    <SCRIPT>
function CopyAll(T)
{
T.focus() //得到文本框焦点
T.select() //全选文本框
if (document.all){
therange=T.createTextRange()
therange.execCommand("Copy") //复制
}
}
</SCRIPT>
</head>
<body>
<center>
<h1>Get Short Links(Weibo)</h1>
<form action="shortlink.php" method="get">
Long Link(Contains http(s)): <input type="text" name="longlink" value="http://">
<input type="submit" name="Submit">
</form>
<?php
$ll = $_GET["longlink"];
if($ll != null) {
	$url = 'http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long=' . $ll;
	$data = file_get_contents($url);//目的页面内容获取
	$t = json_decode($data,1);//转换为PHP数组
    echo '<br/><TEXTAREA NAME="text1" COLS="40" ROWS="5">' . $t[0]["url_short"] .'</TEXTAREA> <br/>';
    echo '<INPUT TYPE="BUTTON" VALUE="Copy" onclick="CopyAll(text1)" >';
    echo '<a href="'. $t[0]["url_short"] . '">Test</a> <a href="index.php">Back</a>';
    
}
?>

</center>
</body>
</html>

