<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>MY ACCOUNTS</title>
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
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>

<?php include('include/header.php'); ?>


	<div class="myaccount-back-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="profile-information">
						<p>Profile information</p>
						<div class="myaccount-inputs-firts">
							<label> &nbsp; First Name <input type="text" class=" w-100 form-control mt-2"> </label>
							<label> &nbsp; Last Name <input type="text" class="  w-100 form-control mt-2"> </label>
							<label> &nbsp; Email Address <input type="email" class=" w-100 form-control mt-2"></label>
						</div>
					</div>


					<div class="password-information">
						<p>Password</p>
						<div class="myaccount-inputs-second">
							<label>Current password</label><br><input type="password" class="w-100 form-control mt-2">
						</div>
						<div class="myaccount-inputs-second-2">
							<label> &nbsp; New Password <input type="password" class=" w-100 form-control mt-2"> </label>
							<label> &nbsp; Confirm password <input type="password" class="  w-100 form-control mt-2"> </label>
						</div>
						<div class="password-information-button"><button>CHANGE PASSWORD</button></div>
					</div>



					<div class="my-order-information">
						<table class="table " style="border:1px solid black;">
							<tr class="tabel-head-style" style="border-bottom: 1px solid black;">
								<th>My Orders </th>
							</tr>
							<tr class="tr-2" style="border-bottom: 1px solid black;">
								<td>Orders</td>
								<td>Data</td>
								<td>Status</td>
								<td>Total</td>
							</tr>
							<tr class="tr-2">
								<td> <b>#001</b></td>
								<td class="mm">November, 11 , 2023</td>
								<td>On Way</td>
								<td>On Way</td>
								<td><button>View</button></td>
								<td><button style="background: transparent;">Track</button></td>
							</tr>
						</table>
					</div>



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