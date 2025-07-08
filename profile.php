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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
            <li class="breadcrumb-item active" aria-current="page">User Detail</li>
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
                    <label class="btn-outline-primary form-control">Change Photo</label>
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
                <div class="card-body">
                  <div class="row my-2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $result['first_name'].' '.$result['last_name'] ?>
                    </div>
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
                      <?php echo $result['phone_no'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row my-2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $result['city'].','.$result['state'].','.$result['country'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row my-2">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $result['gender'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row my-2">
                    <div class="col-sm-12">
                      <button class="btn btn-outline-primary py-2" onclick="change(<?php echo $result['reg_id'] ?>)">Change Detail</button>
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