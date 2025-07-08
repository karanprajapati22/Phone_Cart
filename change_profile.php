<?php include 'pages/validation.php' ?>
<div class="container-fluid prof">
    <div class="main-body">
      <?php 
              include 'admin/dbcontroller.php';
              $handle= new DBcontroller();
              if(isset($_POST['id'])){
                $id=$_POST['id'];
                $query="select * from registration  where reg_id='$id'";
                $result=$handle->fetchresult($query);
              }
            ?>
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb py-3 px-3">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">My Account</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <!-- profile -->
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src='profile/<?php echo $result['profile_pic'] ?>' alt="Admin" class="rounded-circle" height="190"
                  width="200">
                <div class="mt-3">
                  <h4><?php echo $result['first_name'].' '.$result['last_name'] ?></h4>
                  <p class="text-secondary mb-1"><?php echo $result['email'] ?></p>
                  <p class="text-muted font-size-sm">
                    <?php echo $result['city'].','.$result['state'].','.$result['country'] ?></p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
            </div>
          </div>

          <!-- menu -->
            <div class="card mt-3">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer active">
                  <h6 class="my-2"><i class="fa fa-user fa-lg mr-2 icon-inline"></i>&nbsp;User Detail</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='viewcart.php'">
                  <h6 class="my-2"><i class="fa fa-shopping-cart fa-lg mr-2 icon-inline"></i>&nbsp;View Cart</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='vieworder.php'">
                  <h6 class="my-2"><i class="fa fa-truck fa-lg mr-2 icon-inline"></i>&nbsp;View Order</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='createpass.php'">
                  <h6 class="my-2"><i class="fa fa-key fa-lg mr-2 icon-inline"></i>&nbsp;Change Password</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='signout.php'">
                  <h6 class="my-2"><i class="fa fa-sign-out fa-lg mr-2 icon-inline"></i>&nbsp;Signout</h6>
                </li>
              </ul>
            </div>
        </div>

        <!-- user detail -->
        
        <div class="col-md-8">
          <div class="card mb-3">
            <form action="check_profile.php" method="post">
            <input type="hidden" name="reg_id" value="<?php echo $result['reg_id'] ?>">
              <div class="card-body">
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">First Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="f_name" class="first_name" value="<?php echo $result['first_name'] ?>">
                  </div>
                  <span class="text-danger" id="fname"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Last Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="last_name" name="l_name" value="<?php echo $result['last_name'] ?>">
                  </div>
                  <span class="text-danger" id="lname"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $result['email'] ?>
                  </div>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="tel" class="mobile" name="mob" value="<?php echo $result['phone_no'] ?>">
                  </div>
                  <span class="text-danger" id="mobile"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">City</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="city" class="city" value="<?php echo $result['city'] ?>">
                  </div>
                  <span class="text-danger" id="city"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">State</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="state" name="state" value="<?php echo $result['state'] ?>">
                  </div>
                  <span class="text-danger" id="state"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Country</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="country" name="country" value="<?php echo $result['country'] ?>">
                  </div>
                  <span class="text-danger" id="country"></span>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-9">
                    <?php 
                      if($result['gender']=='Male')
                      {
                      echo '
                      
                      <div class="form-check form-check-inline">
                      <input class="form-check-input bg-light" type="radio" name="gender" value="Male" checked />
                      <label class="form-control-label ">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input bg-light" type="radio" name="gender" value="Female" />
                      <label class="form-control-label ">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input bg-light" type="radio" name="gender" value="Other" />
                      <label class="form-control-label ">Other</label>
                    </div>
                      ';


                      }elseif($result['gender']=='Female'){
                        echo '
                      
                        <div class="form-check form-check-inline">
                        <input class="form-check-input bg-light" type="radio" name="gender" value="Male"  />
                        <label class="form-control-label ">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input bg-light" type="radio" name="gender" value="Female" checked/>
                        <label class="form-control-label ">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input bg-light" type="radio" name="gender" value="Other" />
                        <label class="form-control-label ">Other</label>
                      </div>
                        ';
    
                      }else{
                        echo '
                      
                        <div class="form-check form-check-inline">
                        <input class="form-check-input bg-light" type="radio" name="gender" value="Male"  />
                        <label class="form-control-label ">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input bg-" type="radio" name="gender" value="Female" />
                        <label class="form-control-label ">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input bg-light" type="radio" name="gender" value="Other" checked/>
                        <label class="form-control-label ">Other</label>
                      </div>
                        ';
                      }
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row my-2">
                  <div class="col-sm-2">
                    <button type="submit" id="submit" class="btn btn-outline-primary py-2"><i class="fa fa-check fa-lg"></i>&nbsp;Confirm</button>
                  </div>
                  <div class="col-sm-2">
                    <button onclick="window.location='profile.php'" class="btn btn-outline-danger py-2"><i class="fa fa-close fa-lg"></i>&nbsp;Cancel</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>