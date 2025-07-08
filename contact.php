<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact</title>
	<?php include_once 'pages/head.php' ?>
</head>
<?php include 'pages/sweetalert.php' ?>
<?php include 'pages/validation.php' ?>

<body class="animsition">

	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/frankie.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Contact
		</h2>
	</section>
	<style>
		body {
			background-color: #eee;
		}

		div.stars {

			width: 270px;

			display: inline-block;

		}

		.mt-200 {
			margin-top: 50px;
		}

		input.star {
			display: none;
		}



		label.star {

			float: right;

			padding: 10px;

			font-size: 36px;

			color: #4A148C;

			transition: all .2s;

		}



		input.star:checked~label.star:before {

			content: '\f005';

			color: #FD4;

			transition: all .25s;

		}


		input.star-5:checked~label.star:before {

			color: #FE7;

			text-shadow: 0 0 20px #952;

		}



		input.star-1:checked~label.star:before {
			color: #F62;
		}



		label.star:hover {
			transform: rotate(-15deg) scale(1.3);
		}



		label.star:before {

			content: '\f006';

			font-family: FontAwesome;

		}
	</style>

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="post" action="chack_contact.php">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>

						<span class="text-danger" id="email"></span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<div class="container d-flex justify-content-center mt-200">
								<div class="row">
									<div class="col-md-12">
										<div class="stars">
											<input class="star star-5" value="5" id="star-5" type="radio" name="star" />
											<label class="star star-5" for="star-5"></label>
											<input class="star star-4" value="4" id="star-4" type="radio" name="star" />
											<label class="star star-4" for="star-4"></label>
											<input class="star star-3" value="3" id="star-3" type="radio" name="star" />
											<label class="star star-3" or="star-3"></label>
											<input class="star star-2" value="2" id="star-2" type="radio" name="star" />
											<label class="star star-2" for="star-2"></label>
											<input class="star star-1" value="1" id="star-1" type="radio" name="star" />
											<label class="star star-1" for="star-1"></label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 email" type="text" name="email"
								placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
								placeholder="How Can We Help?"></textarea>
						</div>

						<button type="submit"
							class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Sec-23, Gh-6, Gandhinagar, Gujarat, India, 382424.
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>
							<p class="stext-115 cl1 size-213 p-t-18">
								+91 9601546877
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								phonecart2024@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Map -->
	<div class="map">
		<!-- <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787"
			data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> -->
		<div>
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.0762480055655!2d72.65297461489477!3d23.240312284843167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2b9bc02e8803%3A0x48d245a8f0271504!2sBholabhai%20Patel%20College%20of%20Computer%20Studies!5e0!3m2!1sen!2sin!4v1677209124842!5m2!1sen!2sin"
				width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>

	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End Footer -->

	<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
	<!--===============================================================================================-->
</body>

</html>