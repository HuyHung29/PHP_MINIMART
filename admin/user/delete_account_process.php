<?php
require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$id = "";
$status = "";
if (!empty($_GET)) {
    $id = getGet('id');
    $status = getGet('status');

    $sql = "UPDATE user SET disable = $status WHERE id = $id";

    $response = execute($sql);

    if ($response) {
        if ($status == 0) {
            echo "<script>alert('Mở khóa tài khoản thành công')</script>";
        } else {
            echo "<script>alert('Khóa tài khoản thành công')</script>";
        }
        echo "<script>window.location = './accounts.php'</script>";
    }
}