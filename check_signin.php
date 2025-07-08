<?php

include 'admin/dbcontroller.php';
$obj=new DBcontroller();

$email=$obj->secure($_POST['email']);
$password=$obj->secure($_POST['password']);
$enc_password=md5($password);

$query="select * from registration where `email` = '$email'";
$count=$obj->numrows($query);
if($count==1)
{
    $query="select * from registration where `email` = '$email' and `password` = '$enc_password'";
    $count1=$obj->numrows($query);  
    if($count1==1){
        session_start();
        $_SESSION['email']=$email;
        header('Location:index.php?success='.$email.' Login Successfully');
    }else{
        header('Location:signin.php?info=Please enter correct password');

          
    }
}
else{
    header('Location:signin.php?info='.$email.' is not Registered');
}





?>