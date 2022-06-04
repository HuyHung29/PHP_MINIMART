<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_id = "";
$status = "";
$mess = "";
if (!empty($_GET)) {
    $order_id = getGet('id');
    $status = getGet('status');
    $mess = urldecode(getGet('mess'));

    if (!empty($order_id)) {
        $sql = "";
        if (empty($mess)) {
            $sql = "UPDATE orders SET status = $status WHERE id = '$order_id'";
        } else {
            $sql = "UPDATE orders SET status = $status, reason = '$mess' WHERE id = '$order_id'";
        }

        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Thay đổi trạng thái đơn hàng thành công')</script>";
            echo "<script>window.location='./index.php'</script>";
        }
    }
}