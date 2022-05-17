<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$product_id = "";

if (!empty($_GET)) {
    $product_id = getGet('id');

    $sql = "UPDATE product SET deleted = 1 WHERE id = $product_id";

    $isDeleted = execute($sql);

    if ($isDeleted) {
        echo "<script>alert('Xóa sản phẩm thành công')</script>";
        echo "<script>window.location='../index.php'</script>";
    }
}