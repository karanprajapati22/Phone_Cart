<?php
include_once '../dbcontroller.php';

if (isset($_POST['submitbanner'])) {
    if ($_FILES['banner_image']['name'] != "") {
        if ($_FILES['banner_image']['type'] != 'image/png' && $_FILES['banner_image']['type'] != 'image/jpg' && $_FILES['banner_image']['type'] != 'image/jpeg') {
            header('Location:../add_banner.php?message=Please select only png,jpg and jpeg format');
        } else {
            $handle = new DBcontroller();
            $caption = $handle->secure($_POST['caption']);
            $title = $handle->secure($_POST['title']);
            $index=$handle->secure($_POST['index']);
            $convert = trim($_POST['convert']);
            $files = time() . ".jpg";
            $image_O = "T" . $files;
            $image_C = "TH" . $files;
            $originalpath = "../img/banner/original/";
            $convertedpath = "../img/banner/convert/";
            move_uploaded_file($_FILES['banner_image']['tmp_name'], $originalpath . $image_O);
            if ($_POST['convert'] == 'Y') {
                include_once '../simpleimage.php';
                $image = new SimpleImage();	
                $image->load($originalpath . $image_O);
                $image->resize(330, 420);
                $image->save($convertedpath . $image_C);
                $image = imagecreatefromjpeg($convertedpath . $image_C);
                $destination = $convertedpath . $image_C;
            } else {
                copy($originalpath . $image_O, $convertedpath . $image_C);
            }
            $date=date("d/m/Y");
            
            $query = "insert into banner (`image`, `caption`, `title`, `status`,`index_no`,`convert`) values('$files','$caption','$title','active','$index','$convert')";
            $result = $handle->executequery($query);
            if ($result) {
                header('Location:../view_banner.php?Success=Banner inserted successfully');
            } else {
                header('Location:../add_banner.php?error=Banner not inserted successfully');
            }
        }
    } else {
        header('Location:../add_Banner.php?error=Please Select Only JPG');
    }
} else {
    header('Location:../view_banner.php?error=Wrong button press');
}
?>
<?php

// include '../dbcontroller.php';
// $obj=new DBcontroller;

// $obj->formate($_POST);
// $obj->formate($_FILES);

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
