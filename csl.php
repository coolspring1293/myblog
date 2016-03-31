<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>Chinese Super League</title>  
  </head>
  <body>
<?php
//header("Content-type: text/html; charset=utf-8");

$con = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("app_liuw53", $con);

$sql_select = "select *, GA-GL as G, W*3+D as Pts from team order by W*3+D desc, GA-GL desc, GA desc, en asc";

$result = mysql_query($sql_select);

echo "<img src='csl_logos/Chinese_Super_League_Logo.png'>", "<br>";
echo "<h1>Chinese Super League</h1>";
echo "<h2>中国足球超级联赛积分榜</h2>";

echo "<table border='1'>
<tr>
  <th>Number</th>
  <th>Logo</th>
  <th>English Name</th>
  <th>Chinese Name</th>
  <th>Station</th>
  <th>Contain</th>
  <th>Coach</th>
  <th>场次</th>
  <th>胜场</th>
  <th>平局</th>
  <th>负场</th>
  <th>进失球</th>
  <th>净胜球</th>
  <th>积分</th>
</tr>";

$count = 1;

while($row = mysql_fetch_array($result))
  {
  $tmp_name = $row['en'];
  echo "<tr>";
  echo "<td>" . "$count" . "</td>";
  echo "<td>" . "<img src='csl_logos/" . $tmp_name . ".png'  height='50'/>" . "</td>";
  echo "<td>" . str_replace('_', ' ', $tmp_name) . "</td>";
  echo "<td>" . '<a href="https://en.wikipedia.org/wiki/' . str_replace('_', ' ', $tmp_name) . '">' . $row['cn'] . '</a>' . "</td>";
  echo "<td>" . $row['station'] . "</td>";
  echo "<td>" . $row['contain'] . "</td>";
  echo "<td>" . $row['coach'] . "</td>";
  echo "<td>" . $row['P'] . "</td>";
  echo "<td>" . $row['W'] . "</td>";
  echo "<td>" . $row['D'] . "</td>";
  echo "<td>" . $row['L'] . "</td>";
  echo "<td>" . $row['GA'] . "/" . $row['GL'] . "</td>";
  echo "<td>" . $row['G'] . "</td>";
  echo "<td>" . $row['Pts'] . "</td>";
  echo "</tr>";
  $count ++;
  }
echo "</table>";
echo '<a href="http://www.liuw53.top/csl.php">UPDATE</a>',"&nbsp&nbsp" ,'<a href="http://www.liuw53.top">Back</a>', '<br>', '<br>';
echo "Writen by LiuWang. All right revered.";

mysql_close($con);

?>  
  </body>
</html>