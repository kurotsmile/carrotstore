<?php
include "simple_html_dom.php";

// Create DOM from URL or file
$html = file_get_html('https://www.facebook.com/public?query=kurotsmile%40gmail.com&nomc=0');



echo $html->find('div[id=mainContainer]',0)->innertext;