<script>
    $(document).ready(function(){
        $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    });
</script>
<?php
    if(isset($_SESSION['email'])){ 
        $email=$_SESSION['email'];
?>
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
<?php

include_once  'admin/dbcontroller.php';
$handle = new DBcontroller();
$query="select * from cart where status='pending' and reg_id=(select reg_id from registration where email='$email')";

$count=$handle->numrows($query);
if($count>0){
$fetch=$handle->fetchall($query);
    foreach($fetch as $row){
?>
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="admin/img/product/convert/RC<?php echo $row['prod_image']; ?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                        <?php echo $row['prod_name']; ?>
                        </a>

                        <span class="header-cart-item-info">
                        <?php echo  $row['prod_qty'].' X ₹ '.$row['prod_price']; ?>
                        </span>
                    </div>
                </li>
<?php
    }
}else{
    echo "<div id='message' class='alert alert-danger text-center'>There is No Products in Cart </div> ";	
}
?>
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.php"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.php"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
