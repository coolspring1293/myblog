<?php
/* 在SAE的Storage中新建的Domain名，比如“wordpress” */
define ( 'SAE_STORAGE', wp );
 
//http://cdn.sinacloud.net/liuw53wp/adaf2edda3cc7cd9a7e84e0b3901213fb90e911e.jpg?KID=sina,1o96q4vlaueulAJiT6yK&Expires=1457350748&ssig=aHvaFL3ktW
//http://cdn.sinacloud.net/liuw53wp/a.png?KID=sina,1o96q4vlaueulAJiT6yK&Expires=1457350804&ssig=jjp1PFjD9Q
/* 设置文件上传的路径和文件路径的URL，不要更改 */
define ( 'SAE_DIR', 'saestor://' . SAE_STORAGE . '/uploads' );
define ( 'SAE_URL', 'http://' . $_SERVER ['HTTP_APPNAME'] . '-' . SAE_STORAGE . '.stor.sinaapp.com/uploads' );
?>