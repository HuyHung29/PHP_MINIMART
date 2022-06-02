<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$id = "";

if (!empty($_GET)) {
    $id = getGet('id');

    $sql = "UPDATE product SET cate_id = 1 WHERE cate_id = $id";

    $response = execute($sql);

    if ($response) {
        $delete = "DELETE FROM category WHERE id = $id";

        $result = execute(($delete));

        if ($result) {
            echo "<script>alert('Xóa danh mục thành công!')</script>";
            echo "<script>window.location = './index.php'</script>";
        }
    }
}