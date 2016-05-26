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
$user2 = new User(2, "leasunhy", "nopwd", "1.png", 45, 4545, 121);
$user3 = new User(3, "eden", "nopwd", "1.png", 5650, 4545, 1212);
$user4 = new User(4, "rose", "nopwd", "1.png", 5250, 4245, 4545457);
$user5 = new User(5, "mint", "nopwd", "1.png", 1554, 4554, 1234525);


$user_arr = array(
	 $user,
     $user2,
     $user3,
     $user4,
     $user5
);


$res = array(
	'status_code' => 200,
	'option_code' => 100,
	'user'=> $user_arr
);

$res_f = array(
	'status_code' => 500,
	'option_code' => 100,
	'user'=> $user
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
