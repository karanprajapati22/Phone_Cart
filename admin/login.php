

<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
        include 'head.php';
?>
</head>

<?php //include '../pages/sweetalert.php' ?>
<?php include '../pages/validation.php' ?>
<?php
if(isset($_SESSION['admin_email'])){
?>
<script>
    history.back();
</script>
<?php
}
?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">

                        <?php
                            if(isset($_GET['info'])){
                                echo ' <div class="alert btn-primary shadow text-center mb-5">'.$_GET['info'].'</div>';
                            }
                            if(isset($_GET['error'])){
                                echo ' <div class="alert btn-primary shadow text-center mb-5">'.$_GET['error'].'</div>';
                            }
                        ?>
                       
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <a href="login.php" class="">
                               <img width="230px" class="mb-2" src="img/phonecart_logo.png" alt="">
                            </a>
                        </div> 
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <h3>Sign In</h3>
                        </div> 

                        <form action="check_admin.php"  method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" value="<?php 
                         
                            echo $_SESSION["tmp_session"] ?? ' ' ?>" name="email" placeholder="Enter your Email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Enter your Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"  name="check" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me in</label>
                            </div>
                            <!-- <a href="forgot_pass.php">Forgot Password</a> -->
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>




    
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>