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
					<div class="row">
							<div class="col-12 col-md-6">
								<div class="checkout_details_area mt-50 clearfix">

									<div class="cart-page-heading">
										<h5>Billing Address</h5>
										<hr>
									</div>

									<form action="check_checkout.php" method="post">
										<div class="row">
											<div class="col-md-6 mb-3">
												<label class="form-control-label" for="first_name">First Name <span>*</span></label>
												<input type="text" class="form-control bor" name="f_name" required>
											</div>
											<div class="col-md-6 mb-3">
												<label class="form-control-label" for="last_name">Last Name <span>*</span></label>
												<input type="text" class="form-control bor" name="l_name">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="street_address">House No./Society Name <span>*</span></label>
												<input type="text" class="form-control bor mb-3" name="society">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="street_address">Area/Street Name <span>*</span></label>
												<input type="text" class="form-control bor mb-3" name="street">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="street_address">Landmark <span>*</span></label>
												<input type="text" class="form-control bor mb-3" name="landmark">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="city">Town/City <span>*</span></label>
												<input type="text" class="form-control bor" name="city">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="postcode">Postcode <span>*</span></label>
												<input type="text" class="form-control bor" name="pin">
											</div>
											<div class="col-12 mb-3">
												<label class="form-control-label" for="phone_number">Mobile No <span>*</span></label>
												<input type="number" class="form-control bor" name="mob">
											</div>
											<!-- <div class="col-12 mb-4">
												<label class="form-control-label" for="email_address">Email Address <span>*</span></label>
												<input type="email" name="email" class="form-control bor">
											</div> -->
										</div>
								</div>
							</div>
							<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
								<?php
									if(isset($_GET['id'])){
								?>
									<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
										<h4 class="mtext-109 cl2 p-b-30">
										<?php
										$query="select * from cart where `cart_id`='". $_GET['id'] ."' and `status`='pending'";
										$count=$handle->numrows($query);
										?>
											<h5>Your Order</h5>
											<p>The Details</p>
										</h4>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Product Total:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2" id="subtotal">
													<?php echo $count; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">Name</th>
																<th scope="col">Qty</th>
																<th scope="col">Price</th>
															</tr>
														</thead>
														<tbody>
															<?php
											if($count>0){
												$fetch=$handle->fetchall($query);
												$_SESSION['cart']=$fetch;
												$sub_total=0;
													foreach($fetch as $row){
														$total=$row['prod_price']*$row['prod_qty'];
														$sub_total=$sub_total+$total;
											?>
															<tr>
																<td><?php echo $row['prod_name'] ?></td>
																<td><?php echo $row['prod_qty'] ?></td>
																<td><?php echo $total ?></td>
															</tr>
															<?php
													}
												}else{
													echo "<div id='message' class='alert alert-danger text-center'>There is No Products in Cart </div> ";	
													$sub_total=00.00;
												}
											?>
														</tbody>
													</table>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Subtotal:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2" id="subtotal">
													<?php echo '₹ '.$sub_total ; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Shipping:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2">
													<?php echo 'FREE'; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-t-15 p-b-30">
											<div class="size-208 w-full-ssm">
												<span class="stext-110 cl2">
													Payment :
												</span>
											</div>

											<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
												<p class="stext-111 cl6 p-t-2">
													Select Payment Method.
												</p>

												<div class="p-t-15">
													<span class="stext-112 cl8">
														Payment Options :
													</span>

													<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
														<div class="form-check form-check-inline">
															<input class="form-check-input bg-light" type="radio"
																name="payment" value="cod" />
															<label class="form-control-label ">COD (Cash on
																Delivery)</label>
														</div>
														<br>
														<div class="form-check form-check-inline">
															<input class="form-check-input bg-light" type="radio"
																name="payment" value="pay" />
															<label class="form-control-label ">Online (Razorpay)</label>
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="flex-w flex-t p-t-27 p-b-33">
											<div class="size-208">
												<span class="mtext-101 cl2">
													Total:
												</span>
											</div>

											<div class="size-209 p-t-1">
												<span class="mtext-110 cl2" id="subtotal1">
													<?php echo '₹ '.$sub_total; ?>
												</span>
											</div>
										</div>

										<button type="submit" name="insertbilling"
											class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer main_btn">
											Place Order
										</button>
									</div>
								<?php
									}
									else
									{
								?>
									<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
										<h4 class="mtext-109 cl2 p-b-30">
										<?php
										$query="select * from cart where `reg_id`=(select `reg_id` from registration where `email`='$user') and `status`='pending'";
										$count=$handle->numrows($query);
										?>
											<h5>Your Order</h5>
											<p>The Details</p>
										</h4>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Product Total:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2" id="subtotal">
													<?php echo $count; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">Name</th>
																<th scope="col">Qty</th>
																<th scope="col">Price</th>
															</tr>
														</thead>
														<tbody>
															<?php
											if($count>0){
												$fetch=$handle->fetchall($query);
												$_SESSION['cart']=$fetch;
												$sub_total=0;
													foreach($fetch as $row){
														$total=$row['prod_price']*$row['prod_qty'];
														$sub_total=$sub_total+$total;
											?>
															<tr>
																<td><?php echo $row['prod_name'] ?></td>
																<td><?php echo $row['prod_qty'] ?></td>
																<td><?php echo $total ?></td>
															</tr>
															<?php
													}
												}else{
													echo "<div id='message' class='alert alert-danger text-center'>There is No Products in Cart </div> ";	
													$sub_total=00.00;
												}
											?>
														</tbody>
													</table>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Subtotal:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2" id="subtotal">
													<?php echo '₹ '.$sub_total ; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-b-13">
											<div class="size-208">
												<span class="stext-110 cl2">
													Shipping:
												</span>
											</div>

											<div class="size-209">
												<span class="mtext-110 cl2">
													<?php echo 'FREE'; ?>
												</span>
											</div>
										</div>

										<div class="flex-w flex-t bor12 p-t-15 p-b-30">
											<div class="size-208 w-full-ssm">
												<span class="stext-110 cl2">
													Payment :
												</span>
											</div>

											<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
												<p class="stext-111 cl6 p-t-2">
													Select Payment Method.
												</p>

												<div class="p-t-15">
													<span class="stext-112 cl8">
														Payment Options :
													</span>

													<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
														<div class="form-check form-check-inline">
															<input class="form-check-input bg-light" type="radio"
																name="payment" value="cod" />
															<label class="form-control-label ">COD (Cash on
																Delivery)</label>
														</div>
														<br>
														<div class="form-check form-check-inline">
															<input class="form-check-input bg-light" type="radio"
																name="payment" value="pay" />
															<label class="form-control-label ">Online (Razorpay)</label>
														</div>
													</div>

												</div>
											</div>
										</div>

										<div class="flex-w flex-t p-t-27 p-b-33">
											<div class="size-208">
												<span class="mtext-101 cl2">
													Total:
												</span>
											</div>

											<div class="size-209 p-t-1">
												<span class="mtext-110 cl2" id="subtotal1">
													<?php echo '₹ '.$sub_total; ?>
												</span>
											</div>
										</div>

										<button type="submit" name="insertbilling"
											class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer main_btn">
											Place Order
										</button>
									</div>
								<?php
									}
								?>
								</from>
							</div>
					</div>
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