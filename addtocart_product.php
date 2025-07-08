<?php
    session_start();
    include_once  'admin/dbcontroller.php';
    $handle = new DBcontroller();
    $product_id = $handle->secure($_POST['p_id']);
    $qty2 = $handle->secure($_POST['qty']);
    $query = "select * from registration where email='" . $_SESSION['email'] . "'";
    $result = $handle->fetchresult($query);
    $user_id = $result['reg_id'];
    $res = "select * from cart where reg_id='$user_id' and status='pending'and prod_id='$product_id'";
    $count = $handle->numrows($res);
    $q =  "select * from product where prod_id='$product_id'";
    $fetch = $handle->fetchresult($q);

    // if (isset($_POST['price']) and isset($_POST['product_nm'])) {
    //     $p_price = $handle->secure($_POST['price']);
    //     $p_name = $handle->secure($_POST['product_nm']);
    // } else {
    //     $p_name = $fetch['product_name'];
    //     $p_price = $fetch['price'];
    // }
    // $p_image = $fetch['prod_image'];
        $image=explode(",",$fetch['prod_image']);
        $p_image=$image[0];
        $prod_name=$fetch['prod_name'];
        $prod_price=$fetch['prod_price'];
        $prod_sp_price=$fetch['prod_sp_price'];

    if ($count > 0) {
        if (isset($_POST['price'])) {
            $query2 = "update cart set prod_name='$prod_name', prod_qty='$qty2',prod_price='$prod_sp_price'  where reg_id='$user_id' and status='pending'and prod_id='$product_id'";
        } else {
            $query2 = "update cart set  prod_name='$prod_name',prod_qty='$qty2',prod_price='$prod_sp_price' where reg_id='$user_id' and status='pending'and prod_id='$product_id'";
        }
        $res3 = $handle->executequery($query2);
        if ($res3) {
            echo 0;
        }
    } else {


        $query2 =  "insert into cart(`prod_name`, `prod_image`, `prod_price`, `prod_qty`, `status`, `prod_id`, `reg_id`) values('$prod_name','$p_image','$prod_sp_price','$qty2','pending','$product_id','$user_id')";
        $res2 = $handle->executequery($query2);
        if($res2){
            echo 1;
        }
    }
?>