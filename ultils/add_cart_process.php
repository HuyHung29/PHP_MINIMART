<?php

if (!empty($_POST)) {
    $id = getPost('id');
    $title = getPost('title');
    $thumbnail = getPost('thumbnail');
    $price = (int) getPost('price');
    $quantity = (int) getPost('quantity');
    $total = $price * $quantity;

    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "pro_id");

        if (!in_array($_POST['id'], $item_array_id)) {
            $count = count($_SESSION['cart']);

            $item = array(
                'pro_id' => $id,
                'title' => $title,
                'thumbnail' => $thumbnail,
                'price' => $price,
                'quantity' => $quantity,
                'total' => $total,
            );
            $_SESSION['cart'][$count] = $item;
            echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công')</script>";
            echo "<script>window.location=''</script>";
        } else {
            echo "<script>alert('Sản phẩm đã có trong giỏ hàng')</script>";
            echo "<script>window.location=''</script>";
        }
    } else {
        $item = array(
            'pro_id' => $id,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total,
        );

        $_SESSION['cart'][0] = $item;
        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công')</script>";
        echo "<script>window.location=''</script>";
    }
}