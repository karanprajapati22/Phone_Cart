<?php
include_once '../dbcontroller.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
if (isset($_POST['editsubcategory'])) {
    $handle = new DBcontroller();
    $category_id = $handle->secure($_POST['cat_id']);
    $subcategory_id=$handle->secure($_POST['subcategory_id']);
    $subcategory_name = $handle->secure($_POST['subcategory_name']);
    $subcategory_des = $handle->secure($_POST['subcategory_desc']);
    $page=$handle->secure($_POST['page']);
    $query = "update subcategory set `subcat_name`='$subcategory_name',`subcat_desc`='$subcategory_des' ,`status`='active',`cat_id`='$category_id' where `subcat_id`='$subcategory_id'";
    $result = $handle->executequery($query);
    if ($result) {
            header('Location:../view_subcategory.php?page='.$page.'&Success=Category Updated successfully');
    } else {
            header('Location:../add_subcategory.php?error=Category not Updated');
    }
}
else
    {
        header('Location:../view_subcategory.php?error=Press wrong button');
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