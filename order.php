<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    header('location: ./users/login');
    die();
}

if (!empty($user) && $user['role'] == "admin") {
    header('location: ../MiniMart/admin');
    die();
}

$cart = array();

if (!isset($_SESSION['cart'])) {
    header('location: ./index.php');
    die();
} else {
    $cart = $_SESSION['cart'];
}

require_once './database/dbhelper.php';
require_once './ultils/ultility.php';

require_once './admin/order/add_order_process.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../../../MiniMart/assets/pic/icon.jpeg" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./dist/css/style.css" />
    <title>Đặt hàng</title>
</head>

<body>
    <div class="layout">
        <div class="layout__content__background">
            <div class="container">
                <div class="row">
                    <div class="bg-white shadow-sm p-5 col my-5">
                        <div class="add-edit__header">
                            <h1 class="add-edit__heading">
                                Đặt hàng
                            </h1>
                            <p class="add-edit__sub-heading">
                                Vui lòng điền thông tin người nhận
                            </p>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="text" name="id" class="d-none" value="<?=$user['id']?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input mb-3">
                                                <input name="name" type="text" placeholder="Họ và tên"
                                                    class="input__control form-control <?=empty($errors['name']) ? '' : 'is-invalid'?>"
                                                    aria-invalid="false" value="<?=$name?>" />
                                                <div
                                                    class="invalid-feedback mt-3 <?=empty($errors['name']) ? '' : 'input__error'?>">
                                                    <?=empty($errors['name']) ? "" : $errors['name']?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input mb-3">
                                                <input name="email" type="text" placeholder="Email"
                                                    class="input__control form-control <?=empty($errors['email']) ? '' : 'is-invalid'?>"
                                                    aria-invalid="false" value="<?=$email?>" />
                                                <div
                                                    class="invalid-feedback mt-3 <?=empty($errors['email']) ? '' : 'input__error'?>">
                                                    <?=empty($errors['email']) ? "" : $errors['email']?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input mb-3">
                                                <input name="phone" type="text" placeholder="Số điện thoại"
                                                    class="input__control form-control <?=empty($errors['phone']) ? '' : 'is-invalid'?>"
                                                    aria-invalid="false" value="<?=$phone?>" />
                                                <div
                                                    class="invalid-feedback mt-3 <?=empty($errors['phone']) ? '' : 'input__error'?>">
                                                    <?=empty($errors['phone']) ? "" : $errors['phone']?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input mb-3">
                                                <input name="address" type="text" placeholder="Địa chỉ giao hàng"
                                                    class="input__control form-control <?=empty($errors['address']) ? '' : 'is-invalid'?>"
                                                    aria-invalid="false" value="<?=$address?>" />
                                                <div
                                                    class="invalid-feedback mt-3 <?=empty($errors['address']) ? '' : 'input__error'?>">
                                                    <?=empty($errors['address']) ? "" : $errors['address']?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input mb-3">
                                                <textarea name="note" placeholder="Ghi chú"
                                                    class="input__control form-control <?=empty($errors['note']) ? '' : 'is-invalid'?>"
                                                    rows="10"><?=$note?></textarea>
                                                <div
                                                    class="invalid-note mt-3 <?=empty($errors['note']) ? '' : 'input__error'?>">
                                                    <?=empty($errors['note']) ? "" : $errors['note']?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-cart__list">
                                        <h2 class="product-cart__heading">
                                            Đơn hàng (<?=count($cart)?> sản phẩm)
                                        </h2>
                                        <div class="product-cart__item--wrap">
                                            <?php
$sum = 0;
foreach ($cart as $row) {
    $sum += (int) $row['total'];
    echo '<div class="product-cart__item">
            <div class="product-cart__item__img">
                <img src="./assets/thumbnail/' . $row['thumbnail'] . '" alt="anh">
                <span>' . $row['quantity'] . '</span>
            </div>
            <p class="product-cart__item__title">
                ' . $row['title'] . '
            </p>
            <p class="product-cart__item__total">
                ' . number_format($row['total']) . ' <sup>đ</sup>
            </p>
        </div>';
}
?>
                                        </div>
                                        <div class="product-cart__sum">
                                            <p>Tổng cộng</p>
                                            <p><?=number_format($sum)?> <sup>đ</sup></p>
                                        </div>
                                        <input type="hidden" class="d-none" name="total_money" value="<?=$sum?>">
                                        <div class="product-cart__action">
                                            <a href="./cart.php"><i class="fa-solid fa-chevron-left"></i> Quay về giỏ
                                                hàng</a>
                                            <button type="submit" class="btn btn-secondary buy-btn">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>