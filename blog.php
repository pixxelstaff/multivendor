<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>BLOG</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/style.css">
	<script src="assets/bootstrap/js/style.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/img">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
<?php include('include/header.php'); ?>


	<div class="container">
		<!-- <div class="row">
			<div class="col-md-4">
				<div class="recent-heading">
					<h3>Recent Post</h3>
				</div>
			</div>
			<div class="col-md-6">
				
			</div>
			
		</div> -->
		<div class="row">
			<div class="col-md-4">
				<div class="recent-post-heading">
					<h3>Recent Post</h3>
				</div>
				<div class="blog-recent-post">
					<img src="assets/bootstrap/img/blog-img-1.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>

				<div class="blog-recent-post">
					<img src="assets/bootstrap/img/blog-img-2.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>

				<div class="blog-recent-post">
					<img src="assets/bootstrap/img/blog-img-3.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>

				<div class="blog-recent-post">
					<img src="assets/bootstrap/img/blog-img-4.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="img-with-content">
					<img src="assets/bootstrap/img/blog-img-1.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>
				<div class="img-with-content">
					<img src="assets/bootstrap/img/blog-img-3.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="img-with-content">
					<img src="assets/bootstrap/img/blog-img-2.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
				</div>
				<div class="img-with-content">
					<img src="assets/bootstrap/img/blog-img-4.webp">
					<h3>Lorem ipsum</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry’s standard dummy text ever science the 1500s. </p>
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