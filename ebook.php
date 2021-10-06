<?php
require_once('libary/Mobile_Detect.php');
require_once('config.php');
require_once('database.php');

$id_ebook='287';
$lang_ebook='vi';
$ver_css='0.2';
if(isset($_GET['id']))$id_ebook=$_GET['id'];
if(isset($_GET['lang']))$lang_ebook=$_GET['lang'];

$url_ebook_path="product_data/$id_ebook/ebook/OEBPS";
$xml=simplexml_load_file($url_ebook_path."/content.opf");
$ebook_toc=simplexml_load_file($url_ebook_path."/toc.ncx");
$navMap=$ebook_toc->navMap->navPoint;
$total_page=count($navMap);
$total_page_view=round(($total_page-1)/2);

$manifest=$xml->manifest;
$detect = new Mobile_Detect;

$q_book_title=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_$lang_ebook` WHERE `id_product` = '$id_ebook' LIMIT 1");
$data_book_title=mysqli_fetch_assoc($q_book_title);
$ebook_title=$data_book_title['data'];
$seo_desc='';

$arr_css=array();
$arr_img=array();
foreach($manifest->item as $obj_ebook){
	if($obj_ebook['media-type']=='text/css')array_push($arr_css,$obj_ebook['href']);
	if($obj_ebook['media-type']=='image/jpeg')array_push($arr_img,$obj_ebook['href']);
}

$url_img_cover='';
if(count($arr_img)>0) $url_img_cover=$url_ebook_path.'/'.$arr_img[0];
?>
<HTML>
<HEAD>
	<TITLE><?php echo $ebook_title;?></TITLE>
	<meta name="description" content="<?php echo $seo_desc; ?>"/>
    <meta name="keywords" content="<?php echo $ebook_title; ?>

	<meta name="author" content="carrotstore">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/ebook.css?ver=<?php echo $ver_css;?>"/>
	<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css" />
	<script src="<?php echo $url; ?>/js/jquery3.3.min.js"></script>
    <link rel="apple-touch-icon" href="<?php echo $url;?>/images/80.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $url;?>/images/72.png"/>
    <link rel="apple-touch-icon"  sizes="114x114" href="<?php echo $url;?>/images/114.png"/>
    <link rel="apple-touch-icon"  sizes="144×144" href="<?php echo $url;?>/images/144.png"/>
	<link rel="shortcut icon" href="<?php echo $url; ?>/images/icon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/responsive.min.css"/>
	<script src="<?php echo $url; ?>/dist/sweetalert.min.js" async></script>
	<?php
	foreach($arr_css as $css){
		echo '<link rel="stylesheet" type="text/css" href="'.$url.'/'.$url_ebook_path.'/'.$css.'"/>';
	}
	?>
</HEAD>
<BODY>
    <div id="book_nav_header">
		<?php if(!$detect->isMobile()){?>
			<div id="book_title"><?php echo $ebook_title;?></div>
		<?php }?>
		<div id="book_head_menu_right">
			<i onclick="book_menu();" class="fa fa-list-ul" aria-hidden="true"></i>
			<i onclick="book_style();" class="fa fa-font" aria-hidden="true"></i>
			<i onclick="book_info();" class="fa fa-info-circle" aria-hidden="true"></i>
			<i onclick="book_share();" class="fa fa-share-alt" aria-hidden="true"></i>
		</div>
	</div>
	<div id="btn_prev" class="btn_nav" onClick="btn_next()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
	<div id="btn_next" class="btn_nav" onClick="btn_prev()"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

	<div id="book_nav_footer">
		<div id="book_nav_area">
			<input class="range" type="range" onchange="show_page_view(this.value);" id="slider_book_nav" value="0" min="0" <?php if ($detect->isMobile()){echo "max=".($total_page-1);}else{echo "max=".$total_page_view;} ?> step="1">
		</div>
	</div>
<?php

function show_body_html($id_book,$url_xml_page){
    $d = new DOMDocument;
    $mock = new DOMDocument;
    $d->loadHTML(file_get_contents("product_data/$id_book/ebook/OEBPS/".$url_xml_page));
    $body = $d->getElementsByTagName('body')->item(0);
    foreach ($body->childNodes as $child){
        $mock->appendChild($mock->importNode($child, true));
    }
    return $mock->saveHTML();
}

$x=0;
$img_cover='<img onclick="btn_next()" style="width:90%" ';
if ($detect->isMobile()) {
    foreach($navMap as $nav){		
        $url_xml_page=$nav->content['src'];
        $style_show='';
        if($x==0)$style_show='display: block;';
        echo '<div class="page_one" style="'.$style_show.'" id="page_'.$x.'"><div class="contain_page_one">';
        $content=show_body_html($id_ebook,$url_xml_page);
		$content=str_replace('<img alt="cover"',$img_cover,$content);
		$content=str_replace('../Images/',$url.'/'.$url_ebook_path.'/Images/',$content);
        echo $content;
        echo "</div></div>\n";
        $x++;
    }
}else{
    foreach($navMap as $nav){	
        $url_xml_page=$nav->content['src'];
        $style_show='';
        $css_page='left';
        if($x<=1)$style_show='display: block;';
        if(($x%2)!=0)$css_page='right'; 
        echo '<div class="page_two '.$css_page.'" style="'.$style_show.'" id="page_'.$x.'"><div class="contain_page_two">';
        $content=show_body_html($id_ebook,$url_xml_page);
		$content=str_replace('<img alt="cover"',$img_cover,$content);
        $content=str_replace('../Images/',$url.'/'.$url_ebook_path.'/Images/',$content);
        echo $content;
        echo "</div></div>\n";
        $x++;
    }
}
?>
<script>
	var total_page_view=<?php echo $total_page-1;?>;
	$("#btn_next").hide();
	function btn_next(){
		var val_next_pos=$("#slider_book_nav").val();
		val_next_pos=parseInt(val_next_pos)+1;
		$("#slider_book_nav").val(val_next_pos);
		show_page_view(val_next_pos);
	}

	function btn_prev(){
		var val_prev_pos=$("#slider_book_nav").val();
		val_prev_pos=parseInt(val_prev_pos)-1;
		$("#slider_book_nav").val(val_prev_pos);
		show_page_view(val_prev_pos);
	}

	function check_nav(var_nav){
		if(var_nav==0)
			$("#btn_next").hide();
		else
			$("#btn_next").show();

		if(var_nav>=total_page_view)
			$("#btn_prev").hide();
		else
			$("#btn_prev").show();

		$("html, body").animate({ scrollTop: 0 }, "fast");
	}
<?php
if ($detect->isMobile()) {
?>

	function show_page_view(var_bar){
		var_bar=parseInt(var_bar);
		var page_view=var_bar;
		$(".page_one").hide();
		$("#page_"+page_view).show();
		check_nav(var_bar);
	}
<?php }else{?>
	function show_page_view(var_bar){
		var_bar=parseInt(var_bar);
		var_bar=var_bar*2;
		var page_view_1=var_bar;
		var page_view_2=var_bar+1;
		$(".page_two").hide();
		$("#page_"+page_view_1).show();
		$("#page_"+page_view_2).show();
		check_nav(var_bar);
	}
<?php }?>
	function book_share(){
		var html_book_share='<div id="list_share">';
		<?php
		$query_share=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`share` LIMIT 50");
		$url_share_book=$url.'/ebook/'.$id_ebook;
		while($s=mysqli_fetch_assoc($query_share)){
			$url_share=str_replace("{url}",$url_share_book,$s['web']);
		?>
			html_book_share=html_book_share+"<a href='<?php echo $url_share;?>' class='item_share' target='_blank'>";
			html_book_share=html_book_share+"<i class='fa <?php echo $s['icon_css'];?>' aria-hidden='true'></i> ";
			html_book_share=html_book_share+" <?php echo $s['name'];?>";
			html_book_share=html_book_share+"</a>";
		<?php
		}
		?>
		html_book_share=html_book_share+'</div>';
		swal({html: true, title: 'Chia sẻ', text: html_book_share, showConfirmButton: true});
	}

	function book_info(){
		window.open("<?php echo $url;?>/product/<?php echo $id_ebook;?>",'_blank');
	}

	function book_menu(){
		var slider_nav_val=$("#slider_book_nav").val();
		var html_book_menu='<div id="list_book_menu">';
		<?php
		$x=1;
		$index_page=0;
		foreach($navMap as $nav){
			if ($detect->isMobile())
				$index_page=$x;
			else
				if($x%2!=0)$index_page++;
		?>
			html_book_menu=html_book_menu+"<a id='nav_menu_<?php echo $x-1;?>' onclick='book_menu_sel(<?php echo $index_page-1;?>)' class='item_menu_book'>";
			html_book_menu=html_book_menu+"<i class='fa fa-circle' aria-hidden='true'></i> ";
			html_book_menu=html_book_menu+" <?php echo $nav->navLabel->text;?>";
			html_book_menu=html_book_menu+"</a>";
		<?php
			$x++;

		}
		?>
		html_book_menu=html_book_menu+'</div>';
		swal({html: true, title: 'Mục lục', text: html_book_menu, showConfirmButton: true});
		<?php
		if ($detect->isMobile()) {
		?>
		for(var i=0;i<=slider_nav_val;i++) $("#nav_menu_"+i).addClass("active");
		<?php
		}else{
		?>
		for(var i=0;i<=(slider_nav_val*2);i++) $("#nav_menu_"+i).addClass("active");
		<?php }?>
	}

	function book_menu_sel(index_chap){
		show_page_view(index_chap);
		$("#slider_book_nav").val(index_chap);
		swal.close();
	}

	function book_style(){
		var html_book_style="<div id='book_style'>";
		html_book_style=html_book_style+'<div class="row_box">Cỡ chữ</div>';
		html_book_style=html_book_style+'<div class="row_box">';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn"><i class="fa fa-minus-square" aria-hidden="true"></i></div>';
		html_book_style=html_book_style+'<div class="col_33"><i class="fa fa-font size_text" aria-hidden="true"></i> 13px</div>';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn"><i class="fa fa-plus-square" aria-hidden="true"></i></div>';
		html_book_style=html_book_style+'</div>';

		html_book_style=html_book_style+'<div class="row_box">Kiểu chữ</div>';
		html_book_style=html_book_style+'<div class="row_box">';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn"><i class="fa fa-minus-square" aria-hidden="true"></i></div>';
		html_book_style=html_book_style+'<div class="col_33"><i class="fa fa-font size_text" aria-hidden="true"></i> 13px</div>';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn"><i class="fa fa-plus-square" aria-hidden="true"></i></div>';
		html_book_style=html_book_style+'</div>';

		html_book_style=html_book_style+'</div>';
		swal({html: true, title: 'Tùy Chỉnh Hiển Thị Sách', text: html_book_style, showConfirmButton: true});
	}
</script>
</BODY>
</HTML>