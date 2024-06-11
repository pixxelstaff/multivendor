<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>SHIPPING</title>
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
			<div class="col-md-8 ">

				<div class="shipping-buttons">
					<button class="button-1 " id="b" onclick="toggle1()"> 1 </button>



					<button class="button-2" id="a" onclick="toggle()"> 2 </button>
				</div>


				<div class="shipping-form ">


					<div class="shipping-buttons-pra">
						<p>Shipping and <br>Gift Options</p>

						<p class="shipping-buttons-pra-2" id="c">Payment and <br>Billing</p>
					</div>

					<form id="div1">
						<div class="inputs mb-3">
							<label>First Name<br> <input type="text" class="w-100 form-control "></label>
							<label>First Name <br> <input type="text" class="w-100 form-control"></label>
						</div>
						<div class="mb-4"><label>Street Address </label><br><input type="text" class="w-100 form-control"></div>
						<div class="inputs mb-3">
							<label>First Name<br> <input type="text" class="w-100 form-control"></label>
							<label>First Name <br> <input type="text" class="w-100 form-control"></label>
						</div>
						<div class="mb-4"><label>State </label><br><input type="text" class="w-100 form-control"></div>
						<div class="mb-4"><label>Phone Number </label><br><input type="text" class="w-100 form-control"></div>
						<div class="shipping-next-button "><button onclick="toggle()" id="click-next">NEXT</button></div>

					</form>
				</div>


				<div class="shipping-form-2" id="div2">

					<div class="small-form">
						<button> <img src="assets/bootstrap/img/dot-img.webp"> Credit / Debit Card</button>
						<button class="small-form-button-2"> <img src="assets/bootstrap/img/dot-img.webp"> Other Payment Methods</button>

						<div class="small-form-margin-left">
							<div class="mt-3 mb-3 "><label>Card Number<br> </label> <input type="number" class="w-100 form-control "></div>
							<div class="inputs  mt-4 ">
								<label>Expiration MM/YY <input type="text" class="w-100 form-control mt-2"></label>
								<label>Security Code <input type="password" class="w-100 form-control mt-2"></label>
							</div>
							<div class="shipping-form-2-buttons-cancel-next mt-4 ">
								<button>CANCEL</button>
								<button style="background-color: #FF9900;">NEXT</button>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-4">
				<div class="summary-box shipping-summary-box-left">
					<h3>Summary</h3>
					<p>Do you have a promo code?</p>
					<input type="text" name=""><button>Apply</button>
					<h6></h6>
					<div class="subtotal">
						<h4>SUBTOTAL</h4>
						<p>Shipping fee</p>
						<p>Discount Shipping fee</p>
					</div>
					<div class="subtotal-values">
						<h4>$ 439.96</h4>
						<p>$ 30</p>
						<p>$ 30</p>
					</div>
					<div class="estimated-total shipping-page-border-none">
						<p> ESTIMATED TOTAL <span>$ 439.96</span></p>
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


	<!-- <style type="text/css">
  .custom-border::before {
	content: "";
    width: 23%;
    height: 0px;
    border-top: 2px solid black;
    position: absolute;
    top: 19px;
    right: 90px; 
  }
</style> -->

	<script type="text/javascript">
		function toggle() {
			event.preventDefault();
			var x = document.getElementById("div2");
			var y = document.getElementById("div1");


			if (x.style.display = "none") {

				x.style.display = "block";


				y.style.display = "none";



			} else {
				x.style.display = "none";
			}
		}



		function toggle1() {
			var x = document.getElementById("div2");
			var y = document.getElementById("div1");

			if (x.style.display = "none") {

				y.style.display = "block";
				x.style.display = "none";
			} else {
				y.style.display = "block";
			}



		}


		var butt = document.getElementById("a");
		var button2 = document.getElementById("b");
		// var button1 =document.querySelector(".button-2");
		const pracolor = document.getElementById("c");
		butt.addEventListener("click", () => {
			butt.style.backgroundColor = "black";
			butt.classList.add('custom-border');
			butt.classList.remove('button-2');
			// button1.style.borderTop="thick solid black";
			pracolor.style.color = "black";



		});


		button2.addEventListener("click", () => {
			butt.style.backgroundColor = "#808080";
			butt.classList.remove('custom-border');
			butt.classList.add('button-2');
			pracolor.style.color = "#808080";

		});


		var clickNext = document.getElementById("click-next");
		clickNext.addEventListener("click", () => {
			butt.style.backgroundColor = "black";
			butt.classList.add('custom-border');
			butt.classList.remove('button-2');
			// button1.style.borderTop="thick solid black";
			pracolor.style.color = "black";
		});
	</script>









</body>

</html>