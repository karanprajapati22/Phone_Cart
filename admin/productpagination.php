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
                                            $q="select * from product";
                                               $c=$handle->numrows($q);
                                               if($c>0){
                                                $query = "select p.*, s.subcat_id,subcat_name, c.cat_id,cat_name from product p, subcategory s, category c where p.subcat_id=s.subcat_id and s.cat_id=c.cat_id order by p.prod_id asc limit $start_from,$num_per_page";
                                                $count=$handle->numrows($query);
                                                if($count>0){
                                                    $fetch=$handle->fetchall($query);
                                                }else{
                                                    $page=$page-1;
                                                    $start_from=($page-1)*04;
                                                    $query = "select p.*, s.subcat_id,subcat_name, c.cat_id,cat_name from product p, subcategory s, category c where p.subcat_id=s.subcat_id and s.cat_id=c.cat_id order by p.prod_id asc limit $start_from,$num_per_page";
                                                    $count=$handle->numrows($query);
                                                    $fetch=$handle->fetchall($query);
                                               }
                                            }else{
                                                $fetch="";
                                            }
                                            // $handle->formate($fetch);
                                         ?>
                        <div class="bg-secondary rounded h-100 p-4">
                        <button type="button" onclick="window.location='add_product.php'" class="btn btn-outline-primary float-right" style="float:right;">Add Product</button>

                            <h6 class="mb-4">Product</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Image-1</th>
                                            <th scope="col">Image-2</th>
                                            <th scope="col">Image-3</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Special Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Flavour</th>
                                            <th scope="col">Weight</th>
                                            <th scope="col">Sub-Category ID</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(empty($fetch)){
                                        echo "<div id='message' class='alert alert-danger text-center'>No Data are there </div> ";
                                    }else{ 
                                        foreach($fetch as $row){
                                            $image=explode(",",$row['prod_image']);
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['prod_id']; ?></th>
                                            <td><?php echo $row['prod_name']; ?></td>
                                            <td><img class="rounded" src='img/product/convert/RC<?php echo $image[0] ?>' height="70px" width="70px"></td>
                                            <td><img class="rounded" src='img/product/convert/RC<?php echo $image[1] ?>' height="70px" width="70px"></td>
                                            <td><img class="rounded" src='img/product/convert/RC<?php echo $image[2] ?>' height="70px" width="70px"></td>
                                            <td><?php echo $row['prod_price']; ?></td>
                                            <td><?php echo $row['prod_sp_price']; ?></td>
                                            <td><?php echo $row['prod_qty']; ?></td>
                                            <td><?php echo $row['prod_flavour']; ?></td>
                                            <td><?php echo $row['prod_weight']; ?></td>
                                            <td><?php echo $row['subcat_name']; ?></td>
                                                <td>
                                                    <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-primary px-4"
                                                            name="editcategory"
                                                            onclick=" window.location='add_product.php?prod_id=<?php echo $row['prod_id'] ?>&page=<?php echo $page?>'">Edit</button>
                                                        <button type="button" class="btn btn-primary px-4"
                                                            onclick="deletedata(<?php echo $row['prod_id'] ?>,<?php echo $page?>)">Delete</button>

                                                    </div>
                                                </td>
                                                <?php if ($row['status'] == 'deactive') { ?>
                                                <td id="status_<?php echo $row['prod_id'] ?>"> <button
                                                        class="btn btn-danger mt-3"
                                                        onclick="active(<?php echo $row['prod_id'] ?>,'active')">Deactive</button>
                                                </td>
                                                <?php } else { ?>
                                                <td id="status_<?php echo $row['prod_id'] ?>"> <button
                                                        class="btn btn-success mt-3 px-4"
                                                        onclick="deactive(<?php echo $row['prod_id'] ?>,'deactive')">Active</button>
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
                                    $query1 = "select * from product order by prod_name ";
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