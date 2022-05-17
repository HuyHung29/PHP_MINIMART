<?php

if (!empty($_POST)) {

    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "pro_id");

        if (!in_array($_POST['id'], $item_array_id)) {
            $count = count($_SESSION['cart']);

            $item = array(
                'pro_id' => getPost('id'),
                'title' => getPost('title'),
                'thumbnail' => getPost('thumbnail'),
                'price' => getPost('price'),
                'quantity' => getPost('quantity'),
                'total' => (int) getPost('price') * (int) getPost('quantity'),
            );
            $_SESSION['cart'][$count] = $item;
            echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công')</script>";
            echo "<script>window.location='./products.php'</script>";
        } else {
            echo "<script>alert('Sản phẩm đã có trong giỏ hàng')</script>";
            echo "<script>window.location='./products.php'</script>";
        }
    } else {
        $item = array(
            'pro_id' => getPost('id'),
            'title' => getPost('title'),
            'thumbnail' => getPost('thumbnail'),
            'price' => getPost('price'),
            'quantity' => getPost('quantity'),
            'total' => getPost('total'),
        );

        $_SESSION['cart'][0] = $item;
        echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công')</script>";
        echo "<script>window.location='./products.php'</script>";
    }
}