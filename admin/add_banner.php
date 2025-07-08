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
            <?php
            if (!isset($_GET['banner_id'])) {
                ?>
                $('#output_image').hide(); <?php
            } ?>
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
                    $banner_image=" ";
                    $banner_id=" ";
                    $banner_caption=" ";
                    $banner_title=" ";
                    $convet=" ";
                    $banner_index=" ";
                    $nm="Add Banner";
                    $name_element="submitbanner";
                    $button="Add Banner";
                    if(isset($_GET['banner_id']))
                    {
                        $page=$_GET['page'];
                        $banner_id=$_GET['banner_id'];
                        $query="select * from banner where `banner_id`='$banner_id'";
                        $fetch=$obj->fetchresult($query);
                        $button="Edit Banner";
                        $banner_image=$fetch['image'];
                        $banner_caption=$fetch['caption'];
                        $banner_title=$fetch['title'];
                        $banner_index=$fetch['index_no'];
                        $convert=$fetch['convert'];
                        $name_element="editbanner";
                        $url="operation/edit_banner.php?banner_id=".$_GET['banner_id'];
                        $nm="Edit Banner";
                    }
                ?>
                <!-- add category End -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4 d-flex justify-content-center">
                        <div class="col-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4"><?php echo $nm ?? ' ' ?></h6>
                                <form action='<?php echo $url ?? 'operation/add_banner.php' ?>'
                                    method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">banner Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="banner_image" hidden="true"
                                                onchange="load(event)" id="up">
                                            <label class="form-control bg-dark btn-outline-primary"
                                                for="up">Upload</label>
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-2 col-form-label">Banner Caption</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="caption" value="<?php echo $banner_caption ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-2 col-form-label">Banner Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="<?php echo $banner_title ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-2 col-form-label">Index No.</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="index" value="<?php echo $banner_index ?>"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <input type="hidden" name="page" value="<?php echo $page ?? " " ?>">
                                    <input type="hidden" name="banner_id" value="<?php echo $banner_id ?? " " ?>">
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

                                    
                                    <button type="submit" name="<?php echo $name_element?? " " ?>"
                                        class="btn btn-primary"><?php echo $button ?? '' ?></button>
                                </form>
                                <div class="row mb-3">
                                <?php 
    if(isset($banner_image)){
        echo '<center>'.'<img class="my-3" src="./img/banner/convert/TH'.$banner_image.'" alt="Your Image" height="200px" width="400px"  id="output_image">'.'</center>';
    }else{
        echo '<center>'.'<img class="my-3" alt="Your Image" height="200px" width="400px"  id="output_image">'.'</center>';
    }
    ?>
                                </div>
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