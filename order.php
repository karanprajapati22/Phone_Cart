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
                <section class="checkout spad">
        <div class="container">
            <div>
                <div class="vertical_post check_box_agile">
                    <h5 style="font-weight:bolder; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:25px; color:black; font-style:italic">COD (Cash On Delivery)</h5>
                    <form action="insertorder.php" method="post" class="cashon_delivery">
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery p-2">
                                <label class="anim">
                                    <input style="height:15px; width:15px;" type="checkbox" class="checkbox" name="cash" value="Cash on Delivery" required>&nbsp;&nbsp;<span style="font-size:20px; font-style:italic"> Sure you want to make order.</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                        <div class="col-md-5">
                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail mx-1 my-2" style="cursor:pointer" name="insertorder">CONFIRM ORDER</button>
                        </div>
                        <div class="col-md-5">
                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail mx-1 my-2" style="cursor:pointer" onclick="history.back()">Back</button>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout Section End -->

				</div>
			</div>
			<!-- ****** Checkout Area End ****** -->
		</div>
	</div>



    <!-- Footer Section Begin -->
    <script>
        $(document).ready(function() {
            if ($(" .coupon_question").is(":checked")) {
                $(".div1").hide(800);
            }
            $(".coupon_question").click(function() {
                if (!$(this).is(":checked")) {
                    $(".div1").show(800);
                } else {
                    $(".div1").hide(800);
                }
            });
        });
    </script>

	<!-- footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End footer -->
	<?php include_once 'pages/sidecart.php' ?>

</body>

</html>