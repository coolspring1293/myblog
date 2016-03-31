<?php
session_start();
header("Content-type: text/html; charset=utf-8");
 
if($_POST['code'] == $_SESSION['code']){
    echo '我只能告诉你，你的验证码输对了，其他的功能你帮我想想吧！';
}else{
    echo '我只能告诉你，你的验证码输错了，其他的功能你帮我想想吧！';
}

?>


<form action="ucl.php" method="post">
<button>返回</button>
</form>