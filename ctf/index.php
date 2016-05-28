<?php
#$a='Hello world!';
$test = 'http://localhost/~liuw53/t/index.php?password[]=1';

echo "<h1>CTF Learning</h1>";

echo "<h2>PHP类型转换</h2>";

echo "if you use like \"$test\" GET," , "<br/>"," you can cross the password checking!";

$password = $_GET['password'];
#$a=True;
#echo gettype($a);
if(strcmp('aaa', $password))
{
    echo 'NO!';
}
else
{
    echo 'YES!';
}
#echo ord('a');
?>