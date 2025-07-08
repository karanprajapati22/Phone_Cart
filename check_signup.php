<?php

include 'admin/dbcontroller.php';

$obj=new DBcontroller();

session_start();

$fname=$obj->secure($_POST['fname']);
$lname=$obj->secure($_POST['lname']);
$email=$obj->secure($_POST['email']);
$mobile=$obj->secure($_POST['mobile']);
$city=$obj->secure($_POST['city']);
$state=$obj->secure($_POST['state']);
$country=$obj->secure($_POST['country']);
$gender=$obj->secure($_POST['gender']);
$password=$obj->secure($_POST['password']);
$confirm=$obj->secure($_POST['confirm']);

$enc_password=md5($password);


$query="select * from registration where `email` = '$email'";
$count=$obj->numrows($query);
if($count>=1){
     header('location:signup.php?info='.$fname.' '.$lname.' already exist in this system');
}else{
$name="bakery"."_".rand(11,99)."_".$_FILES['profile']['name'];
$or_name=$_FILES['profile']['name'];
$type=$_FILES['profile']['type'];
$tmp_name=$_FILES['profile']['tmp_name'];

$extension=array('image/jpg','image/jpeg','image/png');

    if(in_array($type,$extension))
    {
        move_uploaded_file($tmp_name,'profile/'.$name);
        $query="insert into registration (`first_name`,`last_name`,`email`,`gender`,`phone_no`,`city`,`state`,`country`,`password`,`profile_pic`,`status`) values ('$fname','$lname','$email','$gender','$mobile','$city','$state','$country','$enc_password','$name','Registerd')";
        $res=$obj->executequery($query);
        if($res)
        {
            $query="insert into login (`email`,`password`,`type`) values ('$email','$enc_password','user')";
            $res2=$obj->executequery($query);
            if($res2)
            {
                $_SESSION['email']=$email;
                header('Location:index.php');
            }
            else
            {
                header('Location:signup.php?error=User Not Registerd Successfully');
            }
        }
        else
        {
            header('Location:signup.php?error=User Not Registerd Successfully');
        }
    }
    else
    {
        header('Location:signup.php?error=User Not Registerd Successfully');
    }
}

?>