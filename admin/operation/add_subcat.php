<?php
include '../dbcontroller.php';
$obj=new DBcontroller;
session_start();
// $obj->formate($_POST);
// die();
if(isset($_POST['submitsubcategory'])){
    $cat_id=$obj->secure($_POST['cat_id']);
    $subcat_name=$obj->secure($_POST['subcategory_name']);
    $subcat_desc=$obj->secure($_POST['subcategory_desc']);
    $query="select * from subcategory where subcat_name='$subcat_name'";
    $count=$obj->numrows($query);
    $_SESSION['alreadyexistsubcat']=$_POST;   
        if($count==0){
            $query="insert into subcategory(`subcat_name`, `subcat_desc`, `cat_id`, `status`) values('$subcat_name','$subcat_desc','$cat_id','Active')";
            $run=$obj->executequery($query);
            if($run)
            {
                header('Location:../view_subcategory.php?Success=Sub-Category inserted successfully');
            }
            else
            {
                header('Location:../add_subcategory.php?error=Sub-Category not inserted successfully');
            }
        }else{
            header('Location:../add_subcategory.php?error=Category already exist');
        }
}else{
    header('Location:../view_subcategory.php?error=Wrong button press');
}
?>