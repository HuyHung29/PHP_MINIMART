<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$order_id = "";
$mess = "";
$date = date('Y-m-d H:i:s');
if (!empty($_GET)) {
    $order_id = getGet('id');
    $mess = urldecode(getGet('mess'));

    if (!empty($order_id)) {
        $sql = "UPDATE orders SET status = 3, reason = '$mess' WHERE id = '$order_id'";

        $response = execute($sql);

        $getProOr = "SELECT product_id, quantity FROM order_detail WHERE order_id = $order_id";

        $productsOr = executeResult($getProOr);

        $product_ids = array();
        foreach ($productsOr as $row) {
            $product_ids[] = $row['product_id'];
        }
        $list_id = "(" . implode(",", $product_ids) . ")";

        $sql = "SELECT id, quantity FROM product WHERE id IN $list_id";
        $products = executeResult($sql);

        $listQuantity = array();
        foreach ($products as $row) {
            $newQuantity = 0;
            foreach ($productsOr as $item) {
                if ($row['id'] == $item['product_id']) {
                    $newQuantity = (int) $row['quantity'] + (int) $item['quantity'];
                    $listQuantity[] = "WHEN id = " . $row['id'] . " THEN $newQuantity";
                    break;
                }
            }
        }

        $update = "UPDATE product SET updated_At = '$date', quantity = CASE " . implode(" ", $listQuantity) . " END WHERE id IN $list_id";
        $check2 = execute($update);

        if ($check2) {
            echo "<script>alert('Hủy đơn hàng thành công')</script>";
            echo "<script>history.back()</script>";
        }
    }
}