<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();

if (isset($_POST['insertorder'])) {
    include_once 'admin/dbcontroller.php';
    $res = $_SESSION['cart'];
    // echo "<pre>";
    // print_r($res);
    $total_item = count($_SESSION['cart']);
    $total_amount = 0;
    foreach ($res as $row) {
        // $total_item=$total_item + $row['prod_qty'];
        $total_amount = $total_amount + ($row['prod_price'] * $row['prod_qty']);
        $registration_id = $row['reg_id'];
    }
    $handle = new DBcontroller();
    date_default_timezone_set('Asia/Kolkata');
    $date_time = date('y-m-d H:i:s');
    // echo $date_time;
    // die();
    $query3="INSERT INTO `order`(`payment_type`, `total_item`, `total_amount`, `date_time`, `reg_id`, `order_status`) VALUES ('COD','$total_item','$total_amount','$date_time','$registration_id','Pending')";
    $result3 = $handle->executequery($query3);
    if ($result3) {
        $query = "select * from `order` where reg_id='$registration_id' and order_status='Pending' order by order_id desc";
        $result4 = $handle->fetchresult($query);
        $order_id = $result4['order_id'];
        $order_item= $result4['total_item'];
        $concate = "";
        $i = 1;
        foreach ($res as $row) {
            $product_id =  $row['prod_id'];
            $product_price = $row['prod_price'];
            $product_qty = $row['prod_qty'];
            $cart_id = $row['cart_id'];
            if ($i != $total_item) {
                $concate .= "('$product_id','$order_id','$product_price','$product_qty','Pending','$cart_id'),";
                $i++;
            } elseif ($i == $total_item) {
                $concate .= "('$product_id','$order_id','$product_price','$product_qty','Pending','$cart_id')";
            }
            $query6 = "update cart set status='success' where cart_id='$cart_id' and reg_id='$registration_id'";
            $run = $handle->executequery($query6);
        }
        $email=$_SESSION['email'];
        $query="select * from registration where `email` = '$email'";
        $result=$handle->fetchresult($query);
        // $obj->formate($result);
        $name=$result['last_name']." ".$result['first_name'];

        $query = "insert into `order_item` (`prod_id`,`order_id`,`prod_price`,`prod_qty`,`or_item_status`,`cart_id`) values" . $concate;
        $final_order = $handle->executequery($query);
           if($final_order){

            require 'phpmailer/Exception.php';
            require 'phpmailer/PHPMailer.php';
            require 'phpmailer/SMTP.php';
    
            $mail = new PHPMailer(true);
            session_start();
            $email=$_SESSION["email"];
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'phonecart2024@gmail.com';                     // SMTP username
                $mail->Password   = 'jqhtzobxiugurxxi';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to
    
                //Recipients
                $mail->setFrom('phonecart2024@gmail.com', 'Phonecart');
                $mail->addAddress($email, 'Phonecart');     // Add a recipient
                $_SESSION['info'] = "Order Successfully done";
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Order Placed Successfully";
                $mail->Body    = " Hi," . $name . "</br> Thank you for giving order in <b>Phonecart</b><br>order Id : ".$order_id."<br> Your order item : ".$order_item."<br> Total Amount is :  ".$total_amount;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            header('Location:order_invoice.php?id='.$order_id);
           }
    }
}elseif(isset($_GET['type'])){
    include_once 'admin/dbcontroller.php';
    $handle = new DBcontroller();
    $query2="INSERT INTO `billing`(`name`, `address`, `city`, `pincode`, `mobile`, `email`, `reg_id`) VALUES ('".$_SESSION['billing_pay']['name']."','".$_SESSION['billing_pay']['address']."','".$_SESSION['billing_pay']['city']."','".$_SESSION['billing_pay']['pin']."','".$_SESSION['billing_pay']['mob']."','".$_SESSION['billing_pay']['email']."','".$_SESSION['billing_pay']['reg']."')";
    $result=$handle->executequery($query2);
    if($result){
        $res = $_SESSION['cart'];
        // echo "<pre>";
        // print_r($res);
        $total_item = count($_SESSION['cart']);
        $total_amount = 0;
        foreach ($res as $row) {
            $total_amount = $total_amount + ($row['prod_price'] * $row['prod_qty']);
            $registration_id = $row['reg_id'];
        }
        $handle = new DBcontroller();
        date_default_timezone_set('Asia/Kolkata');
        $date_time = date('y-m-d H:i:s');
        // echo $date_time;
        // die();
        $query3="INSERT INTO `order`(`payment_type`, `total_item`, `total_amount`, `date_time`, `reg_id`, `order_status`) VALUES ('Razorpay','$total_item','$total_amount','$date_time','$registration_id','Pending')";
        $result3 = $handle->executequery($query3);
        if ($result3) {
            $query = "select * from `order` where reg_id='$registration_id' and order_status='Pending' order by order_id desc";
            $result4 = $handle->fetchresult($query);
            $order_id = $result4['order_id'];
            $order_item= $result4['total_item'];
            $concate = "";
            $i = 1;
            foreach ($res as $row) {
                $product_id =  $row['prod_id'];
                $product_price = $row['prod_price'];
                $product_qty = $row['prod_qty'];
                $cart_id = $row['cart_id'];
                if ($i != $total_item) {
                    $concate .= "('$product_id','$order_id','$product_price','$product_qty','Pending','$cart_id'),";
                    $i++;
                } elseif ($i == $total_item) {
                    $concate .= "('$product_id','$order_id','$product_price','$product_qty','Pending','$cart_id')";
                }
                $query6 = "update cart set status='success' where cart_id='$cart_id' and reg_id='$registration_id'";
                $run = $handle->executequery($query6);
            }
            $email=$_SESSION['email'];
            $query="select * from registration where `email` = '$email'";
            $result=$handle->fetchresult($query);
            // $obj->formate($result);
            $name=$result['last_name']." ".$result['first_name'];

            $query = "insert into `order_item` (`prod_id`,`order_id`,`prod_price`,`prod_qty`,`or_item_status`,`cart_id`) values" . $concate;
            $final_order = $handle->executequery($query);
            if($final_order){

                require 'phpmailer/Exception.php';
                require 'phpmailer/PHPMailer.php';
                require 'phpmailer/SMTP.php';
        
                $mail = new PHPMailer(true);
                session_start();
                $email=$_SESSION["email"];
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                    $mail->isSMTP();                                            // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'phonecart2024@gmail.com';                     // SMTP username
                    $mail->Password   = 'cpchgtxcljqzryai';                               // SMTP password
                    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to
        
                    //Recipients
                    $mail->setFrom('phonecart2024@gmail.com', 'Phonecart');
                    $mail->addAddress($email, 'Phonecart');     // Add a recipient
                    $_SESSION['info'] = "Order Successfully done";
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = "Order Placed and Payment Done Successfully";
                    $mail->Body    = " Hi," . $name . "</br> Thank you for giving order in <b>Phonecart</b><br>order Id : ".$order_id."<br> Your order item : ".$order_item."<br> Total Amount is :  ".$total_amount."</br>Your Payment Done Successfully Using online payment (Razorpay)";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                header('Location:order_invoice.php?id='.$order_id);
            }
            }
    }
}
else {
    header('Location:order.php');
}
?>