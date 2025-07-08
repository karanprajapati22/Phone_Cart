<?php
include_once '../dbcontroller.php';
session_start();
if (isset($_POST['submitcategory'])) {
    $handle = new DBcontroller();
    $category_name = $handle->secure($_POST['category_name']);
    $category_des = $handle->secure($_POST['category_des']);
    $page=$handle->secure($_POST['page']);
    $convert = trim($_POST['convert']);
    $query="select * from category where cat_name='$category_name'";
    $count=$handle->numrows($query);
    $_SESSION['alreadyexistcat']=$_POST;   
    if($count==0){
    if ($_FILES['category_image']['name'] != "") {
        if ($_FILES['category_image']['type'] != 'image/png' && $_FILES['category_image']['type'] != 'image/jpg' && $_FILES['category_image']['type'] != 'image/jpeg') {
            header('Location:../add_category.php?message=Please select only png,jpg and jpeg format');
        } else {

            $files = time() . ".jpg";
            $image_O = "T" . $files;
            $image_C = "TH" . $files;
            $originalpath = "../img/category/original/";
            $convertedpath = "../img/category/convert/";
            move_uploaded_file($_FILES['category_image']['tmp_name'], $originalpath . $image_O);
            if ($_POST['convert'] == 'Y') {

                include_once '../simpleimage.php';
                $image = new SimpleImage();	
                $image->load($originalpath . $image_O);
                $image->resize(330, 330);
                $image->save($convertedpath . $image_C);
                $image = imagecreatefromjpeg($convertedpath . $image_C);
                $destination = $convertedpath . $image_C;
            } else {
                copy($originalpath . $image_O, $convertedpath . $image_C);
            }
            $query = "insert into category (`cat_name`, `cat_image`, `cat_desc`, `status`, `convert`) values('$category_name','$files','$category_des','active','$convert')";
            $result = $handle->executequery($query);
            if ($result) {
                $_SESSION['alreadyexistcat']=" ";
                header('Location:../view_category.php?page='.$page.'&Success=Category inserted successf-ully');
            } else {
                header('Location:../add_category.php?error=Category not inserted successfully');
            }
        }
    } else {
        header('Location:../add_category.php?error=Please Select Only JPG');
    }
}else {
    header('Location:../add_category.php?error=Category already exist');
}
} else {
    header('Location:../view_category.php?error=Wrong button press');
}
?>
<?php

// include '../dbcontroller.php';
// $obj=new DBcontroller;

// // $obj->formate($_POST);
// // $obj->formate($_FILES);

// $name=$obj->secure($_POST['name']);
// $desc=$obj->secure($_POST['desc']);

// $category="cat"."_".rand(11,99)."_".$_FILES['img']['name'];
// $or_name=$_FILES['img']['name'];
// $type=$_FILES['img']['type'];
// $tmp_name=$_FILES['img']['tmp_name'];
// $extension=array('image/jpg','image/jpeg','image/png');

// if(in_array($type,$extension))
//     {
//         move_uploaded_file($tmp_name,'../img/category/'.$category);
//         $query="insert into category (`cat_name`, `cat_image`, `cat_desc`, `status`) values ('$name','$category','$desc','Active')";
//         $res=$obj->executequery($query);
//         if($res)
//         {
//             header('Location:../view_category.php?Success=Category inserted successfully');
//         }
//         else
//         {
//             header('Location:../add_category.php?error=Category not inserted successfully');
//         }
//     }
//     else
//     {
//         header('Location:../add_category.php?error=Please Select Only JPG');
//     }

// ?>
