<?php

include 'admin/dbcontroller.php';
$obj=new DBcontroller();
// print_r($_POST);
// die();
$email=$obj->secure($_POST['email']);
$msg=$obj->secure($_POST['msg']);
$review=$obj->secure($_POST['star']);

    $query="insert into contact_us(`email`,`message`,`rating`) values('$email','$msg','$review')";
    $run=$obj->executequery($query);  
    if($run){
        header('Location:contact.php?success='.$email.' Request Submitted Successfully');
    }else{
        header('Location:contact.php?info=Please enter correct Detail');
    }

?>