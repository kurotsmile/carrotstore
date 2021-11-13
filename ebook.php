<?php
require_once('libary/Mobile_Detect.php');
require_once('config.php');
require_once('database.php');
libxml_use_internal_errors(true);

$id_ebook='287';
$lang_ebook='vi';
$ebook_price='1.99';
$ebook_title='EBook';
$seo_desc='';
$ver_css='1.10';
if(isset($_GET['id']))$id_ebook=$_GET['id'];
if(isset($_GET['lang']))$lang_ebook=$_GET['lang'];
$arr_css=array();
$arr_img=array();

$q_book=mysqli_query($link,"SELECT `price` FROM carrotsy_virtuallover.`products` WHERE `id` = '$id_ebook' LIMIT 1");
$data_book=mysqli_fetch_assoc($q_book);
if($data_book!=null){
	if(trim($data_book['price'])!='') $ebook_price=$data_book['price'];
	$url_ebook_path="product_data/$id_ebook/ebook/OEBPS";
	$xml=simplexml_load_file($url_ebook_path."/content.opf");
	$ebook_toc=simplexml_load_file($url_ebook_path."/toc.ncx");
	$navMap=$ebook_toc->navMap->navPoint;
	$total_page=count($navMap);
	$total_page_view=round(($total_page-1)/2);

	$manifest=$xml->manifest;

	foreach($manifest->item as $obj_ebook){
		if($obj_ebook['media-type']=='text/css')array_push($arr_css,$obj_ebook['href']);
		if($obj_ebook['media-type']=='image/jpeg')array_push($arr_img,$obj_ebook['href']);
	}
}

$detect = new Mobile_Detect;

$q_book_title=mysqli_query($link,"SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_ebook' LIMIT 1");
$data_book_title=mysqli_fetch_assoc($q_book_title);
$ebook_title=$data_book_title['data'];

$url_img_cover='';
if(count($arr_img)>0) $url_img_cover=$url.'/'.$url_ebook_path.'/'.$arr_img[0];

function show_page_cover($type_page){
	global $url_img_cover;
	global $lang_ebook;
	global $url;
	$html_cover='';
	if($type_page==1)
		$html_cover='<div class="page_one page_book" style="display:block;text-align: center;" id="page_0"><div class="contain_page_one">';
	else
		$html_cover='<div class="page_two left page_book" style="display:block;text-align: center;" id="page_0"><div class="contain_page_two">';

	$html_cover.='<img alt="cover" onclick="btn_next()" style="width:90%" src="'.$url_img_cover.'">';
	if($lang_ebook=='vi') $html_cover.='<br/><br/><br/><br/><br/><strong>Ủng hộ biên tập viên Ebook</strong><br>Xin hãy ủng hộ một số tiền nhỏ, dù chỉ là 1.000đ để tôi có động lực biên tập sách cho các bạn đọc <br/><img alt="cover" style="width:250px" src="'.$url.'/images/mono_donation.png"><br/><br/><a href="https://me.momo.vn/carrot" target="_blank" style="text-decoration: none;">https://me.momo.vn/carrot</a><br/><br/><br/><br/><br/>';
	$html_cover.='</div></div>';
	return $html_cover;
}

function show_body_html($id_book,$url_xml_page){
    $d = new DOMDocument;
    $mock = new DOMDocument;
	$arr_url=explode("#", $url_xml_page);
    $d->loadHTML(file_get_contents("product_data/$id_book/ebook/OEBPS/".$arr_url[0]),LIBXML_NOERROR);
    $body = $d->getElementsByTagName('body')->item(0);
    foreach ($body->childNodes as $child){
        $mock->appendChild($mock->importNode($child, true));
    }
    return $mock->saveHTML();
}

function lang($key){
	global $link;
	global $lang_ebook;
    $return=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`lang_$lang_ebook` WHERE `key` = '$key' LIMIT 1");
    if($return){
        $data=mysqli_fetch_assoc($return);
        if($data){
            return addslashes($data['value']);
        }else{
            return $key;
        }
    }else{
        return $key;
    }
}
?>
<HTML>
<HEAD>
	<TITLE><?php echo $ebook_title;?></TITLE>
	<meta name="description" content="<?php echo $seo_desc; ?>"/>
    <meta name="keywords" content="<?php echo $ebook_title; ?>"/>

	<meta name="author" content="carrotstore">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
	<link rel="stylesheet" id="style_book" type="text/css" href="<?php echo $url; ?>/assets/css/ebook.css?ver=<?php echo $ver_css;?>"/>
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
	<?php foreach($arr_css as $css) echo '<link rel="stylesheet" type="text/css" href="'.$url.'/'.$url_ebook_path.'/'.$css.'"/>'; ?>
</HEAD>
<BODY>
<?php if($data_book!=null){?>
    <div id="book_nav_header">
		<img id="logo_carrot_book" onclick="click_logo_carrot_book();" src="<?php echo $url;?>/images/icon.png"/>
		<?php if(!$detect->isMobile()){?>
			<div id="book_title"><?php echo $ebook_title;?></div>
		<?php }?>
		<div id="book_head_menu_right">
			<i onclick="book_menu();" class="fa fa-list-ul" aria-hidden="true"></i>
			<i onclick="book_style();" class="fa fa-font" aria-hidden="true"></i>
			<i onclick="book_info();" class="fa fa-info-circle" aria-hidden="true"></i>
			<i onclick="book_share();" class="fa fa-share-alt" aria-hidden="true"></i>
			<i onclick="book_buy();" class="fa fa-shopping-cart" aria-hidden="true"></i>
		</div>
	</div>
	<div id="btn_prev" class="btn_nav" onClick="btn_next()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
	<div id="btn_next" class="btn_nav" onClick="btn_prev()"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

	<div id="book_nav_footer">
		<div id="book_nav_area">
			<div class="book_nav_area_left">
				<div id="slider_book_nav_area">
					<input class="range" type="range" onchange="show_page_view(this.value);" id="slider_book_nav" value="0" min="0" <?php if ($detect->isMobile()){echo "max=".$total_page;}else{echo "max=".$total_page_view;} ?> step="1">
				</div>
			</div>
			<div class="book_nav_area_right">
			<?php if($detect->isMobile()){ ?>
				<div class="btn_pay_book" style="padding:6px;" onclick="book_buy();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
			<?php }else{?>
				<div class="btn_pay_book" onclick="book_buy();"><?php echo lang('ebook_download');?> <?php echo $ebook_price;?>$ <i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
			<?php }?>
			</div>
		</div>

		<div id="book_nav_btn">
			<span class="btn" onClick="back_book_page()"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
		</div>
	</div>

	<div id="page_book_pay">
		<strong><?php echo lang('pay_title');?></strong><br/>
		<img id="img_avatar_book" oncontextmenu="pay_success('s','2');" src="<?php echo $url;?>/product_data/<?php echo $id_ebook;?>/icon.jpg"/>
		<div id="page_book_pay_contain">
			<div id="txt_pay_success">
				<?php echo $ebook_price;?> <i class="fa fa-usd" aria-hidden="true"></i><br/>
				<?php echo lang('pay_method');?>
			</div>
			<div id="paypal-button-container"></div>
			<script>
                var PAYPAL_CLIENT = 'AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ';
                var PAYPAL_SECRET = 'ELkToqss_tBZdsHFOHfMFiyu23mNr9HDu1X--jqaZWCbS3xr_xg4hlCBHvV8GcyD15HIPgcwFi9BgqMp';
                var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
            </script>
            <script src="https://www.paypal.com/sdk/js?client-id=AYgLieFpLUDxi_LBdzDqT2ucT4MIa-O0vwX7w3CKGfQgMGROOHu-xz2y5Jes77owCYQ1eLmOII_ch2VZ"></script>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            currency_code:'USD',
                            value: '<?php echo $ebook_price;?>',
                            breakdown: {
                                item_total: {value: '<?php echo $ebook_price;?>', currency_code: 'USD'}
                            }
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        pay_success(details.payer.name.given_name,details.payer.email_address);
                    });
                    }
                }).render('#paypal-button-container');

                function pay_success(pay_name,pay_mail){
					$("#book_pay_success").show();
					$("#page_book_pay_contain").remove();
                }
            </script>
		</div>
		<div id="book_pay_success">
			<div id="txt_pay_success"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i><br/> <?php echo lang('pay_success');?></div>
			<a href="<?php echo $url;?>/product_data/<?php echo $id_ebook;?>/ebook.epub" class="btn_book_download"><i class="fa fa-download" aria-hidden="true"></i> <?php echo lang('ebook_download_link');?></a>
		</div>
		<div>
			<div onclick="back_book_page();return false;" class="btn_book"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang('back');?></div>
		</div>
	</div>
<?php

$x=1;
if ($detect->isMobile()) {
	$content=show_page_cover(1);
    foreach($navMap as $nav){		
        $url_xml_page=$nav->content['src'];
        $content.='<div class="page_one page_book" style="display: none;" num_page="'.$x.'" id="page_'.$x.'"><div class="contain_page_one">';
        $content.=show_body_html($id_ebook,$url_xml_page);
		$content=str_replace('../Images/',$url.'/'.$url_ebook_path.'/Images/',$content);
        $content.="</div></div>\n";
        $x++;
    }
}else{
	$content=show_page_cover(2);
    foreach($navMap as $nav){	
        $url_xml_page=$nav->content['src'];
        $style_show='';
        $css_page='left';
        if($x==1)$style_show='display: block;';
        if(($x%2)!=0)$css_page='right'; 
        $content.='<div class="page_two page_book '.$css_page.'" num_page="'.$x.'" src="'.$url_xml_page.'" style="'.$style_show.'" id="page_'.$x.'"><div class="contain_page_two">';
        $content.=show_body_html($id_ebook,$url_xml_page);
        $content=str_replace('../Images/',$url.'/'.$url_ebook_path.'/Images/',$content);
        $content.="</div></div>\n";
        $x++;
    }
}
echo $content;
?>
<script>
	var total_page_view=<?php echo $total_page;?>;
	var book_style_mode=1;
	var load_googel_pay=0;

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

<?php
if ($detect->isMobile()) {
?>
	if(var_nav>=total_page_view) $("#btn_prev").hide(); else $("#btn_prev").show();
<?php
}else{
?>
		if(var_nav>=total_page_view-1) $("#btn_prev").hide(); else $("#btn_prev").show();
<?php }?>

		$("html, body").animate({scrollTop:0}, "fast");
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
		swal({html: true, title: '<?php echo lang('chia_se');?>', text: html_book_share, showConfirmButton: true});
	}

	function book_info(){
		window.open("<?php echo $url;?>/product/<?php echo $id_ebook;?>",'_blank');
	}

	function book_menu(){
		var slider_nav_val=$("#slider_book_nav").val();
		var html_book_menu='<div id="list_book_menu_scroll"><ul id="list_book_menu">';
		<?php
		$x=1;
		$index_page=0;
		foreach($navMap as $nav){
			if ($detect->isMobile())
				$index_page=$x;
			else
				if($x%2==0)$index_page++;

			$nav_sub=$nav->navPoint;
			?>
			html_book_menu=html_book_menu+"<li><a id='nav_menu_<?php echo $x;?>' onclick='book_menu_sel(<?php echo $index_page;?>)' class='item_menu_book'>";
			html_book_menu=html_book_menu+"<i class='fa fa-circle' aria-hidden='true'></i> ";
			html_book_menu=html_book_menu+" <?php echo str_replace('"',"",$nav->navLabel->text);?>";
			html_book_menu=html_book_menu+"</a></li>";
			<?php
			if(count($nav_sub)>0){
				?>
				html_book_menu=html_book_menu+'<ul id="list_book_menu_sub">';
				<?php foreach($nav_sub as $navsub){ ?>
					html_book_menu=html_book_menu+"<li><a id='nav_menu_<?php echo $x;?>' onclick='book_menu_sel(<?php echo $index_page;?>)' class='item_menu_book'>";
					html_book_menu=html_book_menu+"<i class='fa fa-dot-circle-o' aria-hidden='true'></i> ";
					html_book_menu=html_book_menu+" <?php echo str_replace('"',"",$navsub->navLabel->text);?>";
					html_book_menu=html_book_menu+"</a></li>";
				<?php $x++;} ?>
				html_book_menu=html_book_menu+'</ul>';
				<?php
			}
			$x++;
		}
		?>
		html_book_menu=html_book_menu+'</ul></div>';
		swal({html: true, title: '<?php echo lang('ebook_muc_luc');?>', text: html_book_menu, showConfirmButton: true});
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
		var p_font_size=$('p').css('font-size');
		var p_font_family=$('p').css('font-family');
		var html_book_style="<div id='book_style'>";
		var active_book_style1="";
		var active_book_style2="";

		if(book_style_mode==1)
			active_book_style1="active";
		else
			active_book_style2="active";

		html_book_style=html_book_style+'<div class="row_box"><?php echo lang('ebook_font_size');?></div>';
		html_book_style=html_book_style+'<div class="row_box">';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn" onClick="book_style_text_size(1)"><div class="btn_style"><i class="fa fa-minus-square" aria-hidden="true"></i></div></div>';
		html_book_style=html_book_style+'<div class="col_33"><i class="fa fa-font size_text" aria-hidden="true"></i> <span id="style_text_size">'+p_font_size+'</span></div>';
		html_book_style=html_book_style+'<div class="col_33 book_style_btn" onClick="book_style_text_size(2)"><div class="btn_style"><i class="fa fa-plus-square" aria-hidden="true"></i></div></div>';
		html_book_style=html_book_style+'</div>';

		html_book_style=html_book_style+'<div class="row_box"><?php echo lang('ebook_font_style');?></div>';
		html_book_style=html_book_style+'<div class="row_box">';
		html_book_style=html_book_style+'<div class="col_100"><select class="select_box" onChange="book_style_text_family()" id="style_text_family">';
		html_book_style=html_book_style+'<option value="Georgia">Georgia</option>';
		html_book_style=html_book_style+'<option value="Palatino Linotype">Palatino Linotype</option>';
		html_book_style=html_book_style+'<option value="Book Antiqua">Book Antiqua</option>';
		html_book_style=html_book_style+'<option value="Times New Roman">Times New Roman</option>';
		html_book_style=html_book_style+'<option value="Arial">Arial</option>';
		html_book_style=html_book_style+'<option value="Helvetica">Helvetica</option>';
		html_book_style=html_book_style+'<option value="Arial Black">Arial Black</option>';
		html_book_style=html_book_style+'<option value="Impact">Impact</option>';
		html_book_style=html_book_style+'<option value="Tahoma">Tahoma</option>';
		html_book_style=html_book_style+'<option value="Verdana">Verdana</option>';
		html_book_style=html_book_style+'<option value="Courier New">Courier New</option>';
		html_book_style=html_book_style+'<option value="Lucida Console">Lucida Console</option>';
		html_book_style=html_book_style+'<option value="initial">initial</option>';
		html_book_style=html_book_style+'</select></div>';
		html_book_style=html_book_style+'</div>';

		html_book_style=html_book_style+'<div class="row_box"><?php echo lang('dark_mode');?></div>';
		html_book_style=html_book_style+'<div class="row_box">';
		html_book_style=html_book_style+'<div class="col_50 book_style_btn" onClick="book_mode(1)"><div id="btn_style_mode_1" class="btn_style '+active_book_style1+'"><i class="fa fa-sun-o" aria-hidden="true"></i> <?php echo lang('dark_mode_sun');?></div></div>';
		html_book_style=html_book_style+'<div class="col_50 book_style_btn" onClick="book_mode(2)"><div id="btn_style_mode_2" class="btn_style '+active_book_style2+'"><i class="fa fa-moon-o" aria-hidden="true"></i> <?php echo lang('dark_mode_moon');?></div></div>';
		html_book_style=html_book_style+'</div>';

		html_book_style=html_book_style+'</div>';
		swal({html: true, title: '<?php echo lang('ebook_display_options');?>', text: html_book_style, showConfirmButton: true});
	}

	function book_style_text_size(type){
		var style_text_size=$("#style_text_size").html();
		style_text_size=parseInt(style_text_size);
		if(type==1)
			style_text_size--;
		else
			style_text_size++;
		$('p').css({'font-size': style_text_size+"px"});
		$("#style_text_size").html(style_text_size+"px");
	}

	function book_mode(mode){
		$(".btn_style").removeClass("active");
		if(mode==1){
			book_style_mode=1;
			$("#style_book").attr("href","<?php echo $url;?>/assets/css/ebook.css?ver=<?php echo $ver_css;?>");
			$("#btn_style_mode_1").addClass("active");
		}else{
			book_style_mode=2;
			$("#style_book").attr("href","<?php echo $url;?>/assets/css/ebook_dark.css?ver=<?php echo $ver_css;?>");
			$("#btn_style_mode_2").addClass("active");
		}
	}

	function book_style_text_family(){
		var style_text_family=$("#style_text_family").val();
		$('p,h2,h1,h3').css({'font-family':style_text_family});
	}

	function back_book_page(){
		$("#btn_prev").show();
		$("#btn_next").show();
		var slider_book_nav_p=$("#slider_book_nav").val();
		show_page_view(slider_book_nav_p);
		$("#book_nav_area").show();
		$("#book_nav_btn").hide();
		$("#page_book_pay").hide();
	}

	function book_buy(){
		$("#book_nav_area").hide();
		$("#book_nav_btn").show();
		$("#page_book_pay").show();
		$("#btn_prev").hide();
		$("#btn_next").hide();
		if(load_googel_pay==0)load_googel_pay=1;
	}

	$("p a").click(function(){
		var id_emp=$(this).attr("href");
		id_emp=id_emp.replace("../","");
		var page_emp=id_emp.split('#');
		page_emp=page_emp[0];
		$(".page_book").each(function(){
			var src_page=$(this).attr("src");
			if(src_page==page_emp){
				var num_page=$(this).attr("num_page");
				num_page=parseInt(num_page)-1;
				$(".page_book").hide();
				$(this).show();
				$("#book_nav_area").hide();
				$("#book_nav_btn").show();
			}
		});
		return false;
	});

	function click_logo_carrot_book(){
		window.open("<?php echo $url;?>/type/book",'_blank');
	}
</script>
<?php }else{?>
	Sách này không còn tồn tại!
<?php }?>
</BODY>
</HTML>