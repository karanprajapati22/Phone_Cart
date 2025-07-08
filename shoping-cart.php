<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Shoping Cart</title>
	<?php include_once 'pages/head.php' ?>
</head>
<script>
	function cart_del(cart_id) {
		swal({
				title: "Are you sure?",
				text: "Remove this Product from your Cart !",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: "admin/operation/deletepage.php",
						type: "POST",
						data: {
							id: cart_id,
							page_name: "cart",
							id_name: "cart_id",
						},
						success: function (data) {
							if (data == 1) {
								data = " ";
								subtotal();
								cartcount();
								$('#cart_' + cart_id).html(data);
							}
						}
					});
					swal("Poof! Product Removed Successfully Deleted!", {
						icon: "success",
					});
				} else {
					swal("Your Cart is safe!");
				}
			});
	}

	function cart_click(val, id) {
		// alert(id);
		var stock = $("input[name='stock_qty']").val();
		var qty1 = $("#qty_" + id).val();
		// alert(qty1);

		if (val == 1) {
			if (qty1 <= stock - 1) {
				qty = parseInt(qty1) + 1;
			} else {
				qty = stock;
				$("#qty_" + id).val(stock - 1);
				alert('Out of Quantity');
			}
		} else {
			qty2 = parseInt(qty1);
			if (qty2 >= 2) {
				qty = qty2 - 1;
			} else {
				qty = 1;
			}
		}
		// alert(qty);
		var price = $("#price_" + id).val();
		// alert(price);
		$.ajax({
			type: "post",
			url: "updateqty.php",
			data: {
				cart_id: id,
				prod_qty: qty,
				prod_price: price
			},
			success: function (data) {
				// alert(data);
				$("#total_" + id).html(data);
				subtotal();
			}
		});
	}

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
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<?php
					$email=$_SESSION['email'];
					include_once  'admin/dbcontroller.php';
					$handle = new DBcontroller();
					$query="select * from cart where status='pending' and reg_id=(select reg_id from registration where email='$email') order by prod_id desc";
					// $fetch=$handle->fetchall($query);
					// $handle->formate($fetch);
				?>
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart table-hover">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
									$count=$handle->numrows($query);
									if($count>0){
									$fetch=$handle->fetchall($query);
									$sub_total=0;
										 foreach($fetch as $row){
											$total=$row['prod_price']*$row['prod_qty'];
											$sub_total=$sub_total+$total;
								?>
								<tr class="table_row" id="cart_<?php echo $row['cart_id']; ?>">
									<td class="column-1">
										<div class="how-itemcart1" onclick="cart_del(<?php echo $row['cart_id']; ?>);">
											<img src="admin/img/product/convert/RC<?php echo $row['prod_image']; ?>"
												alt="IMG">
										</div>
									</td>
									<td class="column-2 px-1"><?php echo $row['prod_name']; ?></td>
									<td class="column-3"><?php echo '₹ '.$row['prod_price']; ?></td>
									<input type="hidden" id="price_<?php echo $row['cart_id']; ?>"
										value="<?php echo $row['prod_price']; ?>">
									<td class="column-4">
										<?php
												$temp_id=$row['prod_id'];
												
													$qty_prod="select prod_qty from product where prod_id='$temp_id'"; 
													$temp_qty=$handle->fetchresult($qty_prod);
													$temp_qty2= $temp_qty['prod_qty'];
												?>
										<input type="hidden" name="stock_qty" value="<?php echo $temp_qty2 ?>">

										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
												onclick="cart_click(0,<?php echo $row['cart_id']; ?>);">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product"
												id="qty_<?php echo $row['cart_id']; ?>" type="number"
												name="num-product1" value="<?php echo $row['prod_qty']; ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
												onclick="cart_click(1,<?php echo $row['cart_id']; ?>);">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5" id="total_<?php echo $row['cart_id']; ?>">
										<?php echo '₹ '.$total; ?></td>
								</tr>
								<?php
										}
									}else{
										echo "<div id='message' class='alert alert-danger text-center'>There is No Products in Cart </div> ";	
										$sub_total=00.00;
									}
								?>
							</table>
						</div>

						<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
									name="coupon" placeholder="Coupon Code">

								<div
									class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div
								class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div> -->
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

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

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>
							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo 'FREE'; ?>
								</span>
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

						<button type="button" onclick="window.location='checkout.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>




	<!-- footer -->
	<?php include_once 'pages/footer.php' ?>
	<!-- End footer -->
	<?php include_once 'pages/sidecart.php' ?>

</body>

</html>