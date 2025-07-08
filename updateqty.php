<?php
    if(isset($_POST['cart_id']))
    {
        include_once 'admin/dbcontroller.php';
        $handle=new DBcontroller();
        $cart_id=$handle->secure($_POST['cart_id']);
        $prod_qty=$handle->secure($_POST['prod_qty']);
        $prod_price=$handle->secure($_POST['prod_price']);
        $query="update cart set prod_qty='$prod_qty' where cart_id='$cart_id'";
    }
    $result=$handle->executequery($query);
    if($result)
    {
        $total_price=$prod_price*$prod_qty;
        echo '₹ '.$total_price;
    }
?>