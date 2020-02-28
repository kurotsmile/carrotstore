<link href="style2.css" rel="stylesheet" />
<?php
        while ($row = mysql_fetch_array($result)) {
?>
				<div class="item" style="background-image: url('<?php echo thumb($row[3],'300x300'); ?>');">
					<div class="item-overlay">
						<a href="#" class="item-button play"><i class="play"></i></a>
						<a href="#" class="item-button share share-btn"><i class="play"></i></a>
						<!--<div class="sale-tag"><span>SALE</span></div>!-->
					</div>
					<div class="item-content">
						<div class="item-top-content">
							<div class="item-top-content-inner">
								<div class="item-product">
									<div class="item-top-title">
										<h2><?php echo limit_words($row[1],6); ?></h2>
										<p class="subdescription">
											Low skateshoes - Grey
										</p>
									</div>
								</div>
								<div class="item-product-price">
									<span class="price-num">$17</span>
									<p class="subdescription">$36</p>
									<div class="old-price"></div>
								</div>
							</div>	
						</div>
						<div class="item-add-content">
							<div class="item-add-content-inner">
								<div class="section">
									<h4>Sizes</h4>
									<p>40,41,42,43,44,45</p>
								</div>
								<div class="section">
									<a href="#" class="btn buy expand">Buy now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php
}
?>             

   

    <script>
    $("window").load(function() {
  $("#body").removeClass("preload");
});

		$(".share-btn").mouseenter(function() {
			setTimeout(function() {
			$(".item-menu").addClass("visible")
			}, 500);
		});
		$(".share-btn").mouseleave(function() {
			setTimeout(function() {
			$(".item-menu").removeClass("visible")
			}, 500);
		});
		$(".item-menu").hover(function() {
			$(".item-menu").addClass("visible")
		});
		$(".item-menu").mouseleave(function() {
			setTimeout(function() {
			$(".item-menu").removeClass("visible")
			}, 500);
		});
		$(".container-item").hover(function() {
			setTimeout(function() {
			$(".container-item").css("z-index","1000")
			}, 500);
		});

    </script>