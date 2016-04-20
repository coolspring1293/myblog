<?php 
header("Content-Type: text/html; charset=UTF-8");
//custom_hmac('sha1', 'Hello, world!', 'secret', true);
//echo json_decode($data); 

$time = time();
$dadte = $time;


//$url = 'https://api.thinkpage.cn/v3/weather/daily.json?key=z4ojdb7qslwlms76&location=beijing&language=zh-Hans&unit=c&start=0&days=5';
//$url2 = 'https://api.thinkpage.cn/v3/weather/now.json?key=z4ojdb7qslwlms76&location=beijing&language=zh-Hans&unit=c';
$key = "z4ojdb7qslwlms76";
$id = 'U6F9BBBCAB';
$algo = 'sha1';
$src = "ts=$dadte&ttl=30&uid=$id";
$key_ed = base64_encode(hash_hmac($algo,   $src, $key, true));

$url = "https://api.thinkpage.cn/v3/weather/now.json?location=beijing&$src&sig=$key_ed&callback=showWeather";


//hash_hmac($algo, $key, $key_ed);
echo "$dadte <br/>".base64_encode(hash_hmac($algo,   $src,  $key,  true))."<br/>".$url . "<br/>";


$data = file_get_contents($url);//目的页面内容获取
$t = json_decode($data,1);//转换为PHP数组
//var_dump(json_decode(≈, true)); 

//var_dump($t);
$str = $t["results"][0];
var_dump($t["results"][0]["location"]["name"]);

echo "<br/>$str<br/><br/><br/>";

var_dump($t);

?> 


<!--
array(1) { 
["results"]=> 
array(1) { [0]=> array(3) { 
	["location"]=> array(6) { ["id"]=> string(12) "WX4FBXXFKE4F" ["name"]=> string(6) "北京" ["country"]=> string(2) "CN" ["path"]=> string(20) "北京,北京,中国" ["timezone"]=> string(13) "Asia/Shanghai" ["timezone_offset"]=> string(6) "+08:00" }
	["now"]=> array(11) { ["text"]=> string(6) "多云" ["code"]=> string(1) "4" ["temperature"]=> string(2) "15" ["feels_like"]=> string(2) "15" ["pressure"]=> string(4) "1008" ["humidity"]=> string(2) "53" ["visibility"]=> string(3) "4.9" ["wind_direction"]=> string(6) "西南" ["wind_direction_degree"]=> string(3) "225" ["wind_speed"]=> string(5) "13.32" ["wind_scale"]=> string(1) "3" } ["last_update"]=> string(25) "2016-04-05T00:15:00+08:00" } 
	} 
	}

-->