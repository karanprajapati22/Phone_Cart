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
<?php include '../pages/sweetalert.php' ?>
<script>
    function deactive(id, status) {
        $.ajax({
            type: 'POST',
            url: 'updstatus.php',
            data: {
                id: id,
                page_name: "category",
                id_name: "cat_id",
                status: status
            },
            success: function (data) {
                $('#status_' + id).html(data);
            }
        });
    }

    function active(id, status) {
        $.ajax({
            type: 'POST',
            url: 'updstatus.php',
            data: {
                id: id,
                page_name: "category",
                id_name: "cat_id",
                status: status
            },
            success: function (data) {
                $('#status_' + id).html(data);

            }
        });
    }


    function pagination(page) {
        // alert(page);
        $.ajax({
            type: "POST",
            url: "catpagination.php",
            data: {
                page: page
            },
            success: function (data) {
                // alert(data);
                $('#pagination').html(data);
            }
        });
    }

    function deletedata(cat_id, page) {
        // alert(page);
        // alert(cat_id);
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Category!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "operation/deletepage.php",
                        type: "POST",
                        data: {
                            id: cat_id,
                            page_name: "category",
                            id_name: "cat_id",
                        },
                        success: function (data) {
                            // alert(data);
                            $('#cat_' + cat_id).html(data);
                            pagination(page);
                        }
                    });
                    swal("Poof! Your Category Successfully Deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your Category is safe!");
                }
            });
        // alert("function call");
        // var ans=confirm("Are you sure you want to delete");
        // if(ans==false)
        // {
        //   return false;
        // }
        // else
        // {
        //   window.location='operation/del_cat.php?id='+cat_id;
        // }
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
        ?>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div id="pagination">
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <?php
                                      include_once 'dbcontroller.php';
                                       $handle = new DBcontroller();
                                               if (isset($_GET['page'])) {

                                                 $page = $_GET['page'];
                                               } else {
                                                 $page = 1;
                                               }
                                               $num_per_page = 4;
                                               $start_from = ($page - 1) * 04;
                                               $q="select * from category";
                                               $c=$handle->numrows($q);
                                               if($c>0){
                                                $query = "select * from category order by cat_name asc limit $start_from,$num_per_page";
                                                $count=$handle->numrows($query);
                                                if($count>0){
                                                    $fetch=$handle->fetchall($query);
                                                }else{
                                                    $page=$page-1;
                                                    $start_from=($page-1)*04;
                                                    $query = "select * from category order by cat_name asc limit $start_from,$num_per_page";
                                                    $count=$handle->numrows($query);
                                                    $fetch=$handle->fetchall($query);
                                               }
                                            }else{
                                                $fetch="";
                                            }
                                         ?>
                            <div class="bg-secondary rounded h-100 p-4">
                                <button type="button" onclick="window.location='add_category.php?page=<?php echo 1 ?>'"
                                    class="btn btn-outline-primary float-right" style="float:right;">Add
                                    Category</button>

                                <h6 class="mb-4">Category</h6>
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col-1 col-md-1" width="5%">No.</th>
                                                <th scope="col-2 col-md-2" width="25%">Category Name</th>
                                                <th scope="col-2 col-md-2" width="20%">Image</th>
                                                <th scope="col-2 col-md-2" width="25%">Category Discription</th>
                                                <th scope="col-2 col-md-2" width="15%">Action</th>
                                                <th scope="col-2 col-md-2" width="10%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(empty($fetch)){
                                                    echo "<div id='message' class='alert alert-danger text-center'>No Data are there </div> ";
                                                }else{
                                                foreach($fetch as $row){
                                            ?>
                                            <tr id="cat_<?php echo $row['cat_id'] ?>">
                                                <td scope="row"><?php echo $row['cat_id']; ?></td>
                                                <td><?php echo $row['cat_name']; ?></td>
                                                <td><img class="rounded-circle"
                                                        src='img/category/convert/TH<?php echo $row['cat_image']?>'
                                                        height="70px" width="70px"></td>
                                                <td><?php echo $row['cat_desc']; ?></td>
                                                <td>
                                                    <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-primary px-4"
                                                            name="editcategory"
                                                            onclick=" window.location='add_category.php?cat_id=<?php echo $row['cat_id'] ?>&page=<?php echo $page?>'">Edit</button>
                                                        <button type="button" class="btn btn-primary px-4"
                                                            onclick="deletedata(<?php echo $row['cat_id'] ?>,<?php echo $page?>)">Delete</button>

                                                    </div>
                                                </td>
                                                <?php if ($row['status'] == 'deactive') { ?>
                                                <td id="status_<?php echo $row['cat_id'] ?>"> <button
                                                        class="btn btn-danger mt-3"
                                                        onclick="active(<?php echo $row['cat_id'] ?>,'active')">Deactive</button>
                                                </td>
                                                <?php } else { ?>
                                                <td id="status_<?php echo $row['cat_id'] ?>"> <button
                                                        class="btn btn-success mt-3 px-4"
                                                        onclick="deactive(<?php echo $row['cat_id'] ?>,'deactive')">Active</button>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- pagination -->
                                    <center> <?php
                                    $query1 = "select * from category order by cat_name ";
                                    $total_record = $handle->numrows($query1);
                                    
                                    $total_page = ceil($total_record / $num_per_page);
                                    if ($page > 1) { ?>
                                        <a onclick='pagination(<?php echo $page - 1 ?>)'
                                            class='btn btn-danger'>Previous</a>
                                        <?php  }
                                    for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $page) { ?>
                                        <a onclick="pagination(<?php echo $i ?>)"
                                            class='btn btn-primary active'><?php echo $i ?></a>
                                        <?php } else { ?>
                                        <a onclick="pagination(<?php echo $i ?>)"
                                            class='btn btn-primary'><?php echo $i ?></a>
                                        <?php }
                                    }
                                    if ($i > $page) {
                                    if ($page < $total_page) { ?>
                                        <a onclick="pagination(<?php echo $page + 1 ?>)" class='btn btn-danger'>Next</a>
                                        <?php }
                                    }
                                    ?>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table End -->
                <!-- Footer Start -->
                <?php
                include 'footer.php';
                ?>
                <!-- Footer End -->


                </div>
            </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

   
</body>

</html>