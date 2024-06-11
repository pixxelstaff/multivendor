<?php

session_start();

if (isset($_SESSION['user_email'])) {

	header('location:index.php');
}

?>



<!DOCTYPE html>

<html>



<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=divice-width, initial-scale=1">

	<title>SIGN IN </title>

	<?php include('include/links.php') ?>
    <style>
        .error {



            color: red !important;



        }
    </style>
</head>



<body>



	<?php include('include/header.php'); ?>





	<div class="container mt-5">

		<div class="row">

			<div class="col-md-6">

				<div class="signin-form">

					<h3>Sign in</h3>

					<p>Your Acount</p>

					<form action="" method="post" id="shah">

						<input type="text" name="email" placeholder="Email"><br>

						<input type="password" placeholder="Password" name="pass">

						<br>

						<small>Forget Password?</small><br>

						<button type="submit" name="user__log">Login</button><br>

					</form>
					<small style="float: none; display:block; text-align:center;">Don't have an account? <a href="user-reg.php" class="text-decoration-none">Sign Up</a> </small>
					<h6>or continue with</h6>

					<img src="assets/bootstrap/img/Frame 316.webp">

					<img src="assets/bootstrap/img/Frame 315.webp" style="width:10%;">

					<img src="assets/bootstrap/img/Frame 314.webp">

					<img src="assets/bootstrap/img/Frame 313.webp">

				</div>

			</div>



			<div class="col-md-6">

				<div class="signin-img">

					<img src="assets/bootstrap/img/sigin-img.webp">

				</div>



			</div>



		</div>

	</div>



	<div class="back-user-footer">

		<div class="container">

			<div class="row">

				<div class="col-md-3">

					<div class="user-footer-1">

						<img src="assets/bootstrap/img/logo-3.webp">

						<h3>Helpline Free 24/7</h3>

						<i class="fa-solid fa-headset"></i> <span> +1234 567 890</span><br>

						<i class="fa-regular fa-envelope"></i> <span> info@gmail.com</span>

					</div>

				</div>



				<div class="col-md-3">

					<div class="user-footer-2">

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



				<div class="col-md-3">

					<div class="user-footer-2">

						<h3>Categories</h3>

						<ul>

							<li><a href="#">Groceries</a></li>

							<li><a href="#">Health & Beauty</a></li>

							<li><a href="#">Men’s Fashion</a></li>

							<li><a href="#">Women’s Fashion</a></li>

							<li><a href="#">Mother Baby</a></li>

							<li><a href="#">Home & Lifestyles</a></li>

							<li><a href="#">Electronic Devices</a></li>

							<li><a href="#">Electronic Accessories</a></li>

							<li><a href="#">Sports & Outdoor</a></li>

							<li><a href="#">Watches & Bags</a></li>

						</ul>

					</div>

				</div>



				<div class="col-md-3">

					<div class="user-footer-2">

						<h3>Customer Service</h3>

						<ul>

							<li><a href="#">Return & Exchange</a></li>

							<li><a href="#">Shipping Policy</a></li>

							<li><a href="#">Privacy Policy</a></li>

							<li><a href="#">Terms & Condition</a></li>

							<li><a href="#">Safe & Secure</a></li>

							<li><a href="#">Refund Policy</a></li>

						</ul>

					</div>

				</div>

			</div>

		</div>

	</div>



	<div class="user-bottom-bar">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="user-bottom-bar-content">

						<p> © 2023 Shopping, All Rights Are Reserved</p>

					</div>



				</div>



			</div>



		</div>



	</div>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script>
        $(document).ready(() => {

            $("#shah").validate({

                rules: {

                    email: "required",

                    pass: "required",

                },
                messages: {

                    email: "put your email",

                    pass: "put your password",

                }


            })
        })
    </script>


</body>



</html>





<?php



if (isset($_POST['user__log'])) {

	if (!empty($_POST['email']) && !empty($_POST['pass'])) {

		$email = mine_sanitize_string($_POST['email']);

		$pass = $_POST['pass'];

		$check__email = fetchOtherdetails($con, 'user', 'email', $email);



		if (mysqli_num_rows($check__email) > 0) {

			while ($sh = mysqli_fetch_assoc($check__email)) {

				$status = $sh['status'];

				$hash_password = $sh['password'];
			}

			if ($status == '1') {

				if (password_verify($pass, $hash_password)) {

					$_SESSION['user_email'] = $email;

?>

					<script>
						window.location = 'index.php'
					</script>

<?php

				} else {

					alerting('wrong password', 'sign-in.php');
				}
			} else {

				alerting('your account has been bloacked by admin contact for further process', 'sign-in.php');
			}
		} else {

			alerting('email not found please register', 'user-reg.php');
		}
	}
}
