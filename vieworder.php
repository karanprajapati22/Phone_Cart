<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>profile</title>
	<?php include_once 'pages/head.php' ?>
</head>
<style>
  .prof {
    /* margin-top: 80px; */
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
  }

  .main-breadcrumb{
    margin-top: 80px;
  }

  .main-body {
    /* margin-top: 80px; */
    padding: 15px;
  }

  .card {
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
  }

  .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
  }

  .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
  }

  .gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
  }

  .gutters-sm>.col,
  .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
  }

  .mb-3,
  .my-3 {
    margin-bottom: 1rem !important;
  }

  .bg-gray-300 {
    background-color: #e2e8f0;
  }

  .h-100 {
    height: 100% !important;
  }

  .shadow-none {
    box-shadow: none !important;
  }
</style>

<script>
  function change_dp(id){
    alert(id);
    var f = document.getElementById('.dp');
    var fileName= f.datafile.value;
    alert(fileName);
    
  }

    function change(id) {
        // alert(id);
        $.ajax({
            type: "POST",
            url: "change_profile.php",
            data: {
                id: id
            },
            success: function (data) {
                // alert(data);
                $('#info').html(data);
            }
        });
    }
</script>
<?php include 'pages/sweetalert.php' ?>

<body class="animsition">
	<!-- Header -->
	<?php include_once 'pages/header.php' ?>
	<!-- End Header -->
  <div id="info">
    <div class="container-fluid prof">
      <div class="main-body">
        <?php 
            include 'admin/dbcontroller.php';
            $handle= new DBcontroller();
            if(isset($_SESSION['email'])){
              $mail=$_SESSION['email'];
              $query="select * from registration  where email='$mail'";
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
                    <label for="upload" class="btn-outline-primary form-control">Change Photo</label>
                    <input onchange="change_dp(<?php echo $result['reg_id'] ?>)" class="dp" type="file" name="upload_dp" id="upload" hidden="true">
                  </div>
                </div>
              </div>
            </div>

            <!-- menu -->
            <div class="card mt-3">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='profile.php'">
                  <h6 class="my-2"><i class="fa fa-user fa-lg mr-2 icon-inline"></i>&nbsp;User Detail</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer" onclick="window.location='viewcart.php'">
                  <h6 class="my-2"><i class="fa fa-shopping-cart fa-lg mr-2 icon-inline"></i>&nbsp;View Cart</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pointer  active" onclick="window.location='vieworder.php'">
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
                                    
              <div class="row justify-content-center">
                <?php
                  
                  // include './admin/dbcontroller.php';
                  // $handle = new DBcontroller();
                  $query = "select * from `order` where reg_id=(select reg_id from registration where email='" . $_SESSION['email'] . "') order by order_id desc";
                  $res = $handle->fetchall($query);
                  ?>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="section-title mt-3">
                        <center>
                            <!-- <h3>Order</h3></br> -->
                            <a> <span class="h3">
                                    View Order
                                </span></a>
                        </center>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-stripped mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Product Detail</th>
                                    <th scope="col">price</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date Time</th>
                                    <th scope="col">Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $i = 1;
                                  foreach ($res as $row2) {
                                      $query = "select `cart`.*,`order`.*,`order_item`.* from `cart`,`order`,`order_item` where  `cart`.prod_id=`order_item`.prod_id and `order`.order_id='" . $row2['order_id'] . "' and `order_item`.order_id='" . $row2['order_id'] . "' and `cart`.reg_id='" . $row2['reg_id'] . "' and `cart`.cart_id=`order_item`.cart_id";
                                      $res2 = $handle->fetchall($query);
                                      $count = count($res2);
                                      $i = 1;
                                      $j=1;
                                      foreach ($res2 as $row) {
                                          $order_status = $row['or_item_status'];
                                  ?>
                                        <tr>
                                            <?php if ($i == 1) { ?>
                                                <td rowspan="<?php echo $count ?>"><?php echo $row['order_id'] ?></td>
                                            <?php
                                                  $i++;
                                              } ?>
                                            <td>
                                                <img src="admin/img/product/convert/RC<?php echo $row['prod_image'] ?>" height="60px" width="60px">&nbsp;
                                                <?php echo $row['prod_name'] ?>
                                            </td>
                                            <td><?php echo $row['prod_price'] ?></td>
                                            <td><?php echo $row['prod_qty'] ?></td>
                                            <td><?php echo $row['prod_price'] * $row['prod_qty'] ?></td>
                                            <td><?php echo date('d-m-y h:i:s A', strtotime($row['date_time'])); ?>
                                            </td>
                                            <?php if ($j == 1) { ?>
                                                <td rowspan="<?php echo $count ?>"><?php echo $row['order_status'] ?></td>
                                            <?php
                                                  $j++;
                                              } ?>
                                        </tr>
                                <?php
                                      }
                                  } ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
	<!-- Footer -->
	<?php include_once 'pages/footer.php' ?>
	<!--end  Footer -->

<?php include_once 'pages/sidecart.php' ?>

	



	
</body>

</html>