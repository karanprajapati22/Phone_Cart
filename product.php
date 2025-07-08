<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<?php include_once 'pages/head.php' ?>
</head>
<script>
	$(document).ready(function () {
		$(document).on("keyup", "#search_prod", function () {
			var s = $(this).val();
			// alert(s);
			// console.log(s);
			var page = 1;
			$.ajax({
				url: 'live_prodsearch.php',
				type: 'post',
				data: {
					search: s,
					page_ser: page
				},
				success: function (data) {
					// alert(data);
					$('#prod_pagination').html(data);
				}
			})
		});
	});

	function getsubcategory(value) {
		// alert(value);
		$.ajax({
			type: "post",
			url: "getsubcategory.php",
			data: {
				cat_id: value
			},
			success: function (data) {
				$('#subcategory_list').html(data);
			}
		});
	}

	$(document).ready(function () {
		$("#butt").on("click", function () {
			var cat = $("#cat").val();
			var subcat = $("#subcategory_list").val();
			$.ajax({
				url: 'live_prodsearch.php',
				type: 'post',
				data: {
					cat: cat,
					subcat: subcat
				},
				success: function (data2) {
					// alert(data2);
					$('#prod_pagination').html(data2);
				}
			});
		});
	});
</script>
<body class="animsition">
	
		<!-- Header -->
		<?php include_once 'pages/header.php' ?>
	<!-- End Header -->
	<?php
	include 'admin/dbcontroller.php';
	$handle= new DBcontroller();
	?>
	
	<!-- Product -->
	<div class="bg0 m-t-100 p-b-140">
	<div class="container">
			<div class="row ">
				<div class="col-md-3 mb-5">
					<select name="" onchange="getsubcategory(this.value)" id="cat" class="form-control">
						<option value="">Selected category</option>
						<?php	$query="select * from category where status='active'";
							$fetch=$handle->fetchall($query);
							foreach($fetch as $data){?>
						<option value="<?php echo $data["cat_id"] ?>"><?php echo $data["cat_name"] ?>
							<?php }?>
						</option>
					</select>
				</div>
				<div class="col-md-3 mb-5">
					<select name="" id="subcategory_list" class="form-control">
						<option value="" selected>Selected Subcategory</option>
						<?php	$query="select * from subcategory where status='active'";
							$fetch=$handle->fetchall($query);
							foreach($fetch as $data){?>
								<option value="<?php echo $data["subcat_id"] ?>"><?php echo $data["subcat_name"] ?></option>
							<?php }?>
					</select>
				</div>
				<div class="col-md-2 mb-5">
					<div class="btn btn-dark text-white px-4 py-2" id="butt">Filter</div>
				</div>
				<div class="col-md-3 mb-5">
				<input type="text" name="search-product"
							placeholder="Search" id="search_prod" class="form-control rounded" />
				</div>
				<div class="col-md-1 mb-5">
				<div class="btn btn-dark text-white px-4 py-2" onclick="window.location='product.php'" >Back</div>
				</div>
			</div>



			<div  id="prod_pagination">
				<div class="row isotope-grid">
					<?php
					$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' order by p.prod_id";
					$count=$handle->numrows($prod_query);
					if($count>0){
					$fetch=$handle->fetchall($prod_query);
					 	foreach($fetch as $row){
							$image=explode(",",$row['prod_image']);
			?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['cat_name']; ?>">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/img/product/convert/RC<?php echo $image[0] ?>" alt="IMG-PRODUCT">

								<a href="product_detail.php?p_id=<?php echo $row['prod_id']?>"
									class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.php"
										class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $row['prod_name'] ?>
									</a>
									<span class="stext-105 cl3">
									<?php echo '₹ '.$row['prod_sp_price'] ?>&nbsp;&nbsp;<del class="text-secondary">
										<!-- <?php echo '₹ '.$row['prod_price'] ?></del> -->
									</span>
								</div>
							</div>
						</div>
					</div>
				<?php }
				}else{
				?>
					<img src="images/notfound.jpg" hight="100px" width="100px" alt="">
				<?php
					echo "<div id='message' class='alert alert-danger text-center'>There is No Product to View </div> ";
				}
				?>
				</div>
				</div>
	</div>
		

		<!-- footer -->
		<?php include_once 'pages/footer.php' ?>
	<!-- End footer -->
</body>
</html>