<?php
if (isset($_POST['button'])) {
    include 'dbcontroller.php';
    $handle = new DBcontroller();
    $val = $_POST['value'];
    $query = "update order_item set or_item_status='$val' where or_item_id='" . $_POST['or_item_id'] . "'";
    $result = $handle->executequery($query);
    if ($result) {
        echo "Order status changed";
    }
}

if (isset($_POST['order_button'])) {
    include 'dbcontroller.php';
    $handle = new DBcontroller();
    $val = $_POST['value'];
    $query = "update `order` set order_status='$val' where order_id='". $_POST['order_id']."'";
    $result = $handle->executequery($query);
    if ($result) {
        $query = "update order_item set or_item_status='Complete' where order_id='" . $_POST['order_id'] . "'";
        $result = $handle->executequery($query);
        if ($result) {
            echo "Order status changed";
        }
    }
}