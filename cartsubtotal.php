<?php
    session_start();
    if(isset($_SESSION['email']))
    {
        include_once 'admin/dbcontroller.php';
        $handle=new DBcontroller();
        $query="select * from cart where reg_id=(select reg_id from registration where email='" . $_SESSION['email'] . "') and status='pending'";
        $result=$handle->executequery($query);
        $sub_total=0;
        while($row=mysqli_fetch_assoc($result)){
            $total_price=$row['prod_price']*$row['prod_qty'];
            $sub_total=$sub_total+$total_price;
        }
        echo '₹ '.$sub_total;
    }
?>