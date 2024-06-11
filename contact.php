<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>CONTACT US </title>
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
		<div class="row">
			<div class="col-md-6">
				<div class="contact-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.8649544452655!2d68.33894497412437!3d25.375842124444034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x394c7083c9aa9919%3A0xf9b86c1e1908a0c9!2sPixxel%20House!5e0!3m2!1sen!2s!4v1702283039033!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>

			<div class="col-md-6">
				<div class="contact-form">
					<h3>Send Us A Message</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
					<form>
						<div class="contact-name">
							<label>Your Name</label><br>
							<input type="text">

						</div>
						<div class="contact-name">
							<label>Your Email</label><br>
							<input type="text ">
						</div>

						<div class="contact-subject">
							<label>Subject</label><br>
							<input type="text" name="">
						</div>

						<div class="contact-textarea">
							<label>Mesaage</label><br>
							<textarea></textarea>
						</div>
					</form>
					<button>Send Message</button>


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