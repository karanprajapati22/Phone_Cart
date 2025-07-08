<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Check Out</title>
	<?php include_once 'pages/head.php' ?>
	<style>
		.bor {

			border-radius: 10px;
		}
	</style>
</head>
<script>
	function subtotal() {
		$.ajax({
			type: "post",
			url: "cartsubtotal.php",
			success: function (data2) {
				// alert(data2);
				$("#subtotal").html(data2);
				$("#subtotal1").html(data2);
			}
		});
	}
</script>

<body class="animsition">

	<!-- Header -->

	<?php include_once 'pages/header.php' ?>

	<!-- breadcrumb -->
	<div class="container m-t-120">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Check Out
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</span>

			<span class="stext-109 cl4">
                Confirm Check Out
            </span>
		</div>
	</div>
	<?php
		$user=$_SESSION['email'];
		include_once  'admin/dbcontroller.php';
		$handle = new DBcontroller();
	?>

	<!-- Shoping Cart -->
	<div class="bg0 p-t-50 p-b-85">
		<div class="container">
			<!-- ****** Checkout Area Start ****** -->
			<div class="checkout_area section_padding_100">
				<div class="container">
                    <!--================Checkout Area =================-->
                    <section class="instagram spad mt-5">
                            <div class="container">
                                <div class="section-title">

                                <center class="my-2">
                                        <h2>Thank you for your support.</h2></br>
                                        <a href="viewinvoice.php " class="h3 "> <span>
										<i class="fa fa-invoice fa-lg mr-2 icon-inline"></i>&nbsp;View Invoice
                                            </span></a>
                                </center>
                                    
                                    <center class="my-2">
                                        <a href="vieworder.php " class="h3 "> <span>
										<i class="fa fa-truck fa-lg mr-2 icon-inline"></i>&nbsp;View Order
                                            </span></a>
                                    </center>
                                </div></br>
                                <div class="row ">
                                    <div class="col-lg-4 p-0">
                                        <div class="instagram__text">
                                            <div class="section-title">
                                                <span>Follow us on instagram</span>
                                                <h2>Sweet moments are saved as memories.</h2>
                                            </div>
                                            <h5><i class="fa fa-instagram"></i> @Phonecart</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-8  border mb-5">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                                <div class="instagram__pic">
                                                    <img src="images/ban1.jpg"  height="240px" width="240px" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                                <div class="instagram__pic middle__pic">
                                                    <img src="images/ban3.jpg"  height="240px" width="240px" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                                <div class="instagram__pic middle__pic">
                                                    <img src="images/ban2.jpg"  height="240px" width="240px" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
				</div>
			</div>
			<!-- ****** Checkout Area End ****** -->
		</div>
	</div>

	<!-- footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End footer -->
	<?php include_once 'pages/sidecart.php' ?>

</body>

</html>