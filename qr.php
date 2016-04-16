<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>QR Code (⊙_⊙)</title>
        <style>
            ::-moz-selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            ::selection {
                background: #b3d4fc;
                text-shadow: none;
            }

            html {
                padding: 30px 10px;
                font-size: 20px;
                line-height: 1.4;
                color: #737373;
                background: #f0f0f0;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            html,
            input {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            }

            body {
                max-width: 500px;
                _width: 500px;
                padding: 30px 20px 50px;
                border: 1px solid #b3b3b3;
                border-radius: 4px;
                margin: 0 auto;
                box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
                background: #fcfcfc;
            }

            h1 {
                margin: 0 10px;
                font-size: 50px;
                text-align: center;
            }

            h1 span {
                color: #bbb;
            }

            h3 {
                margin: 1.5em 0 0.5em;
            }

            p {
                margin: 1em 0;
            }

            ul {
                padding: 0 0 0 40px;
                margin: 1em 0;
            }

            .container {
                max-width: 520px;
                _width: 520px;
                margin: 0 auto;
            }

            /* google search */

            #goog-fixurl ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            #goog-fixurl form {
                margin: 0;
            }

            #goog-wm-qt,
            #goog-wm-sb {
                border: 1px solid #bbb;
                font-size: 16px;
                line-height: normal;
                vertical-align: top;
                color: #444;
                border-radius: 2px;
            }

            #goog-wm-qt {
                width: 220px;
                height: 20px;
                padding: 5px;
                margin: 5px 10px 0 0;
                box-shadow: inset 0 1px 1px #ccc;
            }

            #goog-wm-sb {
                display: inline-block;
                height: 32px;
                padding: 0 10px;
                margin: 5px 0 0;
                white-space: nowrap;
                cursor: pointer;
                background-color: #f5f5f5;
                background-image: -webkit-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -moz-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -ms-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                background-image: -o-linear-gradient(rgba(255,255,255,0), #f1f1f1);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                *overflow: visible;
                *display: inline;
                *zoom: 1;
            }

            #goog-wm-sb:hover,
            #goog-wm-sb:focus {
                border-color: #aaa;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                background-color: #f8f8f8;
            }

            #goog-wm-qt:hover,
            #goog-wm-qt:focus {
                border-color: #105cb6;
                outline: 0;
                color: #222;
            }

            input::-moz-focus-inner {
                padding: 0;
                border: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>QR Code Create<span>(ˇˍˇ)</span></h1>
            

<?php
$content=$_GET['content'];
$width=$_GET['width']?$_GET['width']:300;   
$height=$_GET['height']?$_GET['height']:300;

if($content){
    echo "What you input: <span>$content </span><BR />";
    echo "Width: <span>$width </span><BR />";
    echo "Height: <span>$height </span><BR /> ";
    echo "QR Code Image:<BR/> ";   
    $wen = urlencode($content); 


    //https://chart.googleapis.com/chart?cht=qr&chld=H&chs={$width}x{$height}&chl={$wen}' target='_blank'>https://chart.googleapis.com/chart?cht=qr&chld=H&chs={$width}x{$height}&chl={$wen}</a><br />
    $gucl = 'http://chart.googleapis.com/chart?cht=qr&chld=H&chs=' . $width . 'x'. $height . '&chl=' . $wen. '';
    echo '<img src="' . $gucl . '">'.'<br>';
    echo '<a href="' . $gucl . '" download="QR_CODE.png">Download</a>' . '<br>';
    echo '<a href="javascript:history.go(-1);">BACK</a>';
} 
else 
{
?>
<form action="" method="get" onsubmit="return post();">
<p>width:<select name="Width">
    <option value="100">100</option>
    <option value="200">200</option>
    <option value="300" Selected>300</option>
    <option value="400">400</option>
    <option value="500">500</option>
</select>
height: <select name="Height">
    <option value="100">100</option>
    <option value="200">200</option>
    <option value="300" Selected>300</option>
    <option value="400">400</option>
    <option value="500">500</option>
</select></p>
Please input text or URL:<br />
<textarea rows="8" cols="60" name="content" id="content" style="color:#ACA899">http://www.liuw53.top</textarea> <br>
<input type="submit" value="CREATE QR CODE"  /> &nbsp;&nbsp;&nbsp;<INPUT TYPE="RESET" VALUE="RESET">
<br/> 
</form>
<? 
}
?>
            <br><br><a href="index.php">HOME</a>
            <script>
                var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2), GOOG_FIXURL_SITE = location.host;
            </script>
            <script src="fixurl.js"></script>
        </div>
    </body>
</html>
