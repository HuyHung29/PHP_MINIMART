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
                $update = "UPDATE category SET name = '" . $reName . "', updated_At = '" . $date . "'";

                $check = "SELECT * FROM category WHERE name = '$reName'";

                if (empty($check)) {
                    execute($update);

                    header('location: ./../index.php');
                    die();
                } else {
                    $error = 'Tên danh mục đã tồn tại';
                }
            } else {
                $error = "Tên danh mục không được để trống";
            }
        }

    }
}