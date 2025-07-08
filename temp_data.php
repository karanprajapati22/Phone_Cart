<?php session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
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

	$(document).on("onclick", "#search_cat", function () {
		var cat_name=$('input[name=cat]').val();
		alert(cat_name);
		$.ajax({
			url: 'live_prodsearch.php',
			type: 'post',
			data: {
				cat_name: cat_name
			},
			success: function (data) {
				// alert(data);
				$('#prod_pagination').html(data);
			}
		})
	});
	// $(document).ready(function(){
	// 	alert("......");
	// 	$("#loader").fadeOut(5000);
	// });
</script>
<style>
	/* @media (max-width:544px){
		.imagebanner{
			height:400px;
		}
	} */
</style>
<style>
	/* #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
    } */
</style>

<?php include 'pages/sweetalert.php' ?>

<body class="animsition">
	<!-- <div class="container-scroller">
        <div id="loader"></div>
    </div> -->

	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->

	<!-- Slider -->
	<?php
	include 'admin/dbcontroller.php';
	$handle= new DBcontroller();
	$query="select * from banner  where status='active' order by index_no";
	$count=$handle->numrows($query);
	$result=$handle->executequery($query);
	// $handle->formate($result);
	// die();
	?>
	<section class="section-slide">
		<div class="wrap-slick1">
			<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
						aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
						aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
						aria-label="Slide 3"></button>
				</div>
				<div class="carousel-inner">
					<?php
						$path="admin/img/banner/convert/TH";
						while($row=mysqli_fetch_assoc($result)){
							if($row['index_no']==0){
					?>
					<div class="carousel-item active">
						<img src="<?php echo $path.$row['image']; ?>" height="600px" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $row['title']; ?></h5>
							<p><?php echo $row['caption']; ?></p>
						</div>
					</div>
					<?php
							}else {
					?>
					<div class="carousel-item">
						<img src="<?php echo $path.$row['image']; ?>" height="600px" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5><?php echo $row['title']; ?></h5>
							<p><?php echo $row['caption']; ?></p>
						</div>
					</div>
					<?php
							}
						}
					?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
					data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
					data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</section>

	<!-- Banner-catelogue -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5 text-center">
						Category
					</h3>
				</div>
				<!-- start cat -->
				<?php
					$cat_query="select * from category where status='active' order by cat_id";
					$count=$handle->numrows($cat_query);
					if($count>0){
					$fetch=$handle->fetchall($cat_query);
					 	foreach($fetch as $row){
				?>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="admin/img/category/convert/TH<?php echo $row['cat_image']?>" alt="IMG-BANNER">

						<a href="product.php" 
							class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3 ">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $row['cat_name'] ?>
								</span>

								<span class="block1-info stext-102 trans-04">
									<?php //echo $row['cat_desc'] ?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php
					}
				}else{
					echo "<div id='message' class='alert alert-danger text-center'>There is No Category to View </div> ";	
				}?>

				<!-- start cat -->
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					PRODUCT OVERVIEW
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php
					$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' order by p.prod_id";
					$count=$handle->numrows($prod_query);
					if($count>0){
						$fetch=$handle->fetchall($prod_query);
						foreach($fetch as $row){
						$image=explode(",",$row['prod_image']);
					?>	
					<div class="col-sm-6 col-md-4 col-lg-3 isotope-item <?php echo $row['cat_name']; ?>">
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
									<a href="product_detail.php?p_id=<?php echo $row['prod_id']?>"
										class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $row['prod_name'] ?>
									</a>
									<span class="stext-105 cl3">
									<?php echo '₹ '.$row['prod_sp_price'] ?>&nbsp;&nbsp;<del class="text-secondary"><?php echo '₹ '.$row['prod_price'] ?></del>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
											alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l"
											src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php }
					}
					?>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Load more -->
			<div class="flex-c-m flex-w w-full">
						<a href="product.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
							Load More
						</a>
			</div>
	</div>
	</section>

	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!--end  Footer -->

<?php //include_once 'pages/sidecart.php' ?>

	



	
</body>

</html>