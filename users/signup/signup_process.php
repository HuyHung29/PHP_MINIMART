<?php
require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$name = $email = $password = $confirmPassword = $phone = "";
$error = array();

$nameRegex = "/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{8,}$/";
$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$phoneRegex = "/^[0-9]{9,}$/";

if (!empty($_POST)) {
    $name = getPost("name");
    $email = getPost("email");
    $password = getPost("password");
    $confirmPassword = getPost("confirm-password");
    $phone = getPost("phone");

    if (!preg_match($nameRegex, $name)) {
        $error['name'] = "Tên cần ít nhất 8 ký tự và bắt đầu bằng chữ";
    }

    if (!preg_match($emailRegex, $email)) {
        $error['email'] = "Email phải có dạng a@gmail.com";
    } else {
        $sql = "SELECT * FROM user where email = '$email'";

        $result = executeResult($sql);
        if (!empty($result)) {
            $error['email'] = "Email đã tồn tại";
        }
    }

    if (!preg_match($passwordRegex, $password)) {
        $error['password'] = "Mật khẩu gồm 8 ký tự bao gồm chữ hoa, số và ký tự đặc biệt";
    }

    if ($password != $confirmPassword) {
        $error['confirmPassword'] = "Không trùng với mật khẩu";
    }

    if (!preg_match($phoneRegex, $phone)) {
        $error['phone'] = "Số điện thoại cần ít nhất 9 chữ số";
    }

    if (empty($error)) {
        $sql = "INSERT INTO user (email, password, name, phone) VALUES ('$email', '$password', '$name', '$phone')";

        execute($sql);

        header('location: ../login');
        die();
    }
}
