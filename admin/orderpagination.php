                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-12">
                        <?php
                            include_once 'dbcontroller.php';
                            $handle = new DBcontroller();
                            if (isset($_POST['page'])) {
                                $page = $_POST['page'];
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
                                                $i=$start_from;
                                            foreach($fetch as $data){
                                            $query="select * from registration where reg_id='".$data["reg_id"]."'";
                                            $fl=$handle->fetchresult($query);
                                          
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
                                                <input type="hidden" class="id" value="<?php echo $data['order_id'] ?>">
                                                <select class="form-control" onchange="status(this.value,<?php echo $data['order_id'] ?>)">
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
                                                <button class="btn btn-success" onclick="orderitem(<?php echo $data['order_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;View Detail</button>
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
                                                <a onclick='pagination(<?php echo $page - 1 ?>)' class='btn btn-danger'>Previous</a>
                                                <?php  }
                                            for ($i = 1; $i <= $total_page; $i++) {
                                                if ($i == $page) { ?>
                                                <a onclick="pagination(<?php echo $i ?>)" class='btn btn-primary active'><?php echo $i ?></a>
                                                <?php } else { ?>
                                                <a onclick="pagination(<?php echo $i ?>)" class='btn btn-primary'><?php echo $i ?></a>
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