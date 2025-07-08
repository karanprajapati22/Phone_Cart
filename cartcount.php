<?php
    session_start();
    include_once 'admin/dbcontroller.php';
    $handle=new DBcontroller();
    $query="select * from cart where reg_id=(select reg_id from registration where email='" . $_SESSION['email'] . "') and status='pending'";
    $result=$handle->numrows($query);
     ?>
    <div onclick="window.location='shoping-cart.php'" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti "
    data-notify="<?php echo $result; ?>">
    <i class="zmdi zmdi-shopping-cart"></i>
    </div>