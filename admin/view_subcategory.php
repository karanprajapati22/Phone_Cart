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
                page_name: "subcategory",
                id_name: "subcat_id",
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
                page_name: "subcategory",
                id_name: "subcat_id",
                status: status
            },
            success: function (data) {
                $('#status_' + id).html(data);

            }
        });
    }
    function pagination(page) {
        $.ajax({
        type: "POST",
        url: "subcatpagination.php",
        data: {
            page: page
        },
        success: function(data) {
            // alert(data);
            $('#pagination').html(data);
        }  
        });
    }  
    function deletedata(subcat_id,page) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Sub-Category!",
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
                            id: subcat_id,
                            page_name: "subcategory",
                            id_name: "subcat_id"
                        },
                        success: function (data) {
                            // alert(data);
                            $('#subcat_' + subcat_id).html(data);
                            pagination(page);
                        }
                    });
                    swal("Poof! Your Sub-Category Successfully Deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your Sub-Category is safe!");
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
         <div class="container-fluid pt-4 px-4" >
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <button type="button" onclick="window.location='add_subcategory.php'"
                                class="btn btn-outline-primary float-right" style="float:right;">Add Sub-Category</button>

                            <h6 class="mb-4">Sub Category</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-stripped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col-1 col-md-1" width="7%">No.</th>
                                            <th scope="col-2 col-md-2" width="15%">Category Name</th>
                                            <th scope="col-2 col-md-2" width="20%">Sub-Category Name</th>
                                            <th scope="col-2 col-md-2" width="25%">sub-Category Discription</th>
                                            <th scope="col-2 col-md-2" width="15%">Action</th>
                                            <th scope="col-2 col-md-2" width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        // include 'dbcontroller.php';
                                        // $obj=new DBcontroller;

                                        // $query="select * from category";
                                        // $fetch=$obj->fetchall($query);
                                    ?>
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
                                               $q="select * from subcategory";
                                               $c=$handle->numrows($q);
                                               if($c>0){
                                               $query = "select c.cat_id,cat_name,s.* from category c inner join subcategory s on c.cat_id=s.cat_id order by s.subcat_name asc limit $start_from,$num_per_page";
                                               $count=$handle->numrows($query);
                                               if($count>0){
                                                $fetch=$handle->fetchall($query);
                                               }else{
                                                $page=$page-1;
                                                $start_from=($page-1)*04;
                                                $query="select c.cat_id,cat_name,s.*from category c inner join subcategory s on c.cat_id=s.cat_id order by s.subcat_name asc limit $start_from,$num_per_page";
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
                                        <tr id="subcat_<?php echo $row['subcat_id']?>">
                                            <td><?php echo $row['subcat_id'] ?></td>
                                            <td><?php echo $row['cat_name']; ?></td>
                                            <td><?php echo $row['subcat_name']; ?></td>
                                            <td><?php echo $row['subcat_desc']; ?></td>
                                            <td>
                                                <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary px-4"
                                                        onclick=" window.location='add_subcategory.php?subcat_id=<?php echo $row['subcat_id'] ?>&page=<?php echo $page?>'">Edit</button>
                                                    <button type="button" class="btn btn-primary px-4"
                                                        onclick="deletedata(<?php echo $row['subcat_id'] ?>,<?php echo $page?>)">Delete</button>
                                                </div>
                                            </td>
                                            <?php if ($row['status'] == 'deactive') { ?>
                                                <td id="status_<?php echo $row['subcat_id'] ?>"> <button
                                                        class="btn btn-danger mt-3"
                                                        onclick="active(<?php echo $row['subcat_id'] ?>,'active')">Deactive</button>
                                                </td>
                                                <?php } else { ?>
                                                <td id="status_<?php echo $row['subcat_id'] ?>"> <button
                                                        class="btn btn-success mt-3 px-4"
                                                        onclick="deactive(<?php echo $row['subcat_id'] ?>,'deactive')">Active</button>
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
                                    $query1 = "select * from subcategory order by subcat_name ";
                                    $total_record = $handle->numrows($query1);
                                    
                                    $total_page = ceil($total_record / $num_per_page);
                                    if ($page > 1) { ?>
                                    <a onclick='pagination(<?php echo $page - 1 ?>)' class='btn btn-danger'>Previous</a>
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