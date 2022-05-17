<?php
require_once '../../database/dbhelper.php';
require_once '../../ultils/ultility.php';

$name = $email = $phone = $id = "";
$errors = array();

$nameRegex = "/\b\S*[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Z]+\S*\b/";
$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
$phoneRegex = "/^[0-9]{9,}$/";

if (!empty($_POST)) {
    $id = getPost('id');
    $name = getPost('name');
    $email = getPost('email');
    $phone = getPost('phone');

    if (!preg_match($nameRegex, $name)) {
        $errors['name'] = 'Tên phải bắt đầu bằng chữ';
    }

    if (!preg_match($emailRegex, $email)) {
        $errors['email'] = "Email không đúng định dạng";
    } else {
        $select = "SELECT * FROM user WHERE email = '$email' AND id != '$id'";

        $check = executeResult($select);

        if (!empty($check)) {
            $errors['email'] = "Email đã tồn tại";
        }
    }

    if (!preg_match($phoneRegex, $phone)) {
        $errors['phone'] = "Số điện thoại phải là số và ít nhất 8 chữ số";
    }

    if (empty($errors)) {
        $sql = "UPDATE user SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id'";

        $response = execute($sql);

        if ($response) {
            echo "<script>alert('Cập nhật thành công')</script>";

            $getUser = "SELECT * FROM user WHERE id = '$id'";

            $userInfo = executeResult($getUser, true);

            $oldEmail = getCookie('email');

            if (!empty($oldEmail)) {
                setcookie('email', $email, time() + 86400 * 30, "/");
            }

            $_SESSION['login'] = $userInfo;

            echo "<script>window.location='./index.php'</script>";
            die();
        } else {
            echo "<script>alert('Hệ thống có lỗi vui lòng thử lại sau')</script>";
        }
    }
}