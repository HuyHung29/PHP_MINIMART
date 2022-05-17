<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_id = "";
if (!empty($_GET)) {
    $order_id = getGet('id');

    if (!empty($order_id)) {
        $sql = "UPDATE orders SET status = 3 WHERE id = '$order_id'";

        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Hủy đơn hàng thành công')</script>";
            echo "<script>window.location='../../user.php?mode=order'</script>";
        }
    }
}