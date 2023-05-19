<?php

function header_html(){
    $html='<html lang="en-US">';
    $html.='<head><title>Test</title>';
    $html.='<meta charset="utf-8">';
    $html.='<meta name="viewport" content="width=device-width, initial-scale=1">';
    $html.='<link rel="stylesheet" href="css/style.css">';
    $html.='</head>';
    $html.='<body>';
    echo $html;
}

function footer_html(){
    $html='</body>';
    $html.='</html>';
    echo $html;
}
?>