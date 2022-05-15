<?php

require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$errors = array();
$password = $newPassword = $confirmPassword = $id = "";
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

if (!empty($_POST)) {
    $id = getPost('id');
    $password = getPost('password');
    $newPassword = getPost('newPassword');
    $confirmPassword = getPost('confirmNewPassword');

    $sql = "SELECT password FROM user WHERE id = '$id' AND password = '$password'";
    $check = executeResult($sql, true);

    if (empty($check)) {
        $errors['password'] = "Mật khẩu không đúng";
    } else {
        if (!preg_match($passwordRegex, $newPassword)) {
            $errors['newPassword'] = "Mật khẩu ít nhất 8 ký tự bao gồm cả chữ hoa, số và ký tự đặc biệt";
        }

        if ($confirmPassword != $newPassword) {
            $errors['confirmPassword'] = "Không trùng với mật khẩu";
        }
    }

    if (empty($errors)) {
        $update = "UPDATE user SET password = '$newPassword' WHERE id = '$id'";

        $response = execute($update);

        $oldPassword = getCookie('password');

        if (!empty($oldPassword)) {
            setcookie('password', $newPassword, time() + 86400 * 30, "/");
        }

        if ($response) {
            echo "<script>alert('Cập nhật thành công')</script>";
            header('location: ../user');
            die();
        } else {
            echo "<script>alert('Hệ thống có lỗi vui lòng thử lại sau')</script>";
        }
    }
}