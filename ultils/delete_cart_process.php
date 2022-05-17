<?php
session_start();

require_once './ultility.php';

$pro_id = "";
if (!empty($_GET)) {
    $pro_id = getGet('id');

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['pro_id'] == $pro_id) {
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Xóa sản phẩm khỏi giỏ hàng thành công')</script>";
            echo "<script>window.location='../cart.php'</script>";
        }
    }
}