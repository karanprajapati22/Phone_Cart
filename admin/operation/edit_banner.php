<?php
include_once '../dbcontroller.php';
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// die();
if (isset($_POST['editbanner'])) {
    $handle = new DBcontroller();
    $banner_id = $handle->secure($_POST['banner_id']);
    $title = $handle->secure($_POST['title']);
    $caption = $handle->secure($_POST['caption']);
    $index_no = $handle->secure($_POST['index']);
    $page=$handle->secure($_POST['page']);
    // echo $page;
    // die();
    $convert = trim($_POST['convert']);
    $files = time() . ".jpg";
    $image_O = "T" . $files;
    $image_C = "TH" . $files;
    if($_FILES['banner_image']['name'] != "") {
        if ($_FILES['banner_image']['type'] != 'image/png' && $_FILES['banner_image']['type'] != 'image/jpg' && $_FILES['banner_image']['type'] != 'image/jpeg') {
            header('Location:../add_banner.php?page='.$page.'&banner_id='.$banner_id.'&info=Please select only png,jpg and jpeg format');
        } else {
            $originalpath = "../img/banner/original/";
            $convertedpath = "../img/banner/convert/";
            move_uploaded_file($_FILES['banner_image']['tmp_name'], $originalpath . $image_O);
            if ($_POST['convert'] == 'y') { 
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
            $query = "update banner set `caption`='$caption',`title`='$title',`index_no`='$index_no',`image`='$files', `convert`='$convert' where banner_id='$banner_id'";
            $result = $handle->executequery($query);
            if ($result) {
                header('Location:../view_banner.php?page='.$page.'&Success=Banner Updated successfully');
            } else {
                header('Location:../add_banner.php?error=Banner not Updated');
            }
        }
    } else {
        $query = "update banner set `caption`='$caption',`title`='$title',`index_no`='$index_no',`convert`='$convert' where banner_id='$banner_id'";
        $result = $handle->executequery($query);
        if ($result) {
            header('Location:../view_banner.php?page='.$page.'&Success=Banner Updated successfully');
        } else {
            header('Location:../add_banner.php?error=Banner not Updated');
        }
    }
} else {
    header('Location:../add_banner.php?error=Please Select Only JPG');
}
?>