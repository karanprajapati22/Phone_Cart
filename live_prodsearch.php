<div class="row isotope-grid">
			 <?php
                    include 'admin/dbcontroller.php';
                    $handle= new DBcontroller();

					if(isset($_POST['search']))
					{
						$search=$_POST['search'];
						$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' and p.prod_desc like '%$search%'";
						$countprod=$handle->numrows($prod_query);
						if($countprod == 0){
							$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' and s.subcat_name like '%$search%'";
							$countprod=$handle->numrows($prod_query);
							if($countprod == 0){
								$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' and c.cat_name like '%$search%'";
							}
						}
					}
					else
					{
						$subcat=$_POST['subcat'];
						$prod_query="select c.cat_name, s.subcat_name, p.* from category c,subcategory s, product p where c.cat_id=s.cat_id and s.subcat_id=p.subcat_id and p.status='active' and s.subcat_id = '$subcat'";
					}
					
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
								<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $row['prod_name'] ?>
								</a>
								<span class="stext-105 cl3">
								<?php echo $row['prod_sp_price'] ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				}else{
				?>
				<div class="row justify-content-center">
					<div class="col-md-8">
					<img src="images/no_product.jpg" class="img-fluid" alt="">
					</div>
				</div>
				<?php
					// echo "<div id='message' class='alert alert-danger text-center'>There is No Product to View </div> ";
				}
				?>
</div>		