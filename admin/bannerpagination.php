<div class="container-fluid pt-4 px-4" >
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
                                               if (isset($_POST['page'])) {

                                                 $page = $_POST['page'];
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
                                            <td><img class="rounded" src='img/banner/convert/TH<?php echo $row['image']?>'
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