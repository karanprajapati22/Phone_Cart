<!DOCTYPE html>
<html lang="en">

<head>
    <?php
            include 'head.php';
            // session_start();
    ?>
</head>
<?php
    include 'auth.php';
?>
<?php include '../pages/sweetalert.php'; ?>

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
                    $handle=new DBcontroller();
                   
                    $cat_id="";
                    $subcat_name="";
                    $subcat_id="";
                    $subcat_desc="";
                    $nm="Add Sub-Category";
                    $name_element="submitsubcategory";
                    $button="Add Sub-Category";
                    if(isset($_SESSION['alreadyexistsubcat']) and $_SESSION['alreadyexistsubcat']!=" " ){
                        $arr=$_SESSION['alreadyexistsubcat'];
                        $cat_id=$arr['cat_id'];
                        $subcat_name=$arr['subcategory_name'];
                        $subcat_desc=$arr['subcategory_desc'];
                    }
                    if(isset($_GET['subcat_id']))
                    {
                        $page=$_GET['page'];
                        $subcat_id=$_GET['subcat_id'];
                        $query="select * from subcategory where `subcat_id`='$subcat_id'";
                        $fetch=$handle->fetchresult($query);
                        $button="Edit Sub-Category";
                        $cat_id=$fetch['cat_id'];
                        $subcat_name=$fetch['subcat_name'];
                        $subcat_desc=$fetch['subcat_desc'];
                        $name_element="editsubcategory";
                        $url="operation/edit_subcat.php?subcat_id=".$_GET['subcat_id'];
                        $nm="Edit Sub-Category";
                    }
                    $query="select cat_id,cat_name from category";
                    $fetch=$handle->fetchall($query);
                ?>
            <!-- add category End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 d-flex justify-content-center">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"><?php echo $nm ?? ' ' ?></h6>
                            <form action='<?php echo $url ?? 'operation/add_subcat.php' ?>' method="post"
                                enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select name="cat_id" class="form-control bg-dark" id="">
                                            <?php
                                                echo '<option value="" selected >Select Category</option>';
                                             foreach($fetch as $cat){
                                                if($cat['cat_id']==$cat_id){
                                            echo '<option value='. $cat['cat_id'].' selected>'.$cat['cat_name'].'</option>';                           
                                             } else{
                                            echo '<option value='. $cat['cat_id'].' >'.$cat['cat_name'].'</option>';
                                             }}?>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="page" value="<?php echo $page ?? " " ?>">
                                <input type="hidden" name="subcategory_id" value="<?php echo $subcat_id ?? " " ?>">
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Sub-Category name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subcategory_name" value="<?php echo $subcat_name ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Sub-Category Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subcategory_desc" value="<?php echo $subcat_desc ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <button type="submit" name="<?php echo $name_element?? " " ?>"
                                    class="btn btn-primary"><?php echo $button ?? '' ?></button>
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