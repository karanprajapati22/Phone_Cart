<?php
include_once '../dbcontroller.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// die();
if (isset($_POST['editcategory'])) {
    $handle = new DBcontroller();
    $category_id = $handle->secure($_POST['category_id']);
    $category_name = $handle->secure($_POST['category_name']);
    $page=$handle->secure($_POST['page']);
    // echo $page;
    // die();
    $category_des = $handle->secure($_POST['category_des']);
    $convert = trim($_POST['convert']);
    $files = time() . ".jpg";
    $image_O = "T" . $files;
    $image_C = "TH" . $files;
    if($_FILES['category_image']['name'] != "") {
        if ($_FILES['category_image']['type'] != 'image/png' && $_FILES['category_image']['type'] != 'image/jpg' && $_FILES['category_image']['type'] != 'image/jpeg') {
            header('Location:../add_category.php?page='.$page.'&cat_id='.$category_id.'&info=Please select only png,jpg and jpeg format');
        } else {

            $originalpath = "../img/category/original/";
            $convertedpath = "../img/category/convert/";
            move_uploaded_file($_FILES['category_image']['tmp_name'], $originalpath . $image_O);
            if ($_POST['convert'] == 'y') { 

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
            $query = "update category set `cat_name`='$category_name',`cat_image`='$files', `convert`='$convert',`cat_desc`='$category_des',`status`='active' where cat_id='$category_id'";
            $result = $handle->executequery($query);
            if ($result) {
                header('Location:../view_category.php?&Success=page='.$page.'Category Updated successfully');
            } else {
                header('Location:../add_category.php?error=Category not Updated');
            }
        }
    } else {
        $query = "update category set `cat_name`='$category_name', `convert`='$convert' , `cat_desc`='$category_des' ,`status`='active' where `cat_id`='$category_id'";
        $result = $handle->executequery($query);
        if ($result) {
            header('Location:../view_category.php?page='.$page.'&Success=Category Updated successfully');
        } else {
            header('Location:../add_category.php?error=Category not Updated');
        }
    }
} else {
    header('Location:../view_category.php?error=wrong button selected');
}
?>

<?php
// include '../dbcontroller.php';
// $obj=new DBcontroller;
// // $obj->formate($_GET);
// // $obj->formate($_POST);
// // $obj->formate($_FILES);
// // die();
// $id=$_GET['cat_id'];
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
//         $query="UPDATE `category` SET `cat_name`='$name',`cat_image`='$category',`cat_desc`='$desc',`status`='Active' WHERE `cat_id`='$id'";
//         $res=$obj->executequery($query);
//         if($res)
//         {
//             header('Location:../view_category.php?Success=Category Updated successfully');
//         }
//         else
//         {
//             header('Location:../add_category.php?error=Category not Updated');
//         }
//     }
//     else
//     {
//         header('Location:../add_category.php?error=Please Select Only JPG');
//     }
?>  