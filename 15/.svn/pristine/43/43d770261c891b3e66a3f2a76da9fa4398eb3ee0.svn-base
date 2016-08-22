<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>Chinese Super League</title> 
<style type="text/css"> 
/* CSS Document */ 

body{TEXT-ALIGN: center;}
#center{ MARGIN-RIGHT: auto;
MARGIN-LEFT: auto;
height:200px;
background:#F00;
width:400px;
vertical-align:middle;
line-height:200px;
}
a { 
    color: #c75f3e; 
} 

#mytable { 
    width: 700px; 
    padding: 0; 
    margin: 0; 
} 

caption { 
    padding: 0 0 5px 0; 
    width: 700px;      
    font: italic 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
    text-align: right; 
} 

th { 
    font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
    color: #4f6b72; 
    border-right: 1px solid #C1DAD7; 
    border-bottom: 1px solid #C1DAD7; 
    border-top: 1px solid #C1DAD7; 
    letter-spacing: 2px; 
    text-transform: uppercase; 
    text-align: left; 
    padding: 6px 6px 6px 12px; 
    background: #CAE8EA url(images/bg_header.jpg) no-repeat; 
} 

th.nobg { 
    border-top: 0; 
    border-left: 0; 
    border-right: 1px solid #C1DAD7; 
    background: none; 
} 

td { 
    border-right: 1px solid #C1DAD7; 
    border-bottom: 1px solid #C1DAD7; 
    background: #fff; 
    font-size:11px; 
    padding: 6px 6px 6px 12px; 
    color: #4f6b72; 
} 


td.alt { 
    background: #F5FAFA; 
    color: #797268; 
} 

th.spec { 
    border-left: 1px solid #C1DAD7; 
    border-top: 0; 
    background: #fff url(images/bullet1.gif) no-repeat; 
    font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
} 

th.specalt { 
    border-left: 1px solid #C1DAD7; 
    border-top: 0; 
    background: #f5fafa url(images/bullet2.gif) no-repeat; 
    font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
    color: #797268; 
} 
   
    
td.pts { 
    border-right: 1px solid #C1DAD7; 
    border-bottom: 1px solid #C1DAD7; 
    background: #7fe; 
    font: bold 12px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif; 
    color: #797268; 
} 
  
        
        

               
                
               
           
        
</style> 
      
      
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

echo '<table border="1" cellspacing="0" align="center">
<tr>
  <th scope="col"  class="nobg">Number</th>
  <th scope="col">Logo</th>
  <th scope="col">English Name</th>
  <th scope="col">Chinese Name</th>
  <th scope="col">Station</th>
  <th scope="col">Contain</th>
  <th scope="col">Coach</th>
  <th scope="col">场次</th>
  <th scope="col">胜场</th>
  <th scope="col">平局</th>
  <th scope="col">负场</th>
  <th scope="col">进失球</th>
  <th scope="col">净胜球</th>
  <th scope="col">积分</th>
</tr>';

$count = 1;

while($row = mysql_fetch_array($result))
  {
  $tmp_name = $row['en'];
  echo "<tr>";
  echo '<td class="spec">' . $count . "</td>";
	if ($count%2 == 1) {
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
  echo '<td class="pts">' . $row['Pts'] . "</td>";
    } 
    
  else {
    echo "<td>" . "<img src='csl_logos/" . $tmp_name . ".png'  height='50'/>" . "</td>";
  echo '<td  class="alt">' . str_replace('_', ' ', $tmp_name) . "</td>";
  echo '<td  class="alt">' . '<a href="https://en.wikipedia.org/wiki/' . str_replace('_', ' ', $tmp_name) . '">' . $row['cn'] . '</a>' . "</td>";
  echo '<td  class="alt">' . $row['station'] . "</td>";
  echo '<td  class="alt">' . $row['contain'] . "</td>";
  echo '<td  class="alt">' . $row['coach'] . "</td>";
  echo '<td  class="alt">' . $row['P'] . "</td>";
  echo '<td  class="alt">' . $row['W'] . "</td>";
  echo '<td  class="alt">' . $row['D'] . "</td>";
  echo '<td  class="alt">' . $row['L'] . "</td>";
  echo '<td  class="alt">' . $row['GA'] . "/" . $row['GL'] . "</td>";
  echo '<td  class="alt">' . $row['G'] . "</td>";
  echo '<td  class="pts"> <strong>' . $row['Pts'] . "</strong></td>";
 
  }
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