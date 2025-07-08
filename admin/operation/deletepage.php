<?php
include '../dbcontroller.php';
$handle=new DBcontroller();
$table_name=$_POST['page_name'];

if($table_name=="category"){
    $field_name=$_POST['id_name'];
}elseif($table_name=="subcategory"){
    $field_name=$_POST['id_name'];
}elseif($table_name=="product"){
    $field_name=$_POST['id_name'];
}elseif($table_name=="banner"){
    $field_name=$_POST['id_name'];
}elseif($table_name=="cart"){
    $field_name=$_POST['id_name'];
}
$id = $handle->secure($_POST['id']);
if(isset($id)){
    $query="delete from $table_name where $field_name='$id'";
    
    $result=$handle->executequery($query);
    if($result){
        $q="select * from $table_name where $field_name='$id'";
        $count=$handle->numrows($q);
        if($count>0){
          echo 0;
        }else{
          echo 1;
        }
    }
}
?>