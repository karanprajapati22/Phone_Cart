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
<script>
    function pagination(page) {
        $.ajax({
            type: "POST",
            url: "orderpagination.php",
            data: {
                page: page
            },
            success: function (data) {
                $('#pagination').html(data);
            }
        });
    }

    function status(val, id) {
        // alert(val);
        // alert(id);
        var b = "order_button";
        $.ajax({
            url: 'fetchorder2.php',
            type: "post",
            data: {
                order_button: b,
                value: val,
                order_id: id,
            },
            success: function (data) {
                // alert(data);
                $('.see').html(' <div class="alert alert-success">' + data + '</div>');
                setTimeout(function () {
                    $('.see').fadeOut(' <div class="alert alert-success">' + data + '</div>');
                }, 2000);
            }
        });
    } 

    function orderitem(id) {
        $.ajax({
            url: "fetchorder.php",
            type: "post",
            data: {
                id: id
            },
            success: function (data) {
                $('#fetchdata').html(data);
            }
        });
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
                            $q="select * from  `order` order by order_id desc";
                            $c=$handle->numrows($q);
                            if($c>0){
                                $query = "select * from `order` order by order_id desc limit $start_from,$num_per_page";
                                $count=$handle->numrows($query);
                                if($count>0){
                                    $fetch = $handle->fetchall($query);
                                }else{
                                    $page=$page-1;
                                    $start_from = ($page - 1) * 04;
                                    $query = "select * from `order` order by order_id desc limit $start_from,$num_per_page";
                                    $count=$handle->numrows($query);
                                    $fetch = $handle->fetchall($query);
                                }
                            }else{
                                $fetch="";
                            }
                        ?>

                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">View Order</h6>
                                <div class="container-fluid">
                                <form action="report_order.php" method="post">
                                    <div class="row justify-content mb-5">
                                        <div class="col-md-3">
                                            <label for="input1" class="form-label">From :</label>
                                            <input type="datetime-local" class="form-control bg-white" name="from">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="input1" class="form-label">To :</label>
                                            <input type="datetime-local" class="form-control bg-white" name="to">
                                        </div>
                                        <div class="col-md-3 ">
                                            <button type="submit" class="btn btn-outline-primary mt-4 ">Report</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped">
                                        <div class="see">
                                        </div>
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile No.</th>
                                                <th scope="col">Payment Mode</th>
                                                <th scope="col">Total Item</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Date Time</th>
                                                <th scope="col">Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(empty($fetch)){
                                                echo "<div id='message' class='alert alert-danger text-center'>No Data found </div>";
                                            }else{
                                            foreach($fetch as $data){
                                            $query="select * from registration where reg_id='".$data["reg_id"]."'";
                                            $fl=$handle->fetchresult($query);
                                            static $i=0;
                                        ?>
                                            <tr id="or_<?php echo $data['order_id']?>">
                                                <td> <?php echo ++$i?> </td>
                                                <td><?php echo $fl["first_name"]." ".$fl["last_name"]?> </td>
                                                <td><?php echo $fl["email"]?> </td>
                                                <td><?php echo $fl["phone_no"]?> </td>
                                                <td><?php echo $data['payment_type']?></td>
                                                <td><?php echo $data['total_item']?></td>
                                                <td><?php echo $data['total_amount']?></td>
                                                <td><?php echo $data['date_time']?></td>
                                                <td><?php $order_status = $data['order_status'] ?>
                                                    <input type="hidden" class="id"
                                                        value="<?php echo $data['order_id'] ?>">
                                                    <select class="form-control"
                                                        onchange="status(this.value,<?php echo $data['order_id'] ?>)">
                                                        <?php if ($order_status == 'Pending') { ?>
                                                        <option value="Pending" selected>Pending</option>
                                                        <option value="out_delivery">Out for Delivery</option>
                                                        <option value="Deliverd">Deliverd</option>
                                                        <?php } elseif ($order_status == 'out_delivery') { ?>
                                                        <option value="Pending">Pending</option>
                                                        <option value="out_delivery" selected>Out for Delivery</option>
                                                        <option value="Deliverd">Deliverd</option>
                                                        <?php } else { ?>
                                                        <option value="Pending">Pending</option>
                                                        <option value="out_delivery">Out for Delivery</option>
                                                        <option value="Deliverd" selected>Deliverd</option>
                                                        <?php  } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success"
                                                        onclick="orderitem(<?php echo $data['order_id'] ?>)"
                                                        data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                            class="fa fa-shopping-cart"></i>&nbsp;&nbsp;View
                                                        Detail</button>
                                                </td>
                                            </tr>
                                            <?php }
                                        } ?>
                                        </tbody>
                                    </table>
                                    <center class="mt-4"> <?php
                                        $query1 = "select * from `order` order by order_id desc";
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
            </div>
            <!-- Table End -->
            <div class="modal fade " id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">

                            <h4 class="modal-title">View Order Item</h4>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" id="fetchdata">
                            <div class="alert alert-success">Order Item</div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Product Detail</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Footer Start -->
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