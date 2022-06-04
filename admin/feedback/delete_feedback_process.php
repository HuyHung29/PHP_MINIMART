<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$id = "";

if (!empty($_GET)) {
    $id = getGet('id');

    if (!empty($id)) {
        $sql = "DELETE FROM feedback WHERE id = $id";

        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Xóa phản hồi thành công!')</script>";
            echo "<script>window.location = '../index.php'</script>";
        }
    }
}