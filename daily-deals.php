<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>DAILY DEALS </title>
	<?php include('include/links.php'); ?>


	<!-- slider slik links end -->
</head>

<body>
	<?php include('include/header.php'); ?>


	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="daily-deals-content-one">
					<img src="assets/bootstrap/img/headphones-pink.webp">
					<h3>Apple Headphones</h3>
					<p>Lorem Ipsum is simply dummy text <br> of the printing.</p>
					<button>Shop Now</button>
				</div>
			</div>

			<div class="col-md-6">
				<div class="daily-deals-content-one">
					<img src="assets/bootstrap/img/daily-watch.webp">
					<h3>Meet Alpinerx Blue And Black</h3>
					<p> It’s a long established fact <br>that a reader.</p>
					<button>Shop Now</button>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<?php
			$approve = '1';
			$totalProducts = fetchOtherdetails($con, 'product', 'approve', $approve);
			$totalPrdCount = mysqli_num_rows($totalProducts);
			$resultCount = '';
			$limit = 12;
			$product_qry = "SELECT * FROM `product` WHERE `approve` = ? ORDER BY `id` DESC LIMIT $limit";
			$prepare_product_qry = mysqli_prepare($con, $product_qry);
			mysqli_stmt_bind_param($prepare_product_qry, 's', $approve);
			if (mysqli_stmt_execute($prepare_product_qry)) {
				$result = mysqli_stmt_get_result($prepare_product_qry);
				$resultCount = mysqli_num_rows($result);
				while ($prd = mysqli_fetch_assoc($result)) {
			?>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="daily-boxs">
							<img src="images/uploadimg/<?= $prd['featured_image'] ?>" class="featured-img">
							<a href="top-products.php?id=<?= base64_encode($prd['id']) ?>" class="title-anc">
								<h4 class="prd-title"><?= $prd['name'] ?></h4>
							</a>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star cart-content-star-without-color" style="color:#AAAAAA;"></i>
							<p>
								<?php
								if ($prd['sale_price']) {
								?>
									<span style="text-decoration: line-through;"><?= '$' . $prd['price'] ?></span>
									$<?= $prd['sale_price'] ?>
								<?php
								} else {
									echo '$' . $prd['price'];
								}
								?>
							</p>
						</div>
					</div>
			<?php
				}
			} else {
			}

			?>






		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="daily-page-button">
					<?php
					if ($totalPrdCount > $resultCount) {
					?>
						<button>LOAD MORE</button>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>



	<div class="back-4">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-1">
						<img src="assets/bootstrap/img/logo-2.webp">
						<h3>Contact Info</h3>
						<span><i class="fa-solid fa-headset"></i>
							<p> Helpline Free 24/7 <br> +1234 567 890 </p>
						</span>
						<span><i class="fa-regular fa-envelope"></i>
							<p>infoshopping@gmail.com</p>
						</span>
					</div>
				</div>
				<div class="col-md-2">
					<div class="footer-2">
						<h3>Pages</h3>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Top Product</a></li>
							<li><a href="#">daily Deals</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2">
					<div class="footer-3">
						<h3>Categories</h3>
						<ul>
							<li><a href="#">Groceries</a></li>
							<li><a href="#">Health & Beauty</a></li>
							<li><a href="#">Men’s Fashion</a></li>
							<li><a href="#">Women’s Fashion</a></li>
							<li><a href="#">Mother Baby</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2">
					<div class="footer-4">
						<ul>
							<li><a href="#">Home & Lifestyles</a></li>
							<li><a href="#">Electronic Devices</a></li>
							<li><a href="#">Electronic Accessories</a></li>
							<li><a href="#">Sports & Outdoor</a></li>
							<li><a href="#">Watches & Bags </a></li>
						</ul>
					</div>
				</div>



				<div class="col-md-3">
					<div class="footer-3">
						<h3>Customer Service</h3>
						<ul>
							<li><a href="#">Return & Exchange</a></li>
							<li><a href="#">Shipping Policy</a></li>
							<li><a href="#">Terms & Condition</a></li>

						</ul>
					</div>
				</div>

			</div>

		</div>
	</div>

	<div class="back-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="down-bar">
						<p> © 2023 Shopping, All Rights Are Reserved</p>
					</div>

				</div>

			</div>

		</div>

	</div>



</body>

</html>