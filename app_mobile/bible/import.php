<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
<?php
include "config.php";
include "database.php";
include "simple_html_dom.php";

echo "thien thanh";
exit;
$lang_book='es';
$id_book='247';
$chapter_book_sel='119';
$length=50;



$web_link="https://www.biblestudytools.com/lut/genesis/{i}.html";
    for($i=1;$i<=$length;$i++){
                $chapter_book_sel=$i;
                $base = str_replace("{i}",$chapter_book_sel,$web_link);
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);
                
                // Create a DOM object
                $html_base = new simple_html_dom();
                // Load HTML from a string
                $html_base->load($str);
                
                $a=0;
                //get all category links
                foreach($html_base->find('div.verse') as $element) {
                    //$contain=strip_tags($element->innertext);
                   
                    
                    $c=$element->find('span.verse-'.($a+1),0)->plaintext;
                    $c=str_replace('{~}','',$c);
                    $c=addslashes($c);
                    echo $a.' '.$c.'<br/>';
                    $a++;
                   // $query_add_paragraphp=mysql_query("INSERT INTO `paragraph_$lang_book` (`book_id`, `chapter`, `contain`,`orders`) VALUES ('$id_book', '$chapter_book_sel', '".$contain."','".$order_emp."');");

                }
                echo '<hr/>';
                $html_base->clear(); 
                unset($html_base);
                //mysql_query("UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&emsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                //mysql_query("UPDATE `paragraph_$lang_book` SET `contain`= REPLACE(`contain`, '&nbsp;', '') WHERE `book_id` = '$id_book' AND `chapter`='$chapter_book_sel'");
                //echo alert('Add book id:'.$id_book.' chap: '.$chapter_book_sel.' lang:'.$lang_book.' thành công','alert');    
                
   }
   
?>