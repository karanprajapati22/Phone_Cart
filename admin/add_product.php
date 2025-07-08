<!DOCTYPE html>
<html lang="en">

<head>
<?php
        include 'head.php';
?>
</head>
<?php
    include 'auth.php';
?>
<?php include '../pages/sweetalert.php'; ?>
<script type="text/javascript">  
    function changecategory(id)
    {
        // alert(id);
        $.ajax({
            url:"fetchsubcat.php",
            type:"POST",
            data:{
                cat_id:id
            },
            success: function(data){
                // alert(data);
                $("#subcat").html(data);
            }
        });
    }

            $(document).ready(function () {
                <?php if(!isset($_GET['prod_id'])){ ?>
                $('#output_image1').hide();
                $('#output_image2').hide();
                $('#output_image3').hide();
                <?php } ?>
            });
        function load1(event) {
            // alert(event);
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image1');
                output.src = reader.result;
            }
            $('#output_image1').show();
            reader.readAsDataURL(event.target.files[0]);
        }
        function load2(event) {
            // alert(event);
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image2');
                output.src = reader.result;
            }
            $('#output_image2').show();
            reader.readAsDataURL(event.target.files[0]);
        }
        function load3(event) {
            // alert(event);
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image3');
                output.src = reader.result;
            }
            $('#output_image3').show();
            reader.readAsDataURL(event.target.files[0]);
        }
</script>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include 'navbar.php';
            include 'dbcontroller.php';
            $handle=new DBcontroller();
            $query="select cat_id,cat_name from category";
            $fetch=$handle->fetchall($query);
            ?>
            <!-- add category End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 d-flex justify-content-center">
                    <div class="col-12">
                        <?php
                            $cat_id="";
                            $subcat_id="";
                            $prod_name="";
                            $prod_desc="";
                            $prod_price="";
                            $prod_sp_price="";
                            $prod_qty="";
                            $prod_flavour="";
                            $prod_weight="";
                            $convet="";
                            $nm="Add Product";
                            $name_element="submitproduct";
                            $button="Add Product";
                            if(isset($_GET['page'])){
                                $page=$_GET['page'];
        
                            }
                            if(isset($_GET['prod_id']))
                            {
                                $prod_id=$_GET['prod_id'];
                                $query="select p.*, s.subcat_id,subcat_name, c.cat_id,cat_name from product p, subcategory s, category c where p.subcat_id=s.subcat_id and s.cat_id=c.cat_id and p.prod_id='$prod_id'";
                                $fetch=$handle->fetchresult($query);
                                $cat_id=$fetch['cat_id'];
                                $subcat_id=$fetch['subcat_id'];
                                $prod_img=explode(",",$fetch['prod_image']);
                                $prod_name=$fetch['prod_name'];
                                $prod_desc=$fetch['prod_desc'];
                                $prod_price=$fetch['prod_price'];
                                $prod_sp_price=$fetch['prod_sp_price'];
                                $prod_qty=$fetch['prod_qty'];
                                $prod_flavour=$fetch['prod_flavour'];
                                $prod_weight=$fetch['prod_weight'];
                                $convert=$fetch['convert'];
                                $nm="Edit Product";
                                $name_element="editproduct";
                                $button="Edit Product";
                                $url="operation/edit_prod.php?prod_id=".$prod_id;
                            }
                            $q_cat="select * from category";
                            $cat=$handle->executequery($q_cat);
                            $q_subcat="select * from subcategory";
                            $subcat=$handle->executequery($q_subcat);
                        ?>
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"><?php echo $nm; ?></h6>
                            <form action='<?php echo $url ?? 'operation/add_prod.php' ?>' method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                    <input type="hidden" name="page" value="<?php echo $page ?? " " ?>">
                                    <input type="hidden" name="product_id" value="<?php echo $prod_id ?? " " ?>">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                    <select name="category_id" class="form-control bg-dark" onchange="changecategory(this.value)" id="">
                                            <?php 
                                            echo '<option value="" selected>Select category</option>';
                                            foreach($cat as $fetch){
                                                if($fetch['cat_id']==$cat_id){
                                            echo '<option value='. $fetch['cat_id'].' selected>'.$fetch['cat_name'].'</option>';
                                          
                                             } else{
                                            echo '<option value='. $fetch['cat_id'].' >'.$fetch['cat_name'].'</option>';

                                             }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Sub-Category Name</label>
                                    <div class="col-sm-10">
                                    <select name="subcategory_id" class="form-control bg-dark" id="subcat">
                                        <?php 
                                            if(isset($_GET['prod_id']) or $subcat_id!=" "){
                                                echo '<option value="" selected>Select Subcategory</option>';
                                                foreach($subcat as $fetch){
                                                    if($fetch['subcat_id']==$subcat_id){
                                                        echo '<option value='. $fetch['subcat_id'].' selected>'.$fetch['subcat_name'].'</option>';
                                                    
                                                    } else{
                                                        echo '<option value='. $fetch['subcat_id'].' >'.$fetch['subcat_name'].'</option>';

                                                    }
                                                }
                                            }else{
                                                echo '<option value="" selected>Select Subcategory</option>';
                                            }

                                        ?>
                                        </select>
                                            </div>
                                
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="product_name" value="<?php echo $prod_name; ?>" class="form-control">
                                    </div>
                                </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Convert</label>
                                        <div class="col-sm-10">
                                            <select name="convert" class="form-control bg-dark">
                                            <?php  if(isset($convert)){    
                                                if($convert=='y'){
                                                    echo ' 
                                                    <option value="y" selected>Yes</option>
                                                    <option value="n">No</option>';
                                                }else{
                                                    echo '<option value="y">Yes</option>
                                                    <option value="n" selected>No</option>';
                                                }
                                            }else{
                                                echo '
                                                <option Selected>Select Convert</option>
                                                <option value="y">Yes</option>
                                                <option value="n">No</option>';
                                            }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-3">

                                        <input onchange="load1(event)"  type="file" class="form-control" name="image1" hidden="true" id="up">
                                        <label class="form-control bg-dark btn-outline-primary" for="up">Upload</label>
                                        <?php 
    if(isset($prod_img)){
        echo '<img class="my-3" src="./img/product/convert/RC'.$prod_img[0].'" alt="Your Image" height="80px" width="90px"  id="output_image1">';
    }else{
    echo '  <img class="my-3" alt="Your Image" height="80px" width="90px"  id="output_image1">';
    }
    ?>
                                    </div>
                                    <div class="col-sm-3">
                                        
                                        <input type="file" onchange="load2(event)" class="form-control" name="image2" hidden="true" id="up2">
                                        <label class="form-control bg-dark btn-outline-primary" for="up2">Upload</label>
                                        <?php 
    if(isset($prod_img)){
        echo '<img class="my-3" src="./img/product/convert/RC'.$prod_img[1].'" alt="Your Image" height="80px" width="90px"  id="output_image2">';
    }else{
    echo '  <img class="my-3" alt="Your Image" height="80px" width="90px"  id="output_image2">';
    }
    ?>
                                    </div>
                                    <div class="col-sm-3">
                                        
                                        <input type="file" onchange="load3(event)" class="form-control" name="image3" hidden="true" id="up3">
                                        <label class="form-control bg-dark btn-outline-primary" for="up3">Upload</label><?php 
    if(isset($prod_img)){
        echo '<img class="my-3" src="./img/product/convert/RC'.$prod_img[2].'" alt="Your Image" height="80px" width="90px"  id="output_image3">';
    }else{
    echo '  <img class="my-3" alt="Your Image" height="80px" width="90px"  id="output_image3">';
    }
    ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_desc; ?>" name="product_des" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_price; ?>" name="product_price" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Special Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_sp_price; ?>" name="special_price" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_qty; ?>" name="product_qty" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Color</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_flavour; ?>" name="product_flavour" class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Product Weight</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $prod_weight; ?>" name="product_weight" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" name="<?php echo $name_element; ?>" class="btn btn-primary"><?php echo $button; ?></button>
                            </form>
                        </div>
                    </div>
            </div>
            <!-- add category Start -->
            <?php
                include 'footer.php';
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

</body>

</html>