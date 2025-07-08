<?php
include_once 'dbcontroller.php';
$handle = new DBcontroller();
$table_name=$_POST['page_name'];
$field_name=$_POST['id_name'];
$id = $handle->secure($_POST['id']);
if ($_POST['status'] == 'active') {
    $query = "update $table_name set status='active' where $field_name='$id'";
    $result = $handle->executequery($query);
?>
    <button class="btn btn-success mt-3 px-4" onclick="deactive(<?php echo $id ?>,'deactive' )">Active</button>
<?php 
    if($table_name=='subcategory')
    {
        $query = "update product set status='active' where `subcat_id`='$id'";
        $result = $handle->executequery($query);
    }


} else {
    $query = "update $table_name set status='deactive' where $field_name='$id'";
    $result = $handle->executequery($query);
    if($table_name=='subcategory')
    {
        $query = "update product set status='deactive' where `subcat_id`='$id'";
        $result = $handle->executequery($query);
    }
?>
    <button class="btn btn-danger mt-3" onclick="active(<?php echo $id ?>,'active' )">Deactive</button>
<?php } ?>