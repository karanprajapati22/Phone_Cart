    
   <?php
// session_start();
?>
   
   
   
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
    
            $(document).ready(function () {
                <?php if(!isset($_GET['cat_id'])){ ?>
                $('#output_image').hide();
                <?php } ?>
            });
    

        function load(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            $('#output_image').show();
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <!-- Spinner Start -->
            <!-- <div id="spinner"
                class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                ?>

                <?php
                    include 'dbcontroller.php';
                    $obj=new DBcontroller;
                    $cat_name="";
                    $cat_id="";
                    $cat_img="";
                    $cat_desc="";
                    $convet="";
                    $nm="Add category";
                    $name_element="submitcategory";
                    $button="Add category";
                    if(isset($_SESSION['alreadyexistcat']) and $_SESSION['alreadyexistcat']!=" " ){
                        $arr=$_SESSION['alreadyexistcat'];
                        $cat_name=$arr['category_name'];
                        // $cat_image=$arr['category_image'];
                        $cat_desc=$arr['category_des'];
                        $convert=$arr['convert'];
                    }
                    if(isset($_GET['cat_id']))
                    {
                        $page=$_GET['page'];
                        $cat_id=$_GET['cat_id'];
                        $query="select * from category where `cat_id`='$cat_id'";
                        $fetch=$obj->fetchresult($query);
                        $button="Edit category";
                        $cat_name=$fetch['cat_name'];
                        $cat_desc=$fetch['cat_desc'];
                        $cat_img=$fetch['cat_image'];
                        $convert=$fetch['convert'];
                        $name_element="editcategory";
                        $url="operation/edit_cat.php?cat_id=".$_GET['cat_id'];
                        $nm="Edit category";
                    }
                ?>
                <!-- add category End -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4 d-flex justify-content-center">
                        <div class="col-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4"><?php echo $nm ?? ' ' ?></h6>
                                <form action='<?php echo $url ?? 'operation/add_cat.php' ?>' method="post"
                                    enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="category_name" value="<?php echo $cat_name ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="page" value="<?php echo $page ?? " " ?>">
                                    <input type="hidden" name="category_id" value="<?php echo $cat_id ?? " " ?>">
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
                                                    echo '   <option value="y">Yes</option>
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
                                        <label class="col-sm-2 col-form-label">Category Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="category_image" hidden="true"
                                                onchange="load(event)" id="up">
                                            <label style="cursor:pointer" class="form-control bg-dark btn-outline-primary" for="up">Upload</label>
    <?php 
    if(isset($cat_img)){
        echo '<img class="my-3" src="./img/category/convert/TH'.$cat_img.'" alt="Your Image" height="80px" width="90px"  id="output_image">';
    }else{
    echo '  <img class="my-3" alt="Your Image" height="80px" width="90px"  id="output_image">';
    }
    ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Category Description</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="category_des" value="<?php echo $cat_desc ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" name="<?php echo $name_element?? " " ?>" class="btn btn-primary"><?php echo $button ?? '' ?></button>
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