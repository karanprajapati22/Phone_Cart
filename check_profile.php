<?php

include 'admin/dbcontroller.php';
$obj=new DBcontroller();
$id=$obj->secure($_POST['reg_id']);
$fname=$obj->secure($_POST['f_name']);
$lname=$obj->secure($_POST['l_name']);
$mobile=$obj->secure($_POST['mob']);
$city=$obj->secure($_POST['city']);
$state=$obj->secure($_POST['state']);
$country=$obj->secure($_POST['country']);
$gender=$obj->secure($_POST['gender']);

if (isset($id)){
    $query="UPDATE `registration` SET `first_name`='$fname',`last_name`='$lname',`gender`='$gender',`phone_no`='$mobile',`city`='$city',`state`='$state',`country`='$country' WHERE `reg_id`='$id'";
    $res=$obj->executequery($query);
    if($res)
    {
        header('Location:profile.php?success=Profile Updated');
    }
    else
    {
        header('Location:profile.php?alert=Profile is not Updated');
    }
}
else
{
    header('Location:profile.php?alert=Profile is not Updated');
}

?>