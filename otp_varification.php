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
<?php include 'pages/sweetalert.php' ?>
<?php include 'pages/validation.php' ?>

<body class="animsition">

	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/phone.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Forgot Password
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-50 p-b-50">
		<div class="container border bor shadow">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md ">
					<form action="processforgetotp.php" method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Enter OTP Code
						</h4>

                        <label class="form-control-label">OTP :</label>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="tel" name="otp"
								placeholder="Enter OTP...">
							<div class="fa fa-check how-pos4 pointer-none"></div>
							<!-- <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON"> -->
						</div>

						
						<center>
							<button
								name="submit" class=" stext-101 m-t-30 cl0 size-118 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
								SUBMIT OTP
								&nbsp;&nbsp;
								<i class="fa fa-sign-in" aria-hidden="true"></i>
							</button>
                            <!-- &nbsp;&nbsp;
                            <button
								name="ResendOTP" class=" stext-101 m-t-30 cl0 size-118 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
								RESEND OTP
								&nbsp;&nbsp;
								<i class="fa fa-sign-in" aria-hidden="true"></i>
							</button> -->
						</center>

					</form>
				</div>

				<div class="size-210  p-lr-70 p-lr-15-lg w-full-md p-2">

					<img src="./images/otp.jpg" width="600px" class="img-fluid m-tb-25 m-l-5">
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End Footer -->

</body>

</html>