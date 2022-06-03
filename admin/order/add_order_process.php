<?php

$errors = array();
$user_id = $name = $email = $phone = $address = $note = $total_money = "";
$date = date('Y-m-d H:i:s');

$nameRegex = "/\b\S*[AĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴAĂÂÁẮẤÀẰẦẢẲẨÃẴẪẠẶẬĐEÊÉẾÈỀẺỂẼỄẸỆIÍÌỈĨỊOÔƠÓỐỚÒỒỜỎỔỞÕỖỠỌỘỢUƯÚỨÙỪỦỬŨỮỤỰYÝỲỶỸỴA-Za-z]+\S*\b/";
$emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$phoneRegex = "/^[0-9]{9,}$/";

if (!empty($_POST)) {
    $user_id = getPost('id');
    $name = getPost('name');
    $email = getPost('email');
    $phone = getPost('phone');
    $address = getPost('address');
    $note = getPost('note');
    $total_money = getPost('total_money');

    if (!preg_match($nameRegex, $name)) {
        $errors['name'] = "Tên phải bắt đầu bằng chữ";
    }

    if (!preg_match($emailRegex, $email)) {
        $errors['email'] = "Email không đúng định dạng";
    }

    if (!preg_match($phoneRegex, $phone)) {
        $errors['phone'] = "Số điện thoại gồm ít nhất 9 chứ số";
    }

    if (empty($address)) {
        $errors['address'] = "Vui lòng nhập địa chỉ của bạn";
    }

    $product_ids = array();
    foreach ($_SESSION['cart'] as $row) {
        $product_ids[] = $row['pro_id'];
    }
    $list_id = "(" . implode(",", $product_ids) . ")";

    $sql = "SELECT id, quantity FROM product WHERE id IN $list_id";
    $products = executeResult($sql);

    foreach ($_SESSION['cart'] as $row) {
        foreach ($products as $item) {
            if ($row['pro_id'] == $item['id']) {
                if ($row['quantity'] > $item['quantity']) {
                    $errors['quantity'] = "Số lượng sản phẩm vượt quá số lượng sản phẩm trong kho";
                    break;
                }
            }
        }
    }

    if (empty($errors)) {
        $sql = "INSERT INTO orders (user_id, name, email, phone, address, note, order_date, total_money)
                VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$note', '$date', '$total_money')";

        $response = execute($sql);

        if ($response) {
            $getOrder_Id = "SELECT id FROM orders ORDER BY id DESC";

            $order_id = executeResult($getOrder_Id, true)['id'];

            $item = array();
            foreach ($_SESSION['cart'] as $row) {
                $item[] = "('" . $row['pro_id'] . "', '" . $order_id . "', '" . $row['price'] . "', '" . $row['quantity'] . "', '" . $row['total'] . "')";
            }

            $insert = "INSERT INTO order_detail
                        (product_id, order_id, price, quantity, total) VALUES " . implode(',', $item);
            $check = execute($insert);

            if ($check) {
                unset($_SESSION['cart']);
                echo "<script>alert('Đặt hàng thành công')</script>";
                echo "<script>window.location='./../../user.php?mode=order'</script>";
            }
        }
    }
}