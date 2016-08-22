<?php

header("Content-Type: text/html; charset=UTF-8");

class User
{
	public $id;
	public $rank;
	public $name;
	public $password;
	public $avatar;
	public $continuousDays;
	public $goldCoinAmount;
	public $goldCoinToday;

	public function __construct($i, $n, $p, $a, $cd, $ga, $gt)
	{
		$this->id = $i;
		$this->rank = -1;
		$this->name = $n;
		$this->password = $p;
		$this->avatar = $a;
		$this->continuousDays = $cd;
		$this->goldCoinAmount = $ga;
		$this->goldCoinToday = $gt;
	} 
}




$user = new User(1, "liuw53", "nopwd", "1.png", 10, 100, 19);


$res = array(
	'status_code' => 200,
	'option_code' => 100,
	'user'=> $user,
    'now'=> "Lab Assistant out now, any problem please call me at 18814091386"
);

$res_f = array(
	'status_code' => 500,
	'option_code' => 100,
	'user'=> $user,
    'now'=> "Lab Assistant out now, any problem please call me at 18814091386"
);

$content=trim($_GET['content']);
$username=trim($_GET['username']);
$password=trim($_GET['password']);
$option=trim($_GET['option']);

$id=trim($_GET['id']);

if ($id == 1) {
	  echo json_encode($res);  
}
else {
	echo json_encode($res_f);    

}





