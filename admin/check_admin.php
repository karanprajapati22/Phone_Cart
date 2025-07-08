<?php

include 'dbcontroller.php';
$obj=new DBcontroller();


$email=$obj->secure($_POST['email']);
$password=$obj->secure($_POST['password']);
$enc_password=md5($password);


$query="select * from login where `email` = '$email' and `type` = 'admin'";
$count=$obj->numrows($query);
if($count>0)
{
    $query="select * from login where `email` = '$email' and `password` = '$enc_password' and `type` = 'admin'";
    $count1=$obj->numrows($query);  
    
    if($count1==1){
        session_start();
        $_SESSION['tmp_session']=$email;

        if(isset($_POST['check'])){
   
        $_SESSION['admin_email']=$email;
        header('Location:dashboard.php?success='.$email.' Login Successfully');
        }else{
           header('Location:login.php?info=Please select check me button');
        }
    }else{
        header('Location:login.php?info=Please enter correct password');

          
    }
}
else{
    header('Location:login.php?info='.$email.' is not Registered');
}

?>