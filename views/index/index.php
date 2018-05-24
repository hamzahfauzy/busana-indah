<?php
$css = [
	URL."/vendor/styles/main_styles.css",
	URL."/vendor/styles/responsive.css",
	// URL."/vendor/styles/single_styles.css",
	// URL."/vendor/styles/single_responsive.css",
	// URL."/vendor/styles/categories_styles.css",
	// URL."/vendor/styles/categories_responsive.css",
];
foreach($css as $val){
      echo "<link href='$val' type='text/css' rel='stylesheet'>\n";
}
?>
<!-- Slider -->

	<div class="main_slider" style="background-image:url(<?=URL;?>/vendor/images/slider_1.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Spring / Summer Collection 2017</h6>
						<h1>Get up to 30% Off New Arrivals</h1>
						<div class="red_button shop_now_button"><a href="#">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Produk Baru</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".batik">batik</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".blazer">blazer</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->

						<?php 
						foreach($model->data as $value):
							$pic = $picture($value->productID);
						?>
						<div class="product-item <?=$value->product_category;?>">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?=URL;?>/<?=$pic->file_path;?>" alt="<?=$value->product_name;?>">
								</div>
								<div class="favorite favorite_left"></div>
								<!-- <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
									<span>-$20</span>
								</div> -->
								<div class="product_info">
									<h6 class="product_name"><a href="<?=URL;?>/products/detail?productID=<?=$value->productID;?>"><?=$value->product_name;?></a></h6>
									<div class="product_price">Rp. <?=number_format($value->product_price);?> 
										<!-- <span>Rp. <?=$value->product_price;?></span>  -->
									</div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="<?=URL;?>/vendor/js/jquery-3.2.1.min.js"></script>    
<script src="<?=URL;?>/vendor/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="<?=URL;?>/vendor/js/custom.js"></script>