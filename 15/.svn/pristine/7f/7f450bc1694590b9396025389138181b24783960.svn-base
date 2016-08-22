<?php
$f_filename = 'f_filename';
$f_bcolor   = 'bcolor';
$f_fchar    = 'fchar';
$f_ratio    = 'f_ratio';
$f_mode     = 'f_mode';


$files = $_FILES[$f_filename];
/*
if ($_FILES[$f_filename]["error"] > 0)
  {
  echo "Error: " . $_FILES["f_filename"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["f_filename"]["name"] . "<br />";
  echo "Type: " . $_FILES["f_filename"]["type"] . "<br />";
  echo "Size: " . ($_FILES["f_filename"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["f_filename"]["tmp_name"];
  }*/

$name = 'art/ascart-'.time().'.jpg';
$form_data =$files['tmp_name'];


$s2 = new SaeStorage();
$img = new SaeImage();
$img_data = file_get_contents($form_data);//获取本地上传的图片数据
$img->setData($img_data);
// $img->resize(180,180); //图片缩放为180*180
$img->improve();//提高图片质量的函数
$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
$s2->write('wp',$name,$new_data);//将public修改为自己的storage 名称
$url= $s2->getUrl('wp',$name);//将public修改为自己的storage 名称echo "文件名：".$name."<br/>";
//echo "Image url:".$url."<br/>";
//echo "<img src='$url' />";



$filename =$url;
$radio = $_POST[$f_ratio];
$str = $_POST[$f_fchar];
$md = $_POST[$f_mode];
$clr = $_POST[$f_bcolor];

/*
echo 'name: '.$filename . "<br/>";
echo 'radio: ' . $radio . "<br/>";
echo 'str: '.$str . "<br/>";
echo 'md: '. $md . "<br/>";
echo 'clr: '. $clr . "<br/>";
echo "--------------" . '<br>';
我发现竟然可以这样写代码之后，就醉了
*/
// set background color


echo '<body bgcolor="' . $clr . '" >';


$image = file_get_contents($filename);
$image = imagecreatefromstring($image);
$width = imagesx($image);
$height = imagesy($image);
$m_aspect = 164.0 / 48.0;
$i_aspect = $width / $height;
if($i_aspect < $m_aspect)
{
    $percent = 48.0 / $height;
    $new_height = $height * $percent;
    $new_width = 11.875 * $new_height / 6.0 * $width / $height;
}
else
{
    $percent = 164.0 / $width;
    $new_width = $width * $percent;
    $new_height = 6.0 * $new_width / 11.875 * $height / $width;
}
$new_height = $new_height * 1.6;

$new_height *= $radio;
$new_width *= $radio;
$image_p = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


/***********************/
$sr = str_split($str);
$ct = 0;
$size = count($sr);

function create($methed = 1) 
{
    
    if($methed == 1) return rand(0, $GLOBALS['size']-1);
    else return ($GLOBALS['ct'] ++ )% $GLOBALS['size'] ;
}
/**********************/



for($i = 0; $i < $new_height; $i++)
{
    $rgb = ImageColorAt($image_p, 0, $i);                              // OPTIMIZED
    $r = dechex(($rgb >> 16) & 0xFF);                              // OPTIMIZED
    $g = dechex(($rgb >> 8) & 0xFF);                              // OPTIMIZED
    $b = dechex($rgb & 0xFF);                                   // OPTIMIZED
    echo '<B><font color="#' . $r . $g . $b . '" face="Courier" style="line-height:0.8; ">' . $sr[create($md)]; //$sr[rand(0, 5)];//'█';//strtoupper(dechex(rand(0, 15)));     // OPTIMIZED
    for($j = 0; $j < $new_width; $j++)
    {
         $rgb = ImageColorAt($image_p, $j, $i);
         $r = dechex(($rgb >> 16) & 0xFF);
         $g = dechex(($rgb >> 8) & 0xFF);
         $b = dechex($rgb & 0xFF);
         if(strlen($r) < 2)
         {
              $r = '0' . $r;
         }
         if(strlen($g) < 2)
         {
              $g = '0' . $g;
         }
         if(strlen($b) < 2)
         {
              $b = '0' . $b;
         }
        // NO OPTIMIZATION     echo '<font color="#' . $r . $g . $b . '">' . strtoupper(dechex(rand(0, 15))) . '</font>';
         if($rgb != ImageColorAt($image_p, $j - 1, $i))                    // OPTIMIZED
         {                                             // OPTIMIZED
              echo '</font><font color="#' . $r . $g . $b . '" face="Courier" style="line-height:0.8;">';          // OPTIMIZED
         }
                                                      // OPTIMIZED
         echo $sr[create($md)];//$sr[rand(0, 5)];//'█';//strtoupper(dechex(rand(0, 15)));                         // OPTIMIZED
    }                                                  // OPTIMIZED
    echo '</font></B>';                                             // OPTIMIZED
    echo '<br>' . "\n\n";
}
imagedestroy($image);
imagedestroy($image_p);

echo '</body>';
?>