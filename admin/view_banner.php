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
                page_name: "banner",
                id_name: "banner_id",
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
                page_name: "banner",
                id_name: "banner_id",
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
            url: "bannerpagination.php",
            data: {
                page: page
            },
            success: function (data) {
                // alert(data);
                $('#pagination').html(data);
            }
        });
    }

    function deletedata(banner_id, page) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Banner!",
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
                            id: banner_id,
                            page_name: "banner",
                            id_name: "banner_id",
                        },
                        success: function (data) {
                            // alert(data);
                            $('#banner_' + banner_id).html(data);
                            pagination(page);
                        }
                    });
                    swal("Poof! Your Banner Successfully Deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your Banner is safe!");
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
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
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
                            <div class="bg-secondary rounded h-100 p-4">
                                <button type="button" onclick="window.location='add_banner.php'"
                                    class="btn btn-outline-primary float-right" style="float:right;">Add Banner</button>
                                <h6 class="mb-4">Banner</h6>
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped">
                                        <thead>
                                            <tr>
                                                <th scope="col-1 col-md-1" width="3%">No.</th>
                                                <th scope="col-2 col-md-2" width="20%">Image</th>
                                                <th scope="col-2 col-md-2" width="21%">Banner Caption</th>
                                                <th scope="col-2 col-md-2" width="15%">Image Title</th>
                                                <th scope="col-2 col-md-2" width="12%">Added On</th>
                                                <th scope="col-2 col-md-2" width="6%">Index No.</th>
                                                <th scope="col-2 col-md-2" width="15%">Action</th>
                                                <th scope="col-2 col-md-2" width="5%">Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                      include_once 'dbcontroller.php';
                                       $handle = new DBcontroller();
                                               if (isset($_GET['page'])) {

                                                 $page = $_GET['page'];
                                               } else {
                                                 $page = 1;
                                               }
                                               $num_per_page = 2;
                                               $start_from = ($page - 1) * 02;
                                               $q="select * from banner";
                                               $c=$handle->numrows($q);
                                               if($c>0){
                                                $query = "select * from banner order by banner_id asc limit $start_from,$num_per_page";
                                                $count=$handle->numrows($query);
                                                if($count>0){
                                                    $fetch=$handle->fetchall($query);
                                                }else{
                                                    $page=$page-1;
                                                    $start_from=($page-1)*02;
                                                    $query = "select * from banner order by banner_id asc limit $start_from,$num_per_page";
                                                    $count=$handle->numrows($query);
                                                    $fetch=$handle->fetchall($query);
                                               }
                                            }else{
                                                $fetch="";
                                            }
                                            //    $handle->formate($fetch);
                                         ?>
                                        <tbody>
                                            <?php 
                                        if(empty($fetch)){
                                            echo "<div id='message' class='alert alert-danger text-center'>No Data are there </div> ";
                                        }else{
                                        foreach($fetch as $row){
                                    ?>
                                            <tr id="banner_<?php echo $row['banner_id'] ?>">
                                                <td scope="row"><?php echo $row['banner_id']; ?></td>
                                                <td><img class="rounded"
                                                        src='img/banner/convert/TH<?php echo $row['image']?>'
                                                        height="130px" width="260px"></td>
                                                <td><?php echo $row['caption']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td>
                                                    <?php             
                                                    $orgDate = $row['addes_on'];
                                                    $newDate = date("d-m-Y", strtotime($orgDate));
                                                    echo $newDate;
                                                ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['index_no'];?>
                                                </td>
                                                <td>
                                                    <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-primary px-4"
                                                            name="editcategory"
                                                            onclick=" window.location='add_banner.php?banner_id=<?php echo $row['banner_id'] ?>&page=<?php echo $page?>'">Edit</button>
                                                        <button type="button" class="btn btn-primary px-4"
                                                            onclick="deletedata(<?php echo $row['banner_id'] ?>,<?php echo $page?>)">Delete</button>

                                                    </div>
                                                </td>
                                                <?php if ($row['status'] == 'deactive') { ?>
                                                <td id="status_<?php echo $row['banner_id'] ?>"> <button
                                                        class="btn btn-danger mt-3"
                                                        onclick="active(<?php echo $row['banner_id'] ?>,'active')">Deactive</button>
                                                </td>
                                                <?php } else { ?>
                                                <td id="status_<?php echo $row['banner_id'] ?>"> <button
                                                        class="btn btn-success mt-3 px-4"
                                                        onclick="deactive(<?php echo $row['banner_id'] ?>,'deactive')">Active</button>
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
                                    $query1 = "select * from banner order by banner_id ";
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