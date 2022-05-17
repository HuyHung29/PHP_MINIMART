<?php
require_once './../../../database/dbhelper.php';
require_once './../../../ultils/ultility.php';

$name = $error = "";

if (!empty($_GET)) {
    $id = getGet('id');

    $sql = 'SELECT * FROM category where id =' . $id;

    $result = executeResult($sql, true);

    $name = "";
    $error = "";
    if (!empty($result)) {
        $name = $result['name'];

        if (!empty($_POST)) {
            $reName = getPost('name');
            $date = date('Y-m-d H:i:s');

            if (!empty($reName)) {
                $update = "UPDATE category SET name = '$reName', updated_At = ' $date' WHERE id = '$id'";

                $select = "SELECT * FROM category WHERE name = '$reName'";
                $check = executeResult($select);

                if (empty($check)) {
                    $response = execute($update);

                    if ($response) {
                        echo "<script>alert('Sửa danh mục thành công')</script>";
                        echo "<script>window.location='./../index.php'</script>";
                        die();
                    } else {
                        echo "<script>alert('Có lỗi với hệ thống vui lòng thử lại sau')</script>";
                    }
                } else {
                    $error = 'Tên danh mục đã tồn tại';
                }
            } else {
                $error = "Tên danh mục không được để trống";
            }
        }

    }
}