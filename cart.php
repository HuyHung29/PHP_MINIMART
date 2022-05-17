<?php
session_start();
$user = array();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
}

if (!empty($user) && $user['role'] == "admin") {
    header('location: ../MiniMart/admin');
    die();
}

require_once './database/dbhelper.php';
require_once './ultils/ultility.php';

$cart = array();

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

require_once './ultils/change_quantity.php';

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
    <title>Giỏ hàng</title>
</head>
<?php
include "./header.php";
include "./navbar.php";
?>
<div class="cart-page  container">
    <div class="row">
        <div class="col-md-12">
            <div class="cart-page__item cart-page--margin bg-white ">
                <div class="cart-page__item__product">Sản phẩm</div>
                <div class="cart-page__item__price">Đơn giá</div>
                <div class="cart-page__item__quantity">Số lượng</div>
                <div class="cart-page__item__total">Thành tiền</div>
                <div class="cart-page__item__action">Thao tác</div>
            </div>
            <div class="cart-page__list bg-white">
                <?php
$sum = 0;
foreach ($cart as $row) {
    $sum += (int) $row['total'];
    echo '<div class="cart-page__item">
            <div class="cart-page__item__product">
                <a>
                    <img
                        src="./assets/thumbnail/' . $row['thumbnail'] . '"
                        alt="anh">
                </a>
                <a>
                        <p>' . $row['title'] . '</p>
                </a>
            </div>
            <div class="cart-page__item__price">
                <p>' . $row['price'] . '<sup>đ</sup></p>
            </div>
            <div class="cart-page__item__quantity">
                <form method="POST" class="cart-page__item__quantity__calculate">
                    <input name="id" type="hidden" value="' . $row['pro_id'] . '">
                    <input name="quantity" type="number" value="' . $row['quantity'] . '">
                    <button type="submit" class="btn btn-secondary btn-change-quantity">Đổi</button>
                </form>
            </div>
            <div class="cart-page__item__total">
                <p>' . $row['total'] . '<sup>đ</sup></p>
            </div>
            <div class="cart-page__item__action">
                <a href="./ultils/delete_cart_process.php?id=' . $row['pro_id'] . '"><i class="fas fa-times"></i></a>
            </div>
            </div>';
}
?>
            </div>
            <div class="cart-page__item cart-page--margin bg-white ">
                <div class="cart-page__item__summary">
                    <p>Tổng thanh toán (<?=count($cart)?> Sản phẩm): <span><sup>đ</sup><?=number_format($sum)?></span>
                    </p>
                    <a href="./order.php">
                        <button class="buy-btn shadow-none  buy-btn--mr0 btn btn-secondary">Mua hàng</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const input = document.querySelector('input[name="quantity"]');

input.addEventListener("change", () => {
    if (input.value <= 0) {
        input.value = 1;
    }
})
</script>

<?php
include "./footer.php";
?>