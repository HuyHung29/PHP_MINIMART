<?php
require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$email = $password = $check = "";
$error = array();

$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

if (!empty($_POST)) {
    $email = getPost("email");
    $password = getPost("password");
    $check = getPost("remember");

    if (!preg_match($emailRegex, $email)) {
        $error['email'] = "Email phải có dạng a@gmail.com";
    }

    if (!preg_match($passwordRegex, $password)) {
        $error['password'] = "Mật khẩu ít nhất 8 ký tự cả chữ, số và ký tự đặc biệt";
    }

    if (empty($error)) {

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $result = executeResult($sql, true);

        if (!empty($result) && count($result)) {
            $_SESSION['login'] = $result;

            if ($check == "on") {
                setcookie('email', $email, time() + 86400 * 30, "/");
                setcookie('password', $password, time() + 86400 * 30, "/");
            }

            header('location: ../../../../../MiniMart');
            die();
        } else {
            $error['email'] = "Email hoặc mật khẩu không đúng";
            $error['password'] = "Email hoặc mật khẩu không đúng";
        }

    }
}