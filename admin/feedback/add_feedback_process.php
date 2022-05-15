<?php

$errors = array();
$id = $name = $email = $phone = $feedback = "";
$nameRegex = "/\b\S*[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Za-z]+\S*\b/";
$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$phoneRegex = "/^[0-9]{9,}$/";

if (!empty($_POST)) {
    $id = getPost('id');
    $name = getPost('name');
    $email = getPost('email');
    $phone = getPost('phone');
    $feedback = getPost('feedback');

    if (!preg_match($nameRegex, $name)) {
        $errors['name'] = "Tên phải bắt đầu bằng chữ";
    }

    if (!preg_match($emailRegex, $email)) {
        $errors['email'] = "Email không đúng định dạng";
    }

    if (!preg_match($phoneRegex, $phone)) {
        $errors['phone'] = "Số điện thoại gồm ít nhất 9 chứ số";
    }

    if (empty($feedback)) {
        $errors['feedback'] = "Vui lòng nhập phản hồi của bạn";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO feedback
                        (user_id, name, email, phone, feedback)
                        VALUES ('$id', '$name', '$email', '$phone', '$feedback')";
        $response = execute($sql);

        if ($response) {
            header("location: ./../../MiniMart/feedback.php");
            die();
        }
    }
}