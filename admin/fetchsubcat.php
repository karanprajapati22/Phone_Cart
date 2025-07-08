<?php


if(isset($_POST['cat_id'])) {
    
    include_once 'dbcontroller.php';
    $obj = new DBcontroller();
    $category_id = $obj->secure($_POST['cat_id']);
    $query = "select * from subcategory where cat_id='$category_id'";
    $result = $obj->executequery($query);
    $count = $obj->numrows($query);

    if ($result) {
        if ($count <= 0) {
            echo '<option value="" selected>No Subcategory available</option>';
        } else {
            echo '<option value="" selected >Select Subcategory</option>';

            while ($fetch = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $fetch['subcat_id'] . '" >' . $fetch['subcat_name'] . '</option>';
            }
        }
    }
}
