<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_id = "";
$status = "";
if (!empty($_GET)) {
    $order_id = getGet('id');
    $status = getGet('status');

    if (!empty($order_id)) {

        $sql = "UPDATE orders SET status = $status WHERE id = '$order_id'";
        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Thay đổi trạng thái đơn hàng thành công')</script>";
            echo "<script>window.location='./index.php'</script>";
        }
    }
}