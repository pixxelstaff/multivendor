<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title> Product || product name </title>
	<?php include('include/links.php'); ?>
	<link rel="stylesheet" href="assets/css/single-product-page.css">
	<!-- slider slik links end -->
	<?php
	$disabled = '';
	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$product_id = mine_sanitize_string($_GET['id']);
		$product__data = fetchOtherdetails($con, 'product', 'id', $product_id);
		while ($sh__p__data = mysqli_fetch_assoc($product__data)) {
			if ($sh__p__data['approve'] == '1') {

				$p__name = dec_function($sh__p__data['name']);
				$p__des = dec_function($sh__p__data['description']);
				$p__price = (int)dec_function($sh__p__data['price']);
				$p__sale__price = (int)dec_function($sh__p__data['sale_price']);
				$p__quantity = dec_function($sh__p__data['quantity']);
				$p_category = explode(',', dec_function($sh__p__data['category']));
				$p_sku = dec_function($sh__p__data['sku']);
				$p_vendor = dec_function($sh__p__data['vendor_id']);
				$p_type = dec_function($sh__p__data['product_type']);
				$p_img = dec_function($sh__p__data['featured_image']);
				$p_gallery_img = dec_function($sh__p__data['gallery_image']);
				$p_tags = dec_function($sh__p__data['tags']);
				$p_dimensions = explode(',', dec_function($sh__p__data['dimensions']));
				$p_excerpt = dec_function($sh__p__data['excerpt']);
				$p_stock = dec_function($sh__p__data['stock']);
				$p_stock = dec_function($sh__p__data['featured']);
				$p_date = dec_function($sh__p__data['date']);

				//checking if product is variation to fetch attribute ok?
				if ($p_type == 'attribute' || $p_type == 'variation') {
					$disabled = 'disabled-btn';
					$select_p_attributes = fetchOtherdetails($con, 'product_attributes', 'product_id', $product_id);
					while ($dis_attr = mysqli_fetch_assoc($select_p_attributes)) {
						$attrNames = json_decode($dis_attr['attribute'], true);
						$attrValues =  json_decode($dis_attr['attribute_value'], true);
					}
					if ($p_type == 'variation') {
						$fetchVariationData = fetchOtherdetails($con, 'product_variations', 'product_id', $product_id);
						while ($dis_variations = mysqli_fetch_assoc($fetchVariationData)) {
							$prd_var_id = $dis_variations['Id'];
							$prd__variation = json_decode($dis_variations['variations'], true);
							$variation_product_price = array_column($prd__variation, 'variation_price');
							$variation_product_sale_price = array_column($prd__variation, 'variation_sale_price');
							$variation_name_arr = array_column($prd__variation, 'variation_name');
						}
					}
				}
			} else {
				alerting('product is not approved yet', 'shop.php');
			}
		}
		$viewed = '1';
		$v__p__qry = mysqli_prepare($con,"UPDATE `product` SET `viewed`=? WHERE `id` = ?");
		mysqli_stmt_bind_param($v__p__qry,'ss',$viewed,$product_id);
		mysqli_stmt_execute($v__p__qry);
	} else {
		alerting('id is required', 'shop.php');
		exit();
	}

	?>
</head>

<body>

	<?php include('include/header.php'); ?>

	<!-- product details page -->
	<div class="container-fluid product-main-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 sng-p-col">
					<div class="col-12 p-0 product-slide-parent">
						<div class="p-slider-wrapper d-flex">
							<div class="slide-images p-2">
								<img src="images/uploadimg/<?= !empty($p_img) ? $p_img : '' ?>" alt="" id="target">
							</div>
							<?php
							$exp_gal_img = explode(',', trim($p_gallery_img, ','));
							foreach ($exp_gal_img as  $gal_imgs) {
								if (!empty($gal_imgs)) {
							?>
									<div class="slide-images p-2">
										<img src="images/uploadimg/<?= $gal_imgs;  ?>" alt="" id="target">
									</div>
							<?php
								}
							}
							?>
						</div>
					</div>
					<div class="col-12 p-0 thumb-parent">
						<div class="slider-thumb d-flex mt-3"></div>
						<a href="javascript:void(0)" class="thumb-nav thumb-left">
							<i class="fa-solid fa-angle-left"></i>
						</a>
						<a href="javascript:void(0)" class="thumb-nav thumb-right">
							<i class="fa-solid fa-angle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 sng-p-col">
					<h4 class="sng-product-title">
						<?= $p__name ?>
					</h4>

					<div class="rating-wrapper col-12 d-flex gap-2">
						<div class="product-rating-div" data-rating='3.5'>
							<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
							<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
							<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
							<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
							<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
						</div>
						<span class="review-count">2 customer review </span>
					</div>
					<div class="price-wrapper col-12 d-flex">
						<div class="price-box">
							<?php

							if ($p_type == 'simple' || $p_type == 'attribute') {
								if (!empty($p__sale__price)) {
							?> <span class="cross-val-ser"><?= '$' . $p__price ?></span> <span class="p_actual_price"><?= '  $' . $p__sale__price ?></span>
								<?php } else {
								?> <span class="p_actual_price"><?= '$' . $p__price ?></span> <?php
																							}
																						} else {
																							//taking min and max price from product variation value
																							if ($p_type == 'variation') {
																								if (count($variation_product_price) > 1) {
																									$min_var_price = min($variation_product_price);
																									$max_var_price = max($variation_product_price);
																									//searching there index also so that we get there corresponding index 
																									$min_pr_indx = array_search($min_var_price, $variation_product_price);
																									$max_pr_indx = array_search($max_var_price, $variation_product_price);
																									if (!empty($variation_product_sale_price[$min_pr_indx])) {
																										$filter_min_price = $variation_product_sale_price[$min_pr_indx];
																									} else {
																										$filter_min_price = $min_var_price;
																									}
																									// for max values
																									if (!empty($variation_product_sale_price[$max_pr_indx])) {
																										$filter_max_price = $variation_product_sale_price[$max_pr_indx];
																									} else {
																										$filter_max_price = $min_var_price;
																									}

																									echo '$' . $filter_min_price . ' - ' . '$' . $filter_max_price;
																								} else {
																									if (!empty($variation_product_sale_price[0])) {
																								?>
											<span class="cross-val">$<?= $variation_product_price[0] ?></span>
											<span class="p_actaul_price">$<?= $variation_product_sale_price[0] ?></span>
										<?php
																									} else {
										?>
											<span class="p_actaul_price">$<?= $variation_product_price[0] ?></span>
							<?php
																									}
																								}
																							}
																						}

							?>
						</div>
						<?php
						if ($p_type == 'simple' || $p_type == 'attribute') {
							if (!empty($p__sale__price)) {
								$sale_calculation_step_01 = $p__price - $p__sale__price;
								$sale_calculation_step_02 = $sale_calculation_step_01 / $p__price;
								$sale_calculation_step_03 = $sale_calculation_step_02 * 100;
								$sale_percentage = floor($sale_calculation_step_03);
						?>
								<span class="p-action-tag">
									<?= $sale_percentage . '% off';  ?>
								</span>
						<?php
							}
						}
						?>


					</div>
					<p class="product-excerpt"><?= $p_excerpt ?></p>
					<div class="product-btn-wrapper col-12 <?= $disabled ?>">
						<?php $id__rand = rand(1, 100000);  ?>
						<div class="counter-box">
							<a href="javascript:void(0)" class="decreement_num">-</a>
							<a href="javascript:void(0)" class="quantity_num" id="<?= $product_id . '-' . $id__rand ?>"></a>
							<a href="javascript:void(0)" class="increement_num">+</a>
						</div>
						<a href="javascript:void(0)" class="product-btn product-action-btn <?= $disabled ?>" data-product-id='<?= $product_id ?>' data-product-type='<?= $p_type ?>' data-q-id=<?= $product_id . '-' . $id__rand ?>>Add To Cart</a>

						<a href="" class="product-btn buy-now <?= $disabled ?>">Buy now</a>
					</div>
					<?php
					if ($p_type == 'attribute' || $p_type == 'variation') {

						foreach ($attrNames as $indx => $attrOpts) {
							$attrValOptions = explode('|', $attrValues[$indx]);
					?>
							<div class="options-wrapper col-12">
								<label for="" class="select-labels"><?= dec_function($attrOpts) ?></label>
								<select name="" id="" class="product-opts" <?= $p_type == 'variation' ? "data-v-id='$prd_var_id'"  : "" ?>>
									<option value="">select <?= dec_function($attrOpts) ?></option>
									<?php
									foreach ($attrValOptions as $opt__value) {
									?> <option value="<?= rtrim($opt__value) ?>"><?= rtrim($opt__value) ?></option> <?php
																												}
																													?>
								</select>
							</div>
						<?php
						}

						?>

					<?php
					}
					?>
					<div class="product-additional-data col-12">
						<ul>
							<li><span>Sku:</span> <span class="sku"><?= $p_sku ?> </span></li>
							<li><span>Quantity:</span> <span class="quantity"><?= $p__quantity ?></span> </li>
							<li><span>category:</span>
								<?php
								$category_anchors = [];
								foreach ($p_category as $category_id) {
									$fetchCategoryData  = fetchOtherdetails($con, 'category', 'Id', $category_id);
									while ($anc__d = mysqli_fetch_assoc($fetchCategoryData)) {
										$category_anchors[] = "<a href='shop.php?catgeory_id=" . $anc__d['Id'] . "'>" . $anc__d['name'] . "</a> ";
									}
								}
								echo implode(',', $category_anchors);
								?>

							</li>
							<li><span>tags:</span> <?= $p_tags ?></li>
						</ul>
					</div>
					<div class="share-btn col-12">
						<a href=""><i class="fa-brands fa-facebook-f"></i></a>
						<a href=""><i class="fa-brands fa-x-twitter"></i></a>
						<a href=""><i class="fa-brands fa-linkedin-in"></i></a>
						<a href=""><i class="fa-brands fa-instagram"></i></a>
						<a href=""><i class="fa-brands fa-tiktok"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- tabs section starts here -->
	<div class="container-fluid product-information-section">
		<div class="container">
			<div class="row">
				<div class="col-12 info-navigation">
					<ul class="info-nav-ul">
						<li class="active-info-li" data-id="description-section">description</li>
						<li data-id="additional-info-section">Additonal-information</li>
						<li data-id="product-review">Reviews</li>
						<?php if ($p_vendor != '0') { ?> <li data-id="vendor-info">Vendor</li> <?php } ?>

					</ul>
				</div>

				<div class="col-12 tab-box info-box description-div " id="description-section">
					<?= $p__des ?>
				</div>

				<div class="col-12 tab-box additional-info table-responsive d-none" id="additional-info-section">
					<table class="info-table w-100">
						<tr>
							<td class="wi-30">Quantity</td>
							<td class="wi-70"><?= $p__quantity ?></td>
						</tr>
						<tr>
							<td class="wi-30">Product</td>
							<td class="wi-70"><?= $p_type ?></td>
						</tr>

						<tr>
							<td class="wi-30">Length</td>
							<td class="wi-70" id='length-td'><?= $p_dimensions[0] . ' cm' ?></td>
						</tr>
						<tr>
							<td class="wi-30">Width</td>
							<td class="wi-70" id='width-td'><?= $p_dimensions[1] . ' cm' ?></td>
						</tr>
						<tr>
							<td class="wi-30">Height</td>
							<td class="wi-70" id='height-td'><?= $p_dimensions[2] . ' cm' ?></td>
						</tr>
						<tr>
							<td class="wi-30">Product-Type</td>
							<td class="wi-70"><?= $p_type ?></td>
						</tr>
						<tr>
							<td class="wi-30">Product-Attribute</td>
							<td class="wi-70">
								<?php if ($p_type == 'attribute' || $p_type == 'variation') {
									echo implode(',', $attrNames);
								} else {
									echo 'no atributes';
								}  ?> </td>
						</tr>
						<tr>
							<td class="wi-30">Product-variations</td>
							<td class="wi-70">
								<?php
								if ($p_type == 'variation') {
									echo implode(',', $variation_name_arr);
								} else {
								?>
									no variations

								<?php
								}
								?>
							</td>
						</tr>
						<tr>
							<td class="wi-30">Shipping</td>
							<td class="wi-70">
								- </td>
						</tr>
						<tr>
							<td class="wi-30">Taxes</td>
							<td class="wi-70">
								- </td>
						</tr>
					</table>
				</div>

				<div class="col-12 tab-box product-review-system d-none" id="product-review">
					<div class="col-12 product-review">
						<div class="rev-wrapper d-flex flex-wrap">
							<div class="col-lg-2 col-md-4 col-sm-12 reviewer-image d-flex align-items-start justify-content-center py-2">
								<div class="reviewer-image-div">
									<img src="images/dashboard-img/p-1.jpg" alt="">
								</div>

							</div>
							<div class="col-lg-10 col-md-8 col-sm-12 d-flex flex-column">
								<div class="product-rating-div justify-content-start" data-rating='5'>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
								</div>
								<h2 class="review-title">brilliant product</h2>
								<p class="reviewer-details"><span class="">anas</span> on <span class="review-date">06 apr 2024</span></p>
								<p class="review-description">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis odit in eius enim placeat fuga doloribus corrupti possimus ea est nemo obcaecati temporibus asperiores iste recusandae, magni modi error labore?
								</p>
							</div>
						</div>
						<div class="rev-wrapper d-flex flex-wrap">
							<div class="col-lg-2 col-md-4 col-sm-12 reviewer-image d-flex align-items-start justify-content-center py-2">
								<div class="reviewer-image-div">
									<img src="images/dashboard-img/p-1.jpg" alt="">
								</div>

							</div>
							<div class="col-lg-10 col-md-8 col-sm-12 d-flex flex-column">
								<div class="product-rating-div justify-content-start" data-rating='5'>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
								</div>
								<h2 class="review-title">brilliant product</h2>
								<p class="reviewer-details"><span class="">anas</span> on <span class="review-date">06 apr 2024</span></p>
								<p class="review-description">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis odit in eius enim placeat fuga doloribus corrupti possimus ea est nemo obcaecati temporibus asperiores iste recusandae, magni modi error labore?
								</p>
							</div>
						</div>
						<div class="rev-wrapper d-flex flex-wrap">
							<div class="col-lg-2 col-md-4 col-sm-12 reviewer-image d-flex align-items-start justify-content-center py-2">
								<div class="reviewer-image-div">
									<img src="images/dashboard-img/p-1.jpg" alt="">
								</div>

							</div>
							<div class="col-lg-10 col-md-8 col-sm-12 d-flex flex-column">
								<div class="product-rating-div justify-content-start" data-rating='5'>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
								</div>
								<h2 class="review-title">brilliant product</h2>
								<p class="reviewer-details"><span class="">anas</span> on <span class="review-date">06 apr 2024</span></p>
								<p class="review-description">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis odit in eius enim placeat fuga doloribus corrupti possimus ea est nemo obcaecati temporibus asperiores iste recusandae, magni modi error labore?
								</p>
							</div>
						</div>
						<div class="rev-wrapper d-flex flex-wrap">
							<div class="col-lg-2 col-md-4 col-sm-12 reviewer-image d-flex align-items-start justify-content-center py-2">
								<div class="reviewer-image-div">
									<img src="images/dashboard-img/p-1.jpg" alt="">
								</div>

							</div>
							<div class="col-lg-10 col-md-8 col-sm-12 d-flex flex-column">
								<div class="product-rating-div justify-content-start" data-rating='5'>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
									<a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
								</div>
								<h2 class="review-title">brilliant product</h2>
								<p class="reviewer-details"><span class="">anas</span> on <span class="review-date">06 apr 2024</span></p>
								<p class="review-description">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis odit in eius enim placeat fuga doloribus corrupti possimus ea est nemo obcaecati temporibus asperiores iste recusandae, magni modi error labore?
								</p>
							</div>
						</div>
						
					
					</div>

					<div class="col-12 d-flex my-4 justify-content-center">
						<a href="javascript:void(0)" class="load-reviews-btn product-btn">Load more
							<span class="review-loader d-none"></span>

						</a>
					</div>

					<div class="write-product-review col-12">
						<h2>Add a review</h2>
						<form action="" method="post">
							<div class="col-12 d-flex review-field-wrapper">
								<div class="review-field-div">
									<input type="text" name="reviewer" placeholder="name">
								</div>
								<div class="review-field-div">
									<input type="text" name="reviewer" placeholder="email">
								</div>
							</div>
							<div class="col-12  d-flex review-field-wrapper">
								<div class="review-field-div">
									<div class="review-rating-div">
										<a href="javascript:void(0)" data-rating-val='1' class="rate-icon"><i class="fa-solid fa-star"></i></a>
										<a href="javascript:void(0)" data-rating-val='2' class="rate-icon"><i class="fa-solid fa-star"></i></a>
										<a href="javascript:void(0)" data-rating-val='3' class="rate-icon"><i class="fa-solid fa-star"></i></a>
										<a href="javascript:void(0)" data-rating-val='4' class="rate-icon"><i class="fa-solid fa-star"></i></a>
										<a href="javascript:void(0)" data-rating-val='5' class="rate-icon"><i class="fa-solid fa-star"></i></a>
									</div>
									<input type="hidden" name="rating" id="p-rating-num">
								</div>
							</div>
							<div class="col-12  d-flex review-field-wrapper">
								<div class="review-field-div">
									<input type="text" name="title" placeholder="review-title">
								</div>
							</div>
							<div class="col-12  d-flex review-field-wrapper">
								<div class="review-field-div">
									<textarea name="" id="" class="w-100 mt-4" rows="10" placeholder="review here"></textarea>
								</div>
							</div>
							<div class="col-12  d-flex review-field-wrapper">
								<input type="submit" value="submit" class="product-btn">
							</div>
						</form>
					</div>
				</div>
				<?php
				if ($p_vendor != '0') {
				?>
					<div class="col-12 tab-box vendor-section d-none" id="vendor-info">
						<?php

						//fetching vendor data
						$fetchVendorData = fetchOtherdetails($con, 'vendor', 'Id', $p_vendor);
						$vendorName = mysqli_fetch_assoc($fetchVendorData)['name'];
						$countVendorProducts = mysqli_query($con, "SELECT COUNT(*) AS `vpcount` FROM `product` WHERE `vendor_id` = '$p_vendor'");
						$pcts = mysqli_fetch_assoc($countVendorProducts)['vpcount'];
						//counting vendor servuce
						$countVendorService = mysqli_query($con, "SELECT COUNT(*) AS `vscount` FROM `service` WHERE `user_id` = '$p_vendor'");
						$scts = mysqli_fetch_assoc($countVendorService)['vscount'];


						?>
						<h6 class="ven-label">Sold by</h6>
						<h2 class="vendor-name"><?= dec_function($vendorName) ?></h2>
						<div class="vendor-info-wrapper d-flex justify-content-center table-responsive">
							<table class="w-100 info-table">
								<thead>
									<tr>
										<th>Total products</th>
										<th>Total services</th>
										<th>Average Rating</th>
										<th>Total revenue</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?= $pcts ?></td>
										<td><?= $scts ?></td>
										<td>3.5</td>
										<td>$75600</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>


	<?php include('include/footer.php'); ?>
	<?php include('include/cartsection.php'); ?>
	<div id="multiVendor-toast" class="m-toast"></div>

	<?php include('include/script.php'); ?>
	<script src="assets/js/single-product-page.js"></script>
	<script src="assets/js/index.js"></script>
	<?php
	if ($p_type == 'variation') {
	?>
		<script src="assets/js/fetchVariation.js"></script>

	<?php
	}
	?>


</body>

</html>