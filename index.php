<?php session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<?php include_once 'pages/head.php' ?>
</head>
<script>
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
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                PRODUCT OVERVIEW
            </h3>
        </div>

        <div class="row">
            <?php
            $prod_query = "SELECT c.cat_name, s.subcat_name, p.* FROM category c, subcategory s, product p WHERE c.cat_id=s.cat_id AND s.subcat_id=p.subcat_id AND p.status='active' ORDER BY p.prod_name ASC LIMIT 8"; // Limiting to 8 products for 4 columns, 2 rows
            $count = $handle->numrows($prod_query);
            if ($count > 0) {
                $fetch = $handle->fetchall($prod_query);
                $index = 0;
                foreach ($fetch as $row) {
                    $image = explode(",", $row['prod_image']);
            ?>
                    <div class="col-sm-6 col-md-3 mb-4">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="admin/img/product/convert/RC<?php echo $image[0] ?>" alt="IMG-PRODUCT">

                                <a href="product_detail.php?p_id=<?php echo $row['prod_id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product_detail.php?p_id=<?php echo $row['prod_id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?php echo $row['prod_name'] ?>
                                    </a>
                                    <span class="stext-105 cl3">
                                        <?php echo '₹ ' . $row['prod_sp_price'] ?>&nbsp;&nbsp;
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    $index++;
                    if ($index % 4 == 0 && $index != $count) {
                        echo '</div><div class="row">'; // Start a new row every 4 products
                    }
                }
            } ?>
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