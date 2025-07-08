<?php
    session_start();
    include_once  'admin/dbcontroller.php';
    $handle = new DBcontroller();

    $product_id = $handle->secure($_POST['product_id']);
    $qty2 = $handle->secure($_POST['num-product']);
    $query = "select * from registration where email='" . $_SESSION['email'] . "'";
    $result = $handle->fetchresult($query);
    $user_id = $result['reg_id'];

    $q =  "select * from product where prod_id='$product_id'";
    $fetch = $handle->fetchresult($q);

        $image=explode(",",$fetch['prod_image']);
        $p_image=$image[0];
        $prod_name=$fetch['prod_name'];
        $prod_price=$fetch['prod_price'];
        $prod_sp_price=$fetch['prod_sp_price'];

        $query2 =  "insert into cart(`prod_name`, `prod_image`, `prod_price`, `prod_qty`, `status`, `prod_id`, `reg_id`) values('$prod_name','$p_image','$prod_sp_price','$qty2','pending','$product_id','$user_id')";
        $res2 = $handle->executequery($query2);
        if($res2){
            $cart="select * from cart order by cart_id desc limit 1";
            $res = $handle->fetchresult($cart);
            $id=$res['cart_id'];
            // $handle->formate($res2);
            header('Location:checkout.php?id='.$id);
        }

?>