<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_id = "";
$mess = "";
if (!empty($_GET)) {
    $order_id = getGet('id');
    $mess = urldecode(getGet('mess'));

    if (!empty($order_id)) {
        $sql = "UPDATE orders SET status = 3, reason = '$mess' WHERE id = '$order_id'";

        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Hủy đơn hàng thành công')</script>";
            echo "<script>window.location='../../user.php?mode=order'</script>";
        }
    }
}