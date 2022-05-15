<?php
require_once './../../../database/dbhelper.php';
require_once './../../../ultils/ultility.php';

$name = $error = "";

if (!empty($_POST)) {
    $name = getPost('name');
    $date = date('Y-m-d H:i:s');

    if (empty($name)) {
        $error = "Tên danh mục không được để trống";
    } else {
        $check = "SELECT * FROM category where name = '$name'";

        $result = executeResult($check);

        if (!empty($result) && count($result) > 0) {
            $error = 'Tên danh mục đã tồn tại';
        } else {

            $sql = "INSERT INTO category (name, created_At, updated_At) VALUES ('$name', '$date', '$date')";

            $response = execute($sql);

            if ($response) {
                header('location: ./../index.php');
                die();
            } else {
                echo "<script>alert('Có lỗi với hệ thống vui lòng thử lại sau')</script>";
            }

        }
    }

}