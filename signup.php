<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign up</title>
	<?php include_once 'pages/head.php' ?>
</head>
<style>
	.bor {

		border-radius: 10px;
	}
</style>

<?php include 'pages/validation.php' ?>

<?php include 'pages/sweetalert.php' ?>

<body class="animsition ">

	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/phonecart_logo.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Sign up
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-50 p-b-50">
		<div class="container border bor shadow p-4">
			<h1 class="well text-center">Registration Form</h1>
			<hr class="my-4">
			<div class="col-lg-12 well">
				<div class="row">
					<form action="check_signup.php" method="post" enctype="multipart/form-data">
						<div class="col-sm-12">
							<div class="row py-2">
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-user"></i>&nbsp;First Name :
										&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="fname"></span>
									<input type="text" name="fname" placeholder="Enter First Name Here.."
										class="form-control bor first_name" required>
								</div>
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-user"></i>&nbsp;Last Name :
										&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="lname"></span>
									<input type="text" name="lname" placeholder="Enter Last Name Here.."
										class="form-control bor last_name" required>
								</div>
							</div>

							<div class="row py-2">
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-envelope"></i>&nbsp;Email Address
										: &nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="email"></span>
									<input type="email" name="email" placeholder="Enter Email Address Here.."
										class="form-control bor email" required>
								</div>
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-phone"></i>&nbsp;Mobile No. :
										&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="mobile"></span>
									<input type="text" name="mobile" placeholder="Enter Mobile No. Here.."
										class="form-control bor mobile" required>
								</div>
							</div>

							<div class="row py-2">
								<div class="col-sm-4 form-group">
									<label class="form-control-label">City&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="city"></span>
									<input type="text" name="city" placeholder="Enter City Name Here.."
										class="form-control bor city" required>
								</div>
								<div class="col-sm-4 form-group">
									<label class="form-control-label">State</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="state"></span>
									<input type="text" name="state" placeholder="Enter State Name Here.."
										class="form-control bor state" required>
								</div>
								<div class="col-sm-4 form-group">
									<label class="form-control-label">Country</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="country"></span>
									<input type="text" name="country" placeholder="Enter Country Here.."
										class="form-control bor country" required>
								</div>
							</div>

							<div class="row py-2">
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i
											class="fa fa-mars-stroke"></i>&nbsp;Gender</label>
									<br>
									<div class="form-check form-check-inline">
										<input class="form-check-input bg-dark" type="radio" name="gender" value="Male"
											checked />
										<label class="form-control-label ">Male</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input bg-dark" type="radio" name="gender"
											value="Female" />
										<label class="form-control-label ">Female</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input bg-dark" type="radio" name="gender"
											value="Other" />
										<label class="form-control-label ">Other</label>
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-upload"></i>&nbsp;Profile
										Picture</label>
									<input type="file" name="profile" class="form-control bor" required>
								</div>
							</div>

							<div class="row py-2">
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-lock"></i>&nbsp;Password</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="password"></span>
									<input type="password" name="password" placeholder="Enter Password Here.."
										class="form-control bor password" required>
								</div>
								<div class="col-sm-6 form-group">
									<label class="form-control-label"><i class="fa fa-key"></i>&nbsp;Confirm
										Password</label>&nbsp;&nbsp;&nbsp;</label><span class="text-danger" id="confirm"></span>
									<input type="text" name="confirm" placeholder="Enter Confirm Password Here.."
										class="form-control bor confirm" required>
								</div>
							</div>
							<center>
								<button type="submit"
									class="flex-c-m stext-101 cl0 size-118 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer py-2"
									id="submit">
									Sign up
									&nbsp;&nbsp;
									<i class="fa fa-user-plus"></i>
								</button>
							</center>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End Footer -->

</body>

</html>