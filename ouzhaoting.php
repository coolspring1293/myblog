<?php
session_start();
?>

<html xmlns="http://www.jb51.net/1999/xhtml"> 
<head>
<meta charset="utf-8" http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
<title>你感冒好了吗？</title> 
</head> 
<body> 
<p>请问你感冒好了吗？</p>
	<form name="form1" method="post" action=""> 
	<label> 
		<input type="radio" name="checkbox[]" value="多喝水，早睡觉!😂"> 
		没好
	</label> 
	<label> 
		<input type="radio" name="checkbox[]" value="好了又能怎样😂"> 	
		好了
    </label> 
   	<br>
    <br>
	<input type="text" name="code" />
	<img id="code" src="create_code.php" alt="看不清楚，换一张" style="cursor: pointer; vertical-align:middle;" onClick="create_code()"/>
	<!--<button type="button" onClick="create_code()">更换</button>-->
	<button type="submit">提交</button>
</form>
    
    

</body>
    
<script>
function create_code(){
    document.getElementByIdx_x('code').src = 'create_code.php?';
}
</script>
</html> 
<?php


// echo $_POST['code'], '<br>', $_SESSION['code'], '<br>';


if( $_POST ) 
{

	if($_POST['code'] == $_SESSION['code']){
  	  	$value = $_POST['checkbox']; 
		if($value)
		{
			echo implode(',',$value);

		}
		else
		{
		echo '选一个在提交啊😝';
		}
		//imagepng($QR, 'helloweba.png'); 
		echo '<img src="helloweba.png">', '<br>'; 
    
	}
    else{
        $ns = "";
        if($_SESSION['code'] == ns) {
        	echo '<span style="color:#ff2300">你没看见要输入验证码哈！</span>';    
        }
        else {
   			echo '<span style="color:#ff0400">验证码输错了，看来感冒没好！</span>';
		}
    }
} 


echo '<a href="http://ptgmedia.pearsoncmg.com/images/9780133387520/samplepages/0133387526.pdf" download="Cloud_Computing_Concepts_Technology_&_Architecture.pdf">Cloud Computing: Concepts, Technology & Architecture[PDF][DOWNLOAD]</a>', '<br>';


//输出图片 

?> 

