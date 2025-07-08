<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign in</title>
	<?php include_once 'pages/head.php' ?>
	<style>
		.bor {

			border-radius: 10px;
		}
	</style>
</head>

<?php include 'pages/validation.php' ?>

<?php include 'pages/sweetalert.php' ?>

<body class="animsition">

	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/phonecart_logo.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Sign in
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-50 p-b-50">
		<div class="container border bor shadow">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md ">
					<form action="check_signin.php" method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Enter Your Details
						</h4>
						<span class="text-danger" id="email"></span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 email" type="text" name="email"
								placeholder="Your Email Address" required>
							<div class="fa fa-envelope how-pos4 pointer-none"></div>
							<!-- <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON"> -->
						</div>
						
						<span class="text-danger" id="password"></span>
						<div class="bor8 m-b-10 how-pos4-parent">
							<input type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 password" name="password"
								placeholder="Enter your password" required>
							<div class="fa fa-key how-pos4 pointer-none"></div>
							<!-- <img class="how-pos4 pointer-none"  src="images/icons/pass1.png" alt="ICON"> -->

						</div>
						<a href="forgot_pass.php" class="m-b-10">Forget Password</a>
						<center>
							<button
								class="flex-c-m stext-101 m-t-30 cl0 size-118 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" id="submit">
								Sign in
								&nbsp;&nbsp;
								<i class="fa fa-sign-in" aria-hidden="true"></i>
							</button>
						</center>

					</form>
				</div>

				<div class="size-210  p-lr-70 p-lr-15-lg w-full-md p-2">

					<img src="./images/loginimg.jpg" width="600px" class="img-fluid m-tb-25 m-l-5">
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End Footer -->

</body>

</html>