<?php
if(isset($_POST['submitpass'])){


include 'admin/dbcontroller.php';

$obj=new DBcontroller();

session_start();
$email=$_SESSION['email'];

$password=$obj->secure($_POST['password']);
$confirm=$obj->secure($_POST['confirm']);

$enc_password=md5($password);
if($password == $confirm)
{
$query="update registration set `password` = '$enc_password' where `email` = '$email'";
$result=$obj->executequery($query);
$query1="update login set `password` = '$enc_password' where `email` = '$email'";
$result1=$obj->executequery($query1);

if($result and $result1)
{
    header('Location:signin.php?success=Password successfully changed ');
    
}
else
{
    header('Location:createpass.php?error=password not forget');
}

}else{
    header('Location:createpass.php?error=Please enter same password');
}
}else{
    header('Location:createpass.php?error=Please press correct button');
}

?>