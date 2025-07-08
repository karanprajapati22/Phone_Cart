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
			New Password
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-50 p-b-50">
		<div class="container border bor shadow">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md ">
					<form action="update_password.php" method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Enter New Password
						</h4>

								<div class="col-sm-12 form-group">
									<label class="form-control-label"><i class="fa fa-lock"></i>&nbsp;Password</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="password"></span>
									<input type="password" name="password" placeholder="Enter Password Here.." class="form-control bor password">
								</div>
								<div class="col-sm-12 form-group">
									<label class="form-control-label"><i class="fa fa-key"></i>&nbsp;Confirm
										Password</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="confirm"></span>
									<input type="text" name="confirm" placeholder="Enter Confirm Password Here.."
										class="form-control bor confirm">
								</div>
						
						<center>
							<button type="submit"
								name="submitpass" class="flex-c-m stext-101 m-t-30 cl0 size-118 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" id="submit">
								Submit
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