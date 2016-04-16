<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Hello SyntaxHighlighter</title>
        <script type="text/javascript" src="scripts/shCore.js"></script>
        <script type="text/javascript" src="scripts/shBrushCpp.js"></script>
        <link type="text/css" rel="stylesheet" href="styles/shCoreMidnight.css"/>
        <script type="text/javascript">SyntaxHighlighter.all();</script>

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
                font-size: 12px;
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
                max-width: 770px;
                _width: 750px;
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
                max-width: 620px;
                _width: 620px;
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
            <h1>Hahaha!<span>(ˇˍˇ)</span></h1>
            

            <form action="" method="get" onsubmit="return post();">
            <h2>Please input what you want you output:</h2>
                <textarea rows="12" cols="78" name="content" id="content"></textarea> 
                <br>
                <input type="submit" value="CREATE CPP CODE" /> &nbsp;&nbsp;&nbsp;<INPUT TYPE="reset" VALUE="RESET">
                <br/> 
            </form>


<?php
$content=trim($_GET['content']);




$header = 
"//  Created by Kieran Will. Copyright © 2016 liuwang. 
//  All rights reserved.
#include &#60iostream&#62
#include &#60string&#62
using namespace std;

string tmp;
int main(int argc, const char * argv[]) {
    while (cin >> tmp) { }
";

$end = "    return 0;
}";

function conv($str) {
    $str = str_replace("\\", "\\\\", $str);
    $str = str_replace("\"", "\\\"", $str);
    $str = str_replace("\'", "\\\'", $str);
    $str = str_replace("<", "&#60", $str);
    $str = str_replace(">", "&#62", $str);
    return $str;
}

if($content){
    echo '<pre class="brush: cpp;" >' . $header;
    //str_replace("n",'nl',nl2br($content)); 
    $contents = explode("\r\n",$content);
    foreach ($contents as $ct) {
        echo "    cout << \"" . conv($ct) . "\" << endl;";
        echo "\n";
    }
    
    echo $end . '</pre>';
    echo '<a href="javascript:history.go(-1);">BACK</a>';
} 
?>


<a href="http://www.liuw53.top">HOME</a>
            <script>
                var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2), GOOG_FIXURL_SITE = location.host;
            </script>
            <script src="fixurl.js"></script>
        </div>
    </body>
</html>
