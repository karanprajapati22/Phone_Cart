<?php

if(isset($_POST['cat_id']))
{
    include 'admin/dbcontroller.php';
    $handle=new DBcontroller();
    $id=$handle->secure($_POST['cat_id']);
    $query="select * from subcategory where cat_id='$id'";
    $result=$handle->executequery($query);
    $count=$handle->numrows($query);
    if ($result) {
        if ($count <= 0) {
            echo '<option value="" selected>No Subcategory available</option>';
        } else {
            echo '<option value="" selected >Select Subcategory</option>';

            while ($fetch = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $fetch['subcat_id'] . '" id="subcategory_list">' . $fetch['subcat_name'] . '</option>';
            }
        }
    }
}

?>