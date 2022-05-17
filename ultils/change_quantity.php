<?php
$pro_id = $quantity = "";
if (!empty($_POST)) {
    $pro_id = getPost('id');
    $quantity = getPost('quantity');

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['pro_id'] == $pro_id) {
            $_SESSION['cart'][$key]['quantity'] = $quantity;
            $_SESSION['cart'][$key]['total'] = $_SESSION['cart'][$key]['price'] * $quantity;

            header('location: ./cart.php');
        }
    }
}