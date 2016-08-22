<?php
$filename = 'f_filename';
$files = $_FILES[$filename];

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
  }


$name= 'asitela-'.time().'.jpg';
$form_data =$files['tmp_name'];


echo $form_data;
$s2 = new SaeStorage();
$img = new SaeImage();
$img_data = file_get_contents($form_data);//获取本地上传的图片数据
$img->setData($img_data);
$img->resize(180,180); //图片缩放为180*180
$img->improve();//提高图片质量的函数
$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
$s2->write('wp',$name,$new_data);//将public修改为自己的storage 名称
$url= $s2->getUrl('wp',$name);//将public修改为自己的storage 名称echo "文件名：".$name."<br/>";
echo "Image url:".$url."<br/>";
echo "<img src='$url' />";
?>